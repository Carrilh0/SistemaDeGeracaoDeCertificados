<!DOCTYPE html>
<html style="height:100%!important">

<head>

    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Gerador de Certificados</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' href={{ asset('css/bootstrap.css') }}>
    
</head>
<body>

Nome: {{$certificado->nome}} <br>
Email: {{$certificado->email}} <br>
CPF: {{$certificado->cpf}} <br>
Data de conclusão: {{$certificado->conclusao}} <br>



</body>
</html>