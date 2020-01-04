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

    public function certificadosGerados()
    {
        $certificados = $this->certificadoRepositorie->verCertificados();

        return view('certificados.index',compact('certificados'));
    }

    public function cadastrarEnviarCertificado()
    {
        $dados = $this->request->all();

        $validate = $this->certificadoValidation->cadastrarValidation($dados);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        //Tratando de erro caso alguma parte do código falhe
        try {
            $certificado = $this->certificadoRepositorie->cadastrarCertificado($dados);
        } catch (Exception $e){
            dd($e->getMessage());
        }

        try {
            $nomePdf = $this->certificadoRepositorie->gerarCertificadoTemporario($certificado);
        } catch (Exception $e){
            dd($e->getMessage());
        }    
        
        try {
            $this->certificadoRepositorie->enviarCertificadoTemporario($nomePdf, $certificado->email);
        } catch (Exception $e){
            dd($e->getMessage());
        }
        
        try {
            $this->certificadoRepositorie->apagarCertificadoTemporario($nomePdf);
        } catch (Exception $e){
            dd($e->getMessage());
        }

        return view('index.index');
    }
}
