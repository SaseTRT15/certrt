<?php

// This file is part of the certrt module for Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * certrt module core interaction API
 *
 * @package    mod_certrt
 * @copyright  Mark Nelson <markn@moodle.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

 defined('MOODLE_INTERNAL') || die();

/**
 * Add certrt instance.
 *
 * @param stdClass $certrt
 * @return int new certrt instance id
 */
function certrt_add_instance($certrt) {
    global $DB;

    // Create the certrt.
    $certrt->timecreated = time();
    $certrt->timemodified = $certrt->timecreated;

    
    //mhz - process the wysiwyg editors: inserts into reg the form information
    $certrt->secondpage = $certrt->secondpage['text'];

    return $DB->insert_record('certrt', $certrt);
}

/**
 * Update certrt instance.
 *
 * @param stdClass $certrt
 * @return bool true
 */
function certrt_update_instance($certrt) {
    global $DB;

    // Update the certrt.
    $certrt->timemodified = time();
    $certrt->id = $certrt->instance;

    //mhz - process the wysiwyg editors: inserts into reg the form information
    $certrt->secondpage = $certrt->secondpage['text'];

    return $DB->update_record('certrt', $certrt);
}

/**
 * Given an ID of an instance of this module,
 * this function will permanently delete the instance
 * and any data that depends on it.
 *
 * @param int $id
 * @return bool true if successful
 */
function certrt_delete_instance($id) {
    global $DB;

    // Ensure the certrt exists
    if (!$certrt = $DB->get_record('certrt', array('id' => $id))) {
        return false;
    }

    // Prepare file record object
    if (!$cm = get_coursemodule_from_instance('certrt', $id)) {
        return false;
    }

    $result = true;
    $DB->delete_records('certrt_issues', array('certrtid' => $id));
    if (!$DB->delete_records('certrt', array('id' => $id))) {
        $result = false;
    }

    // Delete any files associated with the certrt
    $context = context_module::instance($cm->id);
    $fs = get_file_storage();
    $fs->delete_area_files($context->id);

    return $result;
}

/**
 * This function is used by the reset_course_userdata function in moodlelib.
 * This function will remove all posts from the specified certrt
 * and clean up any related data.
 *
 * Written by Jean-Michel Vedrine
 *
 * @param $data the data submitted from the reset course.
 * @return array status array
 */
function certrt_reset_userdata($data) {
    global $DB;

    $componentstr = get_string('modulenameplural', 'certrt');
    $status = array();

    if (!empty($data->reset_certrt)) {
        $sql = "SELECT cert.id
                  FROM {certrt} cert
                 WHERE cert.course = :courseid";
        $params = array('courseid' => $data->courseid);
        $certrts = $DB->get_records_sql($sql, $params);
        $fs = get_file_storage();
        if ($certrts) {
            foreach ($certrts as $certid => $unused) {
                if (!$cm = get_coursemodule_from_instance('certrt', $certid)) {
                    continue;
                }
                $context = context_module::instance($cm->id);
                $fs->delete_area_files($context->id, 'mod_certrt', 'issue');
            }
        }

        $DB->delete_records_select('certrt_issues', "certrtid IN ($sql)", $params);
        $status[] = array('component' => $componentstr, 'item' => get_string('removecert', 'certrt'), 'error' => false);
    }
    // Updating dates - shift may be negative too
    if ($data->timeshift) {
        shift_course_mod_dates('certrt', array('timeopen', 'timeclose'), $data->timeshift, $data->courseid);
        $status[] = array('component' => $componentstr, 'item' => get_string('datechanged'), 'error' => false);
    }

    return $status;
}

/**
 * Implementation of the function for printing the form elements that control
 * whether the course reset functionality affects the certrt.
 *
 * Written by Jean-Michel Vedrine
 *
 * @param $mform form passed by reference
 */
function certrt_reset_course_form_definition(&$mform) {
    $mform->addElement('header', 'certrtheader', get_string('modulenameplural', 'certrt'));
    $mform->addElement('advcheckbox', 'reset_certrt', get_string('deletissuedcertrts', 'certrt'));
}

/**
 * Course reset form defaults.
 *
 * Written by Jean-Michel Vedrine
 *
 * @param stdClass $course
 * @return array
 */
function certrt_reset_course_form_defaults($course) {
    return array('reset_certrt' => 1);
}

/**
 * Returns information about received certrt.
 * Used for user activity reports.
 *
 * @param stdClass $course
 * @param stdClass $user
 * @param stdClass $mod
 * @param stdClass $certrt
 * @return stdClass the user outline object
 */
