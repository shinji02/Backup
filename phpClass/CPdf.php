<?php

namespace pdf;

require_once dirname(__FILE__).'/../libs/fpdf/fpdf.php';
require_once dirname(__FILE__).'/../conf/siteConf.php';
use conf;

class CPdf {
	public $pdf = null;
	
	public function __construct() {
		$this->pdf = new FPDF();
	}
	
	public function genereatePDF($Rep)
	{
		ob_end_clean();
		$this->pdf->AddPage();
		$this->pdf->SetFont('Arial','B',16);
		$this->genereateHeaderDocument(conf\siteConf::SITENAME);
		$this->generateEntry($Rep);
		$doc = $this->pdf->Output('S');
		return $doc;
	}
	
	public function genereateHeaderDocument($SiteName)
	{
		// Arial bold 15
		$this->pdf->SetFont('Arial','B',15);
		// Move to the right
		$this->pdf->Cell(58);
		// Title
		$this->pdf->Cell(88,10,$SiteName,1,0,'L');
		// Line break
		$this->pdf->Ln(20);
	}
	
	public function generateEntry($Rep)
	{
		$heure = date("H:i");
		foreach ($Rep as $key =>$value) {
			$this->pdf->Cell(40,5,'Non du site: '.$value['name']);
			$this->pdf->Ln(5);
			$this->pdf->Cell(40,5,'Backup: '.$value['statut']);
			$this->pdf->Ln(5);
			$this->pdf->Cell(40,5,'Heure: '.$heure);
			$this->pdf->Ln(10);
		}
	}
}
