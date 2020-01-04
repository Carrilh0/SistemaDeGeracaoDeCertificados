@extends('header.index')

@section('content')

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Conclusao</th>
      <th scope="col">Visualizar Certificado</th>
    </tr>
  </thead>
  <tbody>
@foreach($certificados as $certificado)

    <tr>
      <td>{{$certificado->id}}</td>
      <td>{{$certificado->nome}}</td>
      <td>{{$certificado->email}}</td>
      <td>{{date('d/m/Y', strtotime($certificado->conclusao))}}</td>
      <td><a class="btn-success btn" href="{{ route('visualizarCertificado', $certificado->id)}}" style="margin-left: 30%"> <i class="fas fa-eye"> </i> </a> </td>
    </tr>

@endforeach
</tbody>
</table>

<div style="margin-left: 45%"> {{ $certificados->links() }} </div>

@endsection

