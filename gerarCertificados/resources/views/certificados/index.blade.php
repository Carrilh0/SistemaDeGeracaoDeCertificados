@extends('header.index')

@section('content')

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Conclusao</th>
      <th scope="col">Visualizar Curriculo</th>
    </tr>
  </thead>
  <tbody>
@foreach($certificados as $certificado)

    <tr>
      <td>{{$certificado->id}}</td>
      <td>{{$certificado->nome}}</td>
      <td>{{$certificado->email}}</td>
      <td>{{$certificado->conclusao}}</td>
      <td><button class="btn-success btn disabled" style="margin-left: 30%"> s </button></td>
    </tr>

@endforeach
</tbody>
</table>

<div style="margin-left: 45%"> {{ $certificados->links() }} </div>

@endsection