function certrt_user_outline($course, $user, $mod, $certrt) {
    global $DB;

    $result = new stdClass;
    if ($issue = $DB->get_record('certrt_issues', array('certrtid' => $certrt->id, 'userid' => $user->id))) {
        $result->info = get_string('issued', 'certrt');
        $result->time = $issue->timecreated;
    } else {
        $result->info = get_string('notissued', 'certrt');
    }

    return $result;
}

/**
 * Returns information about received certrt.
 * Used for user activity reports.
 *
 * @param stdClass $course
 * @param stdClass $user
 * @param stdClass $mod
 * @param stdClass $certrt
 * @return string the user complete information
 */
function certrt_user_complete($course, $user, $mod, $certrt) {
    global $DB, $OUTPUT, $CFG;
    require_once($CFG->dirroot.'/mod/certrt/locallib.php');

    if ($issue = $DB->get_record('certrt_issues', array('certrtid' => $certrt->id, 'userid' => $user->id))) {
        echo $OUTPUT->box_start();
        echo get_string('issued', 'certrt') . ": ";
        echo userdate($issue->timecreated);
        $cm = get_coursemodule_from_instance('certrt', $certrt->id, $course->id);
        certrt_print_user_files($certrt, $user->id, context_module::instance($cm->id)->id);
        echo '<br />';
        echo $OUTPUT->box_end();
    } else {
        print_string('notissuedyet', 'certrt');
    }
}

/**
 * Must return an array of user records (all data) who are participants
 * for a given instance of certrt.
 *
 * @param int $certrtid
 * @return stdClass list of participants
 */
function certrt_get_participants($certrtid) {
    global $DB;

    $sql = "SELECT DISTINCT u.id, u.id
              FROM {user} u, {certrt_issues} a
             WHERE a.certrtid = :certrtid
               AND u.id = a.userid";
    return  $DB->get_records_sql($sql, array('certrtid' => $certrtid));
}

/**
 * @uses FEATURE_GROUPS
 * @uses FEATURE_GROUPINGS
 * @uses FEATURE_GROUPMEMBERSONLY
 * @uses FEATURE_MOD_INTRO
 * @uses FEATURE_COMPLETION_TRACKS_VIEWS
 * @uses FEATURE_GRADE_HAS_GRADE
 * @uses FEATURE_GRADE_OUTCOMES
 * @param string $feature FEATURE_xx constant for requested feature
 * @return mixed True if module supports feature, null if doesn't know
 */
function certrt_supports($feature) {
    switch ($feature) {
        case FEATURE_GROUPS:                  return true;
        case FEATURE_GROUPINGS:               return true;
        case FEATURE_GROUPMEMBERSONLY:        return true;
        case FEATURE_MOD_INTRO:               return true;
        case FEATURE_COMPLETION_TRACKS_VIEWS: return true;
        case FEATURE_BACKUP_MOODLE2:          return true;

        default: return null;
    }
}

/**
 * Serves certrt issues and other files.
 *
 * @param stdClass $course
 * @param stdClass $cm
 * @param stdClass $context
 * @param string $filearea
 * @param array $args
 * @param bool $forcedownload
 * @return bool|nothing false if file not found, does not return anything if found - just send the file
 */
function certrt_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload) {
    global $CFG, $DB, $USER;

    if ($context->contextlevel != CONTEXT_MODULE) {
        return false;
    }

    if (!$certrt = $DB->get_record('certrt', array('id' => $cm->instance))) {
        return false;
    }

    require_login($course, false, $cm);

    require_once($CFG->libdir.'/filelib.php');

    if ($filearea === 'issue') {
        $certrecord = (int)array_shift($args);

        if (!$certrecord = $DB->get_record('certrt_issues', array('id' => $certrecord))) {
            return false;
        }

        if ($USER->id != $certrecord->userid and !has_capability('mod/certrt:manage', $context)) {
            return false;
        }

        $relativepath = implode('/', $args);
        $fullpath = "/{$context->id}/mod_certrt/issue/$certrecord->id/$relativepath";

        $fs = get_file_storage();
        if (!$file = $fs->get_file_by_hash(sha1($fullpath)) or $file->is_directory()) {
            return false;
        }
        send_stored_file($file, 0, 0, true); // download MUST be forced - security!
    }
}

/**
 * Used for course participation report (in case certrt is added).
 *
 * @return array
 */
function certrt_get_view_actions() {
    return array('view', 'view all', 'view report');
}

/**
 * Used for course participation report (in case certrt is added).
 *
 * @return array
 */
function certrt_get_post_actions() {
    return array('received');
}
