<?php
require_once("../../config.php");
require_once("$CFG->dirroot/mod/certrt/locallib.php");
require_once("$CFG->dirroot/mod/certrt/deprecatedlib.php");
require_once("$CFG->libdir/pdflib.php");

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