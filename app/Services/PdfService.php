<?php

namespace App\Services;

use setasign\Fpdi\Fpdi;

class PdfService
{
    protected $pdf;

    public function __construct()
    {
        $this->pdf = new Fpdi();
    }

    public function fillPdf($templatePath, $data, $outputPath)
    {
        $this->pdf->AddPage();
        $this->pdf->setSourceFile($templatePath);
        $tplId = $this->pdf->importPage(1);
        $this->pdf->useTemplate($tplId);

        $this->pdf->SetFont('Helvetica');
        $this->pdf->SetFontSize(12);

        // Adjust the coordinates and values as needed
        $this->pdf->SetXY(50, 50);
        $this->pdf->Write(0, $data['employee_name']);

        $this->pdf->SetXY(50, 60);
        $this->pdf->Write(0, $data['employee_no']);

        // Add more fields as necessary

        $this->pdf->Output($outputPath, 'F');
    }
}
