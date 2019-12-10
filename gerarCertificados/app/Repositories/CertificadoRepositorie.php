<?php

namespace App\Repositories;

use Barryvdh\DomPDF\PDF;
use App\Models\Certificado;

Class CertificadoRepositorie
{

    private $pdf;

    public function __construct(PDF $pdf, Certificado $certificado)
    {
        $this->pdf = $pdf;
        $this->certificado = $certificado;
    }

    public function cadastrarCertificado($dados)
    {
        return $this->certificado->create($dados);
    }

    public function gerarCertificado($certificado)
    {
        $pdf = $this->pdf->loadView('pdf.index', compact($certificado));
        //dd($pdf);
       
        return $pdf->stream();
    }

    public function downloadPdf($certificado)
    {
        
    }

}