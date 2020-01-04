<?php

namespace App\Repositories;

use Barryvdh\DomPDF\PDF;
use App\Models\Certificado;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailCertificado;
Class CertificadoRepositorie
{

    private $pdf;
    private $certificado;
    private $mail;

    public function __construct(PDF $pdf, Certificado $certificado, Mail $mail)
    {
        $this->pdf = $pdf;
        $this->certificado = $certificado;
        $this->mail = $mail;
    }

    public function verCertificados()
    {
        return $this->certificado->paginate(15);
    }

    public function cadastrarCertificado($dados)
    {
        return $this->certificado->create($dados);
    }

    public function visualizarCertificado($id)
    {
        $certificado = $this->certificado->find($id);
        $pdf = $this->pdf->loadView('pdf.index', compact('certificado'));
        $pdf->setPaper('A4', 'landscape');
        return $output = $pdf->stream();
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