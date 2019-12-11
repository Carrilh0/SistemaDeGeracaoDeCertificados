<!DOCTYPE html>
<html style="height:100%!important">

<head>

    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Gerador de Certificados</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' href={{ asset('css/bootstrap.css') }}>

    <style>
      body {
        background:#e0e0e0;
      }
    </style>
    
</head>
<body>
 
 
<nav class="navbar navbar-dark bg-primary">
  <span class="navbar-brand mb-0 h1">Gerador de certificado</span>
</nav>

<div class="container" style="margin-top: 2%">
  <div class="card">
    
    <div class="card-header">
      Formulário de geração de certificado
    </div>
    
    <div class="card-body">
        <form method="POST" action="{{ route('cadastrarCertificado')}}">
        @csrf
          
        <div class="row">

          <div class="col-md-4">
            <div class="form-group">
              <label for="nome">Nome do aluno:</label>
              <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite aqui...">
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="form-group">
              <label for="cpf">CPF do aluno:</label>
              <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Digite aqui...">
              <small id="emailHelp" class="form-text text-muted">Nunca compartilharemos seu CPF com ninguém.</small>
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="form-group">
            <label for="email">Email do aluno:</label>
              <input type="text" class="form-control" name="email" id="email" placeholder="Digite aqui...">
              <small id="emailHelp" class="form-text text-muted">Nunca compartilharemos seu email com ninguém.</small>
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="form-group">
            <label for="conclusao">Data de Conclusao:</label>
              <input type="date" class="form-control" name="conclusao" id="conclusao" placeholder="Digite aqui...">
            </div>
          </div>
          
          <div class="col-md-12" style="text-align:right;margin-top:20px">
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
          </div>

        </div>
        </form>
    </div>
  </div>
</div>

</body>
</html>