<?php

namespace App\Repositories;

use Barryvdh\DomPDF\PDF;
use App\Models\Certificado;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailCertificado;

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

    public function gerarCertificadoTemporario($certificado)
    {
        $pdf = $this->pdf->loadView('pdf.index', compact('certificado'));
        $pdf->setPaper('A4', 'landscape');
        $output = $pdf->output();
        
        $nomePdf = "certificados/Certificado".time().".pdf";
        file_put_contents($nomePdf, $output);
        
        return $nomePdf;
    }

    public function enviarCertificadoTemporario($nomePdf,$email)
    {
        Mail::to($email)->send(new SendMailCertificado($nomePdf));
    }

    public function apagarCertificadoTemporario($nomePdf)
    {
        unlink(public_path($nomePdf));
    }

}