<!DOCTYPE html>
<html style="height:100%!important">

<head>

    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Gerador de Certificados</title>
    
    <!--<link rel='stylesheet' type='text/css' href={{ asset('css/bootstrap.css') }}>-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css" rel="stylesheet" />
    <style>
        body {
            padding:0;
            margin:0;
        	font-family:candara;
        }
    	.certificado {
    		border:1px solid #ededee;
    		border-left:100px solid #e70012;
            padding:10px;
            background:white;
            background-image:url('https://www.imagemhost.com.br/images/2019/12/11/coracao.png')!important;
            background-position:top center;
            background-repeat:no-repeat;
            background-size:500px!important;
            height:752px!important
    	}
    	.certificado h1 {
    		text-align:center;
    		font-size:60px;
    		color:#666666;
    		margin-top:50px;
    		margin-bottom:50px;
    	}
    	.conclusao {
    		text-align:center;
    		margin-top:70px;
    		margin-bottom:70px;
    	}
    </style>
</head>
<body class="A4">

<div class="row">
	<div class="certificado">

		<h1>Certificado</h1>
		<div class="col-md-12 texto">
			<p>
				Certificamos que, {{$certificado->nome}}, CPF nº {{$certificado->cpf}}, concluiu o curso de 
				Desenvolvimento de Sistemas no SENAI, CNPJ nº 03.795.071/0001-16 com carga horária de 
				1000 horas, realizado na data {{date('d/m/Y', strtotime($certificado->conclusao))}}
		</div>

		<div class="col-md-12 conclusao">
			<p><b>Salvador - BA </b>, {{date('d/m/Y', strtotime($certificado->created_at))}}</p> <br>
			__________________________________________________________ <br>
		
			
		</div>
		
	</div>
	
</div>

</body>
</html>