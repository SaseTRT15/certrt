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
 * Instance add/edit form
 *
 * @package    mod_certrt
 * @copyright  Mark Nelson <markn@moodle.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.');    ///  It must be included from a Moodle page
}

require_once ($CFG->dirroot . '/course/moodleform_mod.php');
require_once($CFG->dirroot . '/mod/certrt/locallib.php');
$PAGE->requires->js( new moodle_url($CFG->wwwroot . '/mod/certrt/module.js'));

class mod_certrt_mod_form extends moodleform_mod {

    function definition() {
        global $CFG;

        $mform = & $this->_form;
        
        $mform->addElement('header', 'general', get_string('general', 'form'));

        $mform->addElement('text', 'name', get_string('certrtname', 'certrt'), array('size' => '64'));
        if (!empty($CFG->formatstringstriptags)) {
            $mform->setType('name', PARAM_TEXT);
        } else {
            $mform->setType('name', PARAM_CLEAN);
        }
        $mform->addRule('name', null, 'required', null, 'client');

        $this->standard_intro_elements(get_string('intro', 'certrt'));

        // Issue options
        $mform->addElement('header', 'issueoptions', get_string('issueoptions', 'certrt'));
        $ynoptions = array(0 => get_string('no'), 1 => get_string('yes'));
        $mform->addElement('select', 'emailteachers', get_string('emailteachers', 'certrt'), $ynoptions);
        $mform->setDefault('emailteachers', 0);
        $mform->addHelpButton('emailteachers', 'emailteachers', 'certrt');

        $mform->addElement('text', 'emailothers', get_string('emailothers', 'certrt'), array('size' => '40', 'maxsize' => '200'));
        $mform->setType('emailothers', PARAM_TEXT);
        $mform->addHelpButton('emailothers', 'emailothers', 'certrt');

        $deliveryoptions = array(0 => get_string('openbrowser', 'certrt'), 1 => get_string('download', 'certrt'), 2 => get_string('emailcertrt', 'certrt'));
        $mform->addElement('select', 'delivery', get_string('delivery', 'certrt'), $deliveryoptions);
        $mform->setDefault('delivery', 0);
        $mform->addHelpButton('delivery', 'delivery', 'certrt');

        $mform->addElement('select', 'savecert', get_string('savecert', 'certrt'), $ynoptions);
        $mform->setDefault('savecert', 1);
        $mform->addHelpButton('savecert', 'savecert', 'certrt');

        $reportfile = "$CFG->dirroot/certrts/index.php";
        if (file_exists($reportfile)) {
            $mform->addElement('select', 'reportcert', get_string('reportcert', 'certrt'), $ynoptions);
            $mform->setDefault('reportcert', 0);
            $mform->addHelpButton('reportcert', 'reportcert', 'certrt');
        }

        $mform->addElement('text', 'requiredtime', get_string('coursetimereq', 'certrt'), array('size' => '3'));
        $mform->setType('requiredtime', PARAM_INT);
        $mform->addHelpButton('requiredtime', 'coursetimereq', 'certrt');

        // Text Options
        $mform->addElement('header', 'textoptions', get_string('textoptions', 'certrt'));

        $modules = certrt_get_mods();
        $dateoptions = certrt_get_date_options() + $modules;
        $mform->addElement('select', 'printdate', get_string('printdate', 'certrt'), $dateoptions);
        $mform->setDefault('printdate', 1);
        $mform->addHelpButton('printdate', 'printdate', 'certrt');

        //mhz - TRT15 date format in Portuguese        
        $dateformatoptions = array(1 => 'January 1, 2000', 2 => 'January 1st, 2000', 3 => '1 de Janeiro de 2000.',
            4 => 'January 2000', 5 => get_string('userdateformat', 'certrt'));
        $mform->addElement('select', 'datefmt', get_string('datefmt', 'certrt'), $dateformatoptions);
        $mform->setDefault('datefmt', 3);
        $mform->addHelpButton('datefmt', 'datefmt', 'certrt');

        $mform->addElement('select', 'printnumber', get_string('printnumber', 'certrt'), $ynoptions);
        $mform->setDefault('printnumber', 1);
        $mform->addHelpButton('printnumber', 'printnumber', 'certrt');

        $gradeoptions = certrt_get_grade_options() + certrt_get_grade_categories($this->current->course) + $modules;
        $mform->addElement('select', 'printgrade', get_string('printgrade', 'certrt'), $gradeoptions);
        $mform->setDefault('printgrade', 0);
        $mform->addHelpButton('printgrade', 'printgrade', 'certrt');

        $gradeformatoptions = array(1 => get_string('gradepercent', 'certrt'), 2 => get_string('gradepoints', 'certrt'),
            3 => get_string('gradeletter', 'certrt'));
        $mform->addElement('select', 'gradefmt', get_string('gradefmt', 'certrt'), $gradeformatoptions);
        $mform->setDefault('gradefmt', 0);
        $mform->addHelpButton('gradefmt', 'gradefmt', 'certrt');

        $outcomeoptions = certrt_get_outcomes();
        $mform->addElement('select', 'printoutcome', get_string('printoutcome', 'certrt'), $outcomeoptions);
        $mform->setDefault('printoutcome', 0);
        $mform->addHelpButton('printoutcome', 'printoutcome', 'certrt');

        $mform->addElement('text', 'printhours', get_string('printhours', 'certrt'), array('size' => '5', 'maxlength' => '255'));
        $mform->setType('printhours', PARAM_TEXT);
        $mform->addHelpButton('printhours', 'printhours', 'certrt');

        $mform->addElement('select', 'printteacher', get_string('printteacher', 'certrt'), $ynoptions);
        $mform->setDefault('printteacher', 0);
        $mform->addHelpButton('printteacher', 'printteacher', 'certrt');

        $mform->addElement('textarea', 'customtext', get_string('customtext', 'certrt'), array('cols' => '40', 'rows' => '4', 'wrap' => 'virtual'));
        $mform->setType('customtext', PARAM_RAW);
        $mform->addHelpButton('customtext', 'customtext', 'certrt');

        // mhz - second page text
        $mform->addElement('editor', 'secondpage', get_string('secondpage', 'certrt'));
        $mform->setType('secondpage', PARAM_RAW);
        $mform->addHelpButton('secondpage', 'secondpage', 'certrt');

        // Design Options
        $mform->addElement('header', 'designoptions', get_string('designoptions', 'certrt'));
        $mform->addElement('select', 'certrttype', get_string('certrttype', 'certrt'), certrt_types());
        $mform->setDefault('certrttype', 'TRT15');
        $mform->addHelpButton('certrttype', 'certrttype', 'certrt');

        $orientation = array('L' => get_string('landscape', 'certrt'), 'P' => get_string('portrait', 'certrt'));
        $mform->addElement('select', 'orientation', get_string('orientation', 'certrt'), $orientation);
        $mform->setDefault('orientation', 'L');
        $mform->addHelpButton('orientation', 'orientation', 'certrt');

        /* VMF */
        $mform->addElement('select', 'columnimage', get_string('columnimage', 'certrt'), certrt_get_images(CERT_IMAGE_COLUMN));
        $mform->setDefault('columnimage', 'Faixa_TRT15.png');
        $mform->addHelpButton('columnimage', 'columnimage', 'certrt');
        /* END VMF */
        
        $mform->addElement('select', 'borderstyle', get_string('borderstyle', 'certrt'), certrt_get_images(CERT_IMAGE_BORDER));
        $mform->setDefault('borderstyle', 'Faixa_TRT15.png');
        $mform->addHelpButton('borderstyle', 'borderstyle', 'certrt');

        $printframe = array(0 => get_string('no'), 1 => get_string('borderblack', 'certrt'), 2 => get_string('borderbrown', 'certrt'),
            3 => get_string('borderblue', 'certrt'), 4 => get_string('bordergreen', 'certrt'));
        $mform->addElement('select', 'bordercolor', get_string('bordercolor', 'certrt'), $printframe);
        $mform->setDefault('bordercolor', '0');
        $mform->addHelpButton('bordercolor', 'bordercolor', 'certrt');

        $mform->addElement('select', 'printwmark', get_string('printwmark', 'certrt'), certrt_get_images(CERT_IMAGE_WATERMARK));
        $mform->setDefault('printwmark', '0');
        $mform->addHelpButton('printwmark', 'printwmark', 'certrt');

        $mform->addElement('select', 'printsignature', get_string('printsignature', 'certrt'), certrt_get_images(CERT_IMAGE_SIGNATURE));
        $mform->setDefault('printsignature', 'EJud_2014.png');
        $mform->addHelpButton('printsignature', 'printsignature', 'certrt');

        $mform->addElement('select', 'printseal', get_string('printseal', 'certrt'), certrt_get_images(CERT_IMAGE_SEAL));
        $mform->setDefault('printseal', '0');
        $mform->addHelpButton('printseal', 'printseal', 'certrt');

        /* VMF */
        $mform->addElement('button','preview',get_string('preview', 'certrt'),array('ONCLICK'=> 'previewCertrt();'));
        
        $this->standard_coursemodule_elements();

        $this->add_action_buttons();
    }

    /**
     * mhz - Prepares the form before data are set
     *
     * Additional wysiwyg editor are prepared here, the introeditor is prepared automatically by core.
     *
     * @param array $data to be set
     * @return void
     */
    public function data_preprocessing(&$data) {
        global $CFG;

        if ($this->current->instance) {
            // editing an existing certrt - let us prepare the added editor elements (intro done automatically), and files
            $data['secondpage'] = array('text' => $data['secondpage'], 'format' => FORMAT_HTML);
        } else { //Load default
            $data['secondpage'] = array('text' => defaultVerso($this->current->course), 'format' => FORMAT_HTML);
        }
    }

 
    /**
     * Some basic validation
     *
     * @param $data
     * @param $files
     * @return array
     */
    public function validation($data, $files) {
        $errors = parent::validation($data, $files);

        // Check that the required time entered is valid
        if ((!is_number($data['requiredtime']) || $data['requiredtime'] < 0)) {
            $errors['requiredtime'] = get_string('requiredtimenotvalid', 'certrt');
        }

        return $errors;
    }

}
