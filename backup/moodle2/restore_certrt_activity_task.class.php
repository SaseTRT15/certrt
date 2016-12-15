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
 * @package    mod_certrt
 * @subpackage backup-moodle2
 * @copyright 2010 onwards Eloy Lafuente (stronk7) {@link http://stronk7.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/mod/certrt/backup/moodle2/restore_certrt_stepslib.php'); // Because it exists (must)

/**
 * certrt restore task that provides all the settings and steps to perform one
 * complete restore of the activity
 */
class restore_certrt_activity_task extends restore_activity_task {

    /**
     * Define (add) particular settings this activity can have
     */
    protected function define_my_settings() {
        // No particular settings for this activity
    }

    /**
     * Define (add) particular steps this activity can have
     */
    protected function define_my_steps() {
        // certrt only has one structure step
        $this->add_step(new restore_certrt_activity_structure_step('certrt_structure', 'certrt.xml'));
    }

    /**
     * Define the contents in the activity that must be
     * processed by the link decoder
     */
    static public function define_decode_contents() {
        $contents = array();

        $contents[] = new restore_decode_content('certrt', array('intro'), 'certrt');

        return $contents;
    }

    /**
     * Define the decoding rules for links belonging
     * to the activity to be executed by the link decoder
     */
    static public function define_decode_rules() {
        $rules = array();

        $rules[] = new restore_decode_rule('CERTRTVIEWBYID', '/mod/certrt/view.php?id=$1', 'course_module');
        $rules[] = new restore_decode_rule('CERTRTINDEX', '/mod/certrt/index.php?id=$1', 'course');

        return $rules;

    }

    /**
     * Define the restore log rules that will be applied
     * by the {@link restore_logs_processor} when restoring
     * certrt logs. It must return one array
     * of {@link restore_log_rule} objects
     */
    static public function define_restore_log_rules() {
        $rules = array();

        $rules[] = new restore_log_rule('certrt', 'add', 'view.php?id={course_module}', '{certrt}');
        $rules[] = new restore_log_rule('certrt', 'update', 'view.php?id={course_module}', '{certrt}');
        $rules[] = new restore_log_rule('certrt', 'view', 'view.php?id={course_module}', '{certrt}');
        $rules[] = new restore_log_rule('certrt', 'received', 'report.php?a={certrt}', '{certrt}');
        $rules[] = new restore_log_rule('certrt', 'view report', 'report.php?id={certrt}', '{certrt}');

        return $rules;
    }

    /**
     * Define the restore log rules that will be applied
     * by the {@link restore_logs_processor} when restoring
     * course logs. It must return one array
     * of {@link restore_log_rule} objects
     *
     * Note this rules are applied when restoring course logs
     * by the restore final task, but are defined here at
     * activity level. All them are rules not linked to any module instance (cmid = 0)
     */
    static public function define_restore_log_rules_for_course() {
        $rules = array();

        // Fix old wrong uses (missing extension)
        $rules[] = new restore_log_rule('certrt', 'view all', 'index.php?id={course}', null);

        return $rules;
    }

    /*
     * This function is called after all the activities in the backup have been restored.
     * This allows us to get the new course module ids, as they may have been restored
     * after the certrt module, meaning no id was available at the time.
     */
    public function after_restore() {
        global $DB;

        // Get the new module
        $sql = "SELECT c.*
                FROM {certrt} c
                INNER JOIN {course_modules} cm
                ON c.id = cm.instance
                WHERE cm.id = :cmid";
        if ($certrt = $DB->get_record_sql($sql, (array('cmid'=>$this->get_moduleid())))) {
            // A flag to check if we need to update the database or not
            $update = false;
            if ($certrt->printdate > 2) { // If greater than 2, then it is a grade item value
                if ($newitem = restore_dbops::get_backup_ids_record($this->get_restoreid(), 'course_module', $certrt->printdate)) {
                    $update = true;
                    $certrt->printdate = $newitem->newitemid;
                }
            }
            if ($certrt->printgrade > 2) {
                if ($newitem = restore_dbops::get_backup_ids_record($this->get_restoreid(), 'course_module', $certrt->printgrade)) {
                    $update = true;
                    $certrt->printgrade = $newitem->newitemid;
                }
            }
            if ($update) {
                // Update the certrt
                $DB->update_record('certrt', $certrt);
            }
        }
    }
}
