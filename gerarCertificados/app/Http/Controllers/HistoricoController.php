<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoricoController extends Controller
{

    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    
    public function index()
    {
        return view('index/index');
    }

    public function gerarCertificado()
    {
       dd($this->request->all());
    }
}
