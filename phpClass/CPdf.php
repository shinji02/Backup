<?php

namespace pdf;

require_once dirname(__FILE__).'/../libs/fpdf/fpdf.php';
class CPdf {
	
	
	public function __construct() {
		
	}
	
	public function genereatePDF($msg) : bool
	{
		$pdf = new \ftp\FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(40,10,'Hello World!');
		$pdf->Output();
		return true;
	}
	
}
