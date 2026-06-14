<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

if ( ! function_exists('pdfGenerator')) {

  class MYPDF extends TCPDF {

// 	  // Load table data from file
// 	  public function LoadData($file) {
// 		  // Read file lines
// 		  $lines = file($file);
// 		  $data = array();
// 		  foreach($lines as $line) {
// 			  $data[] = explode(';', chop($line));
// 		  }
// 		  return $data;
// 	  }

	  // Colored table
	  public function ColoredTable($header,$data) {
		  // Colors, line width and bold font
		  $this->SetFillColor(255, 0, 0);
		  $this->SetTextColor(255);
		  $this->SetDrawColor(128, 0, 0);
		  $this->SetLineWidth(0.3);
		  $this->SetFont('', 'B');
		  // Header
		  $w = array(40, 35, 40, 45);
		  $num_headers = count($header);
		  for($i = 0; $i < $num_headers; ++$i) {
			  $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
		  }
		  $this->Ln();
		  // Color and font restoration
		  $this->SetFillColor(224, 235, 255);
		  $this->SetTextColor(0);
		  $this->SetFont('');
		  // Data
		  $fill = 0;
		  foreach($data as $row) {
			  $this->Cell($w[0], 6, $row[0], 'LR', 0, 'L', $fill);
			  $this->Cell($w[1], 6, $row[1], 'LR', 0, 'L', $fill);
			  $this->Cell($w[2], 6, $row[2], 'LR', 0, 'R', $fill);
			  $this->Cell($w[3], 6, $row[3], 'LR', 0, 'R', $fill);
			  $this->Ln();
			  $fill=!$fill;
		  }
		  $this->Cell(array_sum($w), 0, '', 'T');
	  }
  }
  function pdfGenerator($data,$header,$filename,$author,$title,$subject){
  
 

    $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);      
    if (ob_get_contents()) ob_end_clean();
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor($author);
    $pdf->SetTitle($title);
    $pdf->SetSubject($subject);
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, $subject, array(0,64,255), array(0,64,128));
    $pdf->setFooterData(array(0,64,0), array(0,64,128));
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//     if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
// 	    require_once(dirname(__FILE__).'/lang/eng.php');
// 	    $pdf->setLanguageArray($l);
//     }
    $pdf->setFontSubsetting(true);
    $pdf->SetFont('times', '', 14, '', true);
    $pdf->AddPage();
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
$header = array($header['header'][0], $header['header'][1], $header['header'][2], $header['header'][3]);
   // $data = $pdf->LoadData('table_data_demo.txt');
    $pdf->ColoredTable($header, $data);
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
    $pdf->Output($filename, 'I');    
  }
}
/* End of file pdf_helper.php */
/* Location: ./system/helpers/pdf_helper.php */
?>