@extends('header.index')

@section('content')
    
    <div class="card-header">
      Formulário de geração de certificado para o curso de Desenvolvimento de sistemas no SENAI
    </div>
    
    <div class="card-body">

    @if ($errors->any())
      <div class="alert alert-danger">
		    <a href="#" class="close" data-dismiss="alert" aria-label="close" style="color:black!important">&times;</a>
          <ul style="padding-bottom:0;margin-bottom:0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
      </div>
    @endif


        <form method="POST" action="{{ route('cadastrarCertificado')}}">
        @csrf
          
        <div class="row">

          <div class="col-md-4">
            <div class="form-group">
              <label for="nome">Nome do aluno:</label>
              <input required type="text" class="form-control" value="{{ old('nome')}}" name="nome" id="nome" placeholder="Digite aqui...">
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="form-group">
              <label for="cpf">CPF do aluno:</label>
              <input required type="text" class="form-control" value="{{ old('cpf') }}" name="cpf" id="cpf" placeholder="Digite aqui...">
              <small id="emailHelp" class="form-text text-muted">Nunca compartilharemos seu CPF com ninguém.</small>
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="form-group">
            <label for="email">Email do aluno:</label>
              <input required type="text" class="form-control" value="{{ old('email')}}" name="email" id="email" placeholder="Digite aqui...">
              <small id="emailHelp" class="form-text text-muted">Nunca compartilharemos seu email com ninguém.</small>
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="form-group">
            <label for="conclusao">Data de Conclusao:</label>
              <input required type="date" class="form-control" value="{{ old('conclusao')}}" name="conclusao" id="conclusao" placeholder="Digite aqui...">
            </div>
          </div>
          
          <div class="col-md-12" style="text-align:right;margin-top:20px">
            <div class="form-group">
              <button type="submit" id="salvar" class="btn btn-primary">Salvar</button>
            </div>
          </div>

        </div>
        </form>
    </div>
  </div>
</div>
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"> </script>
<script>

function emailValido(mail) {   
    var er = new RegExp(/^[A-Za-z0-9_\-\.]+@[A-Za-z0-9_\-\.]{2,}\.[A-Za-z0-9]{2,}(\.[A-Za-z0-9])?/);   
     if (typeof(mail) == "string") {       
        if (er.test(mail)) { 
            return true; 
        }  
    } else if(typeof(mail) == "object") {     
        if (er.test(mail.value)) {                   
            return true;                
        }   
    }
    else {      
        return false;       
    }
}

function validaCPF(cpf)
  {
    var numeros, digitos, soma, i, resultado, digitos_iguais;
    digitos_iguais = 1;
    if (cpf.length < 11)
          return false;
    for (i = 0; i < cpf.length - 1; i++)
          if (cpf.charAt(i) != cpf.charAt(i + 1))
                {
                digitos_iguais = 0;
                break;
                }
    if (!digitos_iguais)
          {
          numeros = cpf.substring(0,9);
          digitos = cpf.substring(9);
          soma = 0;
          for (i = 10; i > 1; i--)
                soma += numeros.charAt(10 - i) * i;
          resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
          if (resultado != digitos.charAt(0))
                return false;
          numeros = cpf.substring(0,10);
          soma = 0;
          for (i = 11; i > 1; i--)
                soma += numeros.charAt(11 - i) * i;
          resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
          if (resultado != digitos.charAt(1))
                return false;
          return true;
          }
    else
        return false;
  }
  
   $( document ).ready(function(){
        $('#salvar').click(function(){
            if($('#nome').val() == ''){
              alert("O campo nome é obrigatiorio");
                return false;
            }else if ($('#cpf').val() == '') {
              alert("O campo CPF é obrigatório!"); 
				        return false;
            }else if ( ! validaCPF($('#cpf').val())) {
				        alert("Digite um CPF valido!"); 
				        return false;
            }else if ($('#email').val() == '') {
				        alert("O campo E-mail é obrigatório!"); 
				        return false;
            }else if ( ! emailValido($('#email').val())) {
                alert("Digite um E-mail valido!"); 
				        return false;
			      }else if ($('#conclusao').val() == '') {
              alert("O campo Conclusão é obrigatório!"); 
				        return false;
			      }

        });
    });
</script>

@endsection