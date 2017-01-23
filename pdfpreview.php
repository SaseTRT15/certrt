<?php

// This file is part of the CerTR15 module for Moodle - http://moodle.org/
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
 * Preview how a certificate would looks like before creating.
 *
 * @package    mod_certrt
 * @copyright  SASE <sase@trt15.jus.br>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once("../../config.php");
require_once("$CFG->dirroot/mod/certrt/locallib.php");
require_once("$CFG->dirroot/mod/certrt/deprecatedlib.php");
require_once("$CFG->libdir/pdflib.php");

require_login();

$context = context_system::instance();
require_capability('moodle/site:config', $context);

$certrt = new stdClass;
$certrecord = new stdClass;
$course = new stdClass;

$certrecord->timecreated = time();

$certrt->printdate = 1;
$certrt->datefmt = 2;

$certrt->certrttype = optional_param('type', "A4_embedded",PARAM_TEXT);    // Certificate Type
$certrt->columnimage = optional_param('columnImg', 0, PARAM_TEXT);    // Certificate Type
$certrt->borderstyle = optional_param('bdrImg', 0,PARAM_TEXT);    // Certificate Type
$certrt->printseal = optional_param('pseal', 0,PARAM_TEXT);    // Certificate Type
$certrt->printsignature = optional_param('signature', 0,PARAM_TEXT);    // Certificate Type
$certrt->printwmark = optional_param('wmark', 0,PARAM_TEXT);    // Certificate Type
$certrt->orientation = optional_param('orientation', "L",PARAM_TEXT);    // Certificate Type
$certrt->seal = optional_param('seal', "0",PARAM_TEXT);    // Certificate Type
$certrt->bordercolor = optional_param('bclr', "0",PARAM_TEXT);    // Certificate Type
$certrt->printhours = optional_param('chours', 0,PARAM_INT);    // Certificate Type


$certrt->customtext = optional_param('ctext', '',PARAM_RAW);    // Certificate Type

$certrt->secondpage = optional_param('spage', "Conteudo do verso da pagina",PARAM_RAW);    // Certificate Type


require("$CFG->dirroot/mod/certrt/type/$certrt->certrttype/certrt.php");

$filename = 'preview.pdf';
$filecontents = $pdf->Output('', 'S');

send_file($filecontents, $filename, 0, 0, true, false, 'application/pdf');
