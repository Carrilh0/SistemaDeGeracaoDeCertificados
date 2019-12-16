<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CertificadoRepositorie;
use App\RequestValidations\CertificadoValidation;

use PDF;

class CertificadoController extends Controller
{
    private $request;
    private $certificadoRepositorie;
    private $certificadoValidation;

    public function __construct(Request $request, CertificadoRepositorie $certificadoRepositorie, CertificadoValidation $certificadoValidation)
    {
        $this->request = $request;
        $this->certificadoRepositorie = $certificadoRepositorie;
        $this->certificadoValidation = $certificadoValidation;
    }

    public function index()
    {
        return view('index.index');
    }

    public function cadastrarEnviarCertificado()
    {
        $dados = $this->request->all();

        $validate = $this->certificadoValidation->cadastrarValidation($dados);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $certificado = $this->certificadoRepositorie->cadastrarCertificado($dados);

        $nomePdf = $this->certificadoRepositorie->gerarCertificadoTemporario($certificado);

        $this->certificadoRepositorie->enviarCertificadoTemporario($nomePdf, $certificado->email);

        $this->certificadoRepositorie->apagarCertificadoTemporario($nomePdf);

        return view('index.index');
    }
}
