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
 * This page reviews a certrt
 *
 * @package    mod_certrt
 * @copyright  Mark Nelson <markn@moodle.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
 
require_once('../../config.php');
require_once('locallib.php');
require_once("$CFG->libdir/pdflib.php");

// Retrieve any variables that are passed
$id = required_param('id', PARAM_INT);    // Course Module ID
$action = optional_param('action', '', PARAM_ALPHA);

if (!$cm = get_coursemodule_from_id('certrt', $id)) {
    print_error('Course Module ID was incorrect');
}

if (!$course = $DB->get_record('course', array('id'=> $cm->course))) {
    print_error('course is misconfigured');
}

if (!$certrt = $DB->get_record('certrt', array('id'=> $cm->instance))) {
    print_error('course module is incorrect');
}

// Requires a course login
require_login($course, true, $cm);

// Check the capabilities
$context = context_module::instance($cm->id);
require_capability('mod/certrt:view', $context);

// Initialize $PAGE, compute blocks
$PAGE->set_url('/mod/certrt/review.php', array('id' => $cm->id));
$PAGE->set_context($context);
$PAGE->set_cm($cm);
$PAGE->set_title(format_string($certrt->name));
$PAGE->set_heading(format_string($course->fullname));

// Get previous cert record
if (!$certrecord = $DB->get_record('certrt_issues', array('userid' => $USER->id, 'certrtid' => $certrt->id))) {
    notice(get_string('nocertrtsissued', 'certrt'), "$CFG->wwwroot/course/view.php?id=$course->id");
    die;
}

// Load the specific certrttype
require ("$CFG->dirroot/mod/certrt/type/$certrt->certrttype/certrt.php");

if ($action) {
    $filename = certrt_get_certrt_filename($certrt, $cm, $course) . '.pdf';
    $filecontents = $pdf->Output('', 'S');
    // Open in browser.
    send_file($filecontents, $filename, 0, 0, true, false, 'application/pdf');
    exit();
}

echo $OUTPUT->header();

$reviewurl = new moodle_url('/mod/certrt/review.php', array('id' => $cm->id));
groups_print_activity_menu($cm, $reviewurl);
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

echo html_writer::tag('p', get_string('viewed', 'certrt'). '<br />' . userdate($certrecord->timecreated), array('style' => 'text-align:center'));

$link = new moodle_url('/mod/certrt/review.php?id='.$cm->id.'&action=get');
$linkname = get_string('reviewcertrt', 'certrt');
$button = new single_button($link, $linkname);
$button->add_action(new popup_action('click', $link, array('height' => 600, 'width' => 800)));

echo html_writer::tag('div', $OUTPUT->render($button), array('style' => 'text-align:center'));

echo $OUTPUT->footer($course);