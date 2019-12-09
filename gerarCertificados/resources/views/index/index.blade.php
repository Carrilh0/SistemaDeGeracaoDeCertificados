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
 
 
<nav class="navbar navbar-dark bg-primary">
  <span class="navbar-brand mb-0 h1">Gerador de certificado</span>
</nav>

<div class="container" style="margin-top: 2%">
  <div class="card">
    
    <div class="card-header">
      Formulário de geração de certificado
    </div>
    
    <div class="card-body">
        <form>
          <div class="form-group">
            <label for="nome">Nome do aluno:</label>
            <input type="text" class="form-control" id="nome">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          
          <div class="form-group">
            <label for="cpf">CPF:</label>
            <input type="text" class="form-control" id="cpf">
          </div>

          <div class="form-group">
          <label for="email">Email:</label>
            <input type="text" class="form-control" id="email">
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
  </div>
</div>

</body>
</html>