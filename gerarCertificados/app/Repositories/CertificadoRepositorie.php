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

    public function downloadPdf($dados)
    {
        dd($dados['nome']);
        $pdf = $this->pdf->loadView('pdf', compact());
       
        return $pdf->stream();
    }

}