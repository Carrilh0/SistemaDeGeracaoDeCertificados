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
 
 
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand mb-0 " href="/">Gerador de certificado</a>
  
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      
      <a class="nav-item nav-link" href="{{ route('certificados')}}">Certificados gerados</a>
      
    </div>
  </div>
</nav>

<div class="container" style="margin-top: 2%">
    <div class="card">
    @yield('content')
    </div>
</div>
</body>
</html>