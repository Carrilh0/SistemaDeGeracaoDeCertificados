<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CertificadoRepositorie;

use PDF;

class CertificadoController extends Controller
{
    private $request;
    private $certificadoRepositorie;
    private $email;

    public function __construct(Request $request, CertificadoRepositorie $certificadoRepositorie)
    {
        $this->request = $request;
        $this->certificadoRepositorie = $certificadoRepositorie;
    }

    public function index()
    {
        return view('index.index');
    }

    public function cadastrarEnviarCertificado()
    {
        $dados = $this->request->all();
        $certificado = $this->certificadoRepositorie->cadastrarCertificado($dados);

        $nomePdf = $this->certificadoRepositorie->gerarCertificadoTemporario($certificado);

        $this->certificadoRepositorie->enviarCertificadoTemporario($nomePdf, $certificado->email);

        $this->certificadoRepositorie->apagarCertificadoTemporario($nomePdf);

        return view('index.index');
    }
}
