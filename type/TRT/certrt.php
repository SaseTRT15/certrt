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
 * mhz - A4_embedded certrt type for TRT15 
 *
 * @package    mod_certrt
 * @copyright  Mark Nelson <markn@moodle.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$pdf = new TCPDF($certrt->orientation, 'mm', 'A4', true, 'UTF-8', false);

$pdf->SetTitle($certrt->name);
$pdf->SetProtection(array('modify'));
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetAutoPageBreak(false, 0);
$pdf->AddPage();

// Define variables
// Landscape
if ($certrt->orientation == 'L') {
    $x = 35;
    $y = 20;
    $sealx = 230;
    $sealy = 150;
    //TRT15 - signature
    $sigx = 112;
    $sigy = $y + 100;
    $custx = 47;
    $custy = 155;
    $wmarkx = 50;
    $wmarky = 31;
    $wmarkw = 212;
    $wmarkh = 148;
    //TRT15 - border
    $colx = 10;
    $coly = 10;
    $colw = 36;
    $colh = 192;
    $brdrx = 0;
    $brdry = 0;
    $brdrw = 297;
    $brdrh = 210;
    $codex = 225;
    $codey = 200;
} else { // Portrait
    $x = 30;
    $y = 40;
    $sealx = 150;
    $sealy = 220;
    $sigx = 40;
    $sigy = 200;
    $custx = 30;
    $custy = 230;
    $wmarkx = 26;
    $wmarky = 58;
    $wmarkw = 158;
    $wmarkh = 170;
    $brdrx = 0;
    $brdry = 0;
    $brdrw = 210;
    $brdrh = 297;
    $codey = 250;
}

//TRT - no need for this...
// Add images and lines
//certrt_print_image($pdf, $certrt, CERT_IMAGE_BORDER, $brdrx, $brdry, $brdrw, $brdrh);
//certrt_draw_frame($pdf, $certrt);
// Set alpha to semi-transparency

certrt_print_image($pdf, $certrt, CERT_IMAGE_BORDER, $brdrx, $brdry, $brdrw, $brdrh);
certrt_draw_frame($pdf, $certrt);

$pdf->SetAlpha(0.2);
certrt_print_image($pdf, $certrt, CERT_IMAGE_WATERMARK, $wmarkx, $wmarky, $wmarkw, $wmarkh);
$pdf->SetAlpha(1);

//TRT needs this!
// mhz - TRT signature
certrt_print_image($pdf, $certrt, CERT_IMAGE_SIGNATURE, $sigx, $sigy, 95, 95);

certrt_print_image($pdf, $certrt, CERT_IMAGE_SEAL, $sealx, $sealy, '', '');

// mhz - TRT border- changed to column by vmf
certrt_print_image($pdf, $certrt, CERT_IMAGE_COLUMN, $colx, $coly, $colw, $colh);


// mhz - using TCPDF fonts
// it seems there's no need anymore to addTTFfont:
// from TCPDF documentation
// $fontname = $pdf->addTTFfont('/path-to-font/DejaVuSans.ttf', 'TrueTypeUnicode', '', 32);
//
//$defaultfonts = $CFG->dirroot.'/lib/tcpdf/fonts/';
$defaultfonts = "$CFG->dirroot/mod/certrt/fonts";

$fontbook = TCPDF_FONTS::addTTFfont("$defaultfonts/book.ttf", 'TrueTypeUnicode', '', 30);
$fonte111 = TCPDF_FONTS::addTTFfont("$defaultfonts/e111viva.ttf", 'TrueTypeUnicode', '', 30);

//$fontbook = $defaultfonts.'book.ttf';
//$fonte111 = $defaultfonts.'e111viva.ttf';
//$fontBookBold = $pdf->addTTFfont($fontbook, 'TrueTypeUnicode', '', 30);
//$fontEnglish111 = $pdf->addTTFfont($fonte111, 'TrueTypeUnicode', '', 30);
//
// from now, it seems we can just 'use' the fonts if they are put in lib/tcpdf/fonts
// certrt_print(......... 'book'....);
// 'book' is the file name ('book.ttf')

// mhz - título do certificado em Bold
$modY = $y;
certrt_print_text($pdf, $x, $modY, 'C', $fontbook , '', 25, get_string('title', 'certrt'));
//certrt_print_text($pdf, $x, $y, 'C', 'book' , '', 25, get_string('title', 'certrt'));

$modY += 30;
//"A Escola Judicial ... certifica que" //"certify" field inside lang/pt_br/certrt.php
certrt_print_text($pdf, $x, $modY, 'C', 'Times' , '', 18, get_string('certify', 'certrt'));

// mhz - username
$modY += 13;
//certrt_print_text($pdf, $x, $y + 33, 'C', 'e111viva' , '', 33, fullname($USER));
certrt_print_text($pdf, $x, $modY, 'C', $fonte111 , '', 33, fullname($USER));

// mhz - participou do curso...  //customtext
$modY += 19;
certrt_print_text($pdf, $x, $modY, 'J', 'Times' , null, 18, $certrt->customtext);
//certrt_print_text($pdf, $custx, $custy, 'L', null, null, null, $certrt->customtext);
// mhz - date
$modY += 40;
certrt_print_text($pdf, $x, $modY, 'C', 'Helvetica' , '', 15,  'Campinas, ' . certrt_get_date($certrt, $certrecord, $course));

// mhz - validation code
certrt_print_text($pdf, $codex, $codey, 'R', 'Times' , '', 10, get_string('validationcode','certrt', certrt_get_code($certrt, $certrecord)));



// ##############################################################################

// mhz - inserting a new page to print the HTML backpage
$pdf->AddPage();

// mhz - repositioning text to maximize the usage
$x = 10;
$y = 10;

// mhz - align='L' (left), $size=10
// vmf alterado de writeHTMLCell para WriteHTML
$pdf->setFont('Times', '' , 8);
$pdf->SetXY($x, $y);
$pdf->writeHTML($certrt->secondpage . (($certrt->printhours) ? "<p style=\"text-align:center;margin-top:400px;\"><b>"
        . get_string('credithours', 'certrt') . ":</b> "
        . $certrt->printhours . get_string('credithourstype', 'certrt') .  "</p>": ""), true, false, true, false, '');

?>
