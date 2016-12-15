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
 * Handles viewing a certrt
 *
 * @package    mod_certrt
 * @copyright  Mark Nelson <markn@moodle.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once("../../config.php");
require_once("$CFG->dirroot/mod/certrt/locallib.php");
require_once("$CFG->dirroot/mod/certrt/deprecatedlib.php");
require_once("$CFG->libdir/pdflib.php");

$id = required_param('id', PARAM_INT);    // Course Module ID
$action = optional_param('action', '', PARAM_ALPHA);
$edit = optional_param('edit', -1, PARAM_BOOL);

if (!$cm = get_coursemodule_from_id('certrt', $id)) {
    print_error('Course Module ID was incorrect');
}
if (!$course = $DB->get_record('course', array('id'=> $cm->course))) {
    print_error('course is misconfigured');
}
if (!$certrt = $DB->get_record('certrt', array('id'=> $cm->instance))) {
    print_error('course module is incorrect');
}

require_login($course, false, $cm);
$context = context_module::instance($cm->id);
require_capability('mod/certrt:view', $context);

$event = \mod_certrt\event\course_module_viewed::create(array(
    'objectid' => $certrt->id,
    'context' => $context,
));
$event->add_record_snapshot('course', $course);
$event->add_record_snapshot('certrt', $certrt);
$event->trigger();

$completion=new completion_info($course);
$completion->set_module_viewed($cm);

// Initialize $PAGE, compute blocks
$PAGE->set_url('/mod/certrt/view.php', array('id' => $cm->id));
$PAGE->set_context($context);
$PAGE->set_cm($cm);
$PAGE->set_title(format_string($certrt->name));
$PAGE->set_heading(format_string($course->fullname));

if (($edit != -1) and $PAGE->user_allowed_editing()) {
     $USER->editing = $edit;
}

// Add block editing button
if ($PAGE->user_allowed_editing()) {
    $editvalue = $PAGE->user_is_editing() ? 'off' : 'on';
    $strsubmit = $PAGE->user_is_editing() ? get_string('blockseditoff') : get_string('blocksediton');
    $url = new moodle_url($CFG->wwwroot . '/mod/certrt/view.php', array('id' => $cm->id, 'edit' => $editvalue));
    $PAGE->set_button($OUTPUT->single_button($url, $strsubmit));
}

// Check if the user can view the certrt
if ($certrt->requiredtime && !has_capability('mod/certrt:manage', $context)) {
    if (certrt_get_course_time($course->id) < ($certrt->requiredtime * 60)) {
        $a = new stdClass;
        $a->requiredtime = $certrt->requiredtime;
        notice(get_string('requiredtimenotmet', 'certrt', $a), "$CFG->wwwroot/course/view.php?id=$course->id");
        die;
    }
}

// Create new certrt record, or return existing record
$certrecord = certrt_get_issue($course, $USER, $certrt, $cm);

make_cache_directory('tcpdf');

// Load the specific certrt type.
require("$CFG->dirroot/mod/certrt/type/$certrt->certrttype/certrt.php");

if (empty($action)) { // Not displaying PDF
    echo $OUTPUT->header();

    $viewurl = new moodle_url('/mod/certrt/view.php', array('id' => $cm->id));
    groups_print_activity_menu($cm, $viewurl);
    $currentgroup = groups_get_activity_group($cm);
    $groupmode = groups_get_activity_groupmode($cm);

    if (has_capability('mod/certrt:manage', $context)) {
        $numusers = count(certrt_get_issues($certrt->id, 'ci.timecreated ASC', $groupmode, $cm));
        $url = html_writer::tag('a', get_string('viewcertrtviews', 'certrt', $numusers),
            array('href' => $CFG->wwwroot . '/mod/certrt/report.php?id=' . $cm->id));
        echo html_writer::tag('div', $url, array('class' => 'reportlink'));
    }

    if (!empty($certrt->intro)) {
        echo $OUTPUT->box(format_module_intro('certrt', $certrt, $cm->id), 'generalbox', 'intro');
    }

    if ($attempts = certrt_get_attempts($certrt->id)) {
        echo certrt_print_attempts($course, $certrt, $attempts);
    }
    if ($certrt->delivery == 0)    {
        $str = get_string('openwindow', 'certrt');
    } elseif ($certrt->delivery == 1)    {
        $str = get_string('opendownload', 'certrt');
    } elseif ($certrt->delivery == 2)    {
        $str = get_string('openemail', 'certrt');
    }
    echo html_writer::tag('p', $str, array('style' => 'text-align:center'));
    $linkname = get_string('getcertrt', 'certrt');

    $link = new moodle_url('/mod/certrt/view.php?id='.$cm->id.'&action=get');
    $button = new single_button($link, $linkname);
    if ($certrt->delivery != 1) {
        $button->add_action(new popup_action('click', $link, 'view' . $cm->id, array('height' => 600, 'width' => 800)));
    }

    echo html_writer::tag('div', $OUTPUT->render($button), array('style' => 'text-align:center'));
    echo $OUTPUT->footer($course);
    exit;
} else { // Output to pdf

    // No debugging here, sorry.
    $CFG->debugdisplay = 0;
    @ini_set('display_errors', '0');
    @ini_set('log_errors', '1');

    $filename = certrt_get_certrt_filename($certrt, $cm, $course) . '.pdf';

    // PDF contents are now in $file_contents as a string.
    $filecontents = $pdf->Output('', 'S');

    if ($certrt->savecert == 1) {
        certrt_save_pdf($filecontents, $certrecord->id, $filename, $context->id);
    }

    if ($certrt->delivery == 0) {
        // Open in browser.
        send_file($filecontents, $filename, 0, 0, true, false, 'application/pdf');
    } elseif ($certrt->delivery == 1) {
        // Force download.
        send_file($filecontents, $filename, 0, 0, true, true, 'application/pdf');
    } elseif ($certrt->delivery == 2) {
        certrt_email_student($course, $certrt, $certrecord, $context, $filecontents, $filename);
        // Open in browser after sending email.
        send_file($filecontents, $filename, 0, 0, true, false, 'application/pdf');
    }
}