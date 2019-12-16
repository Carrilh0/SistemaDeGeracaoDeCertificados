<?php

namespace App\RequestValidations;

use Illuminate\Support\Facades\Validator; 

class CertificadoValidation 
{

    public function cadastrarValidation($dados)
    {
        return Validator::make($dados, [
            'nome' => 'required|string|max:50',
            'email' => 'required|email|unique:certificados',
            'cpf' => 'required|max:11|unique:certificados',
            'conclusao' => 'required|date'
        ]);
    }

}