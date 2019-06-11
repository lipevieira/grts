@extends('layouts.app')
@section('title', 'Clientes Cadastrados')

@section('content')
<h1>Desafio GRTS Digital</h1>

<a href="{{route('cliente.insert')}}" class="btn btn-success btn-sm active" role="button" aria-pressed="true"> Inserir </a><br/><br/>

 @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<table class="table table-sm ">
  <thead class="thead-light">
    <tr>
      <th scope="col">COD</th>
      <th scope="col">NOME</th>
      <th scope="col">E-MAIL</th>
      <th scope="col">SEXO</th>
      <th scope="col">NASCIMENTO</th>
      <th scope="col">ACTIONS</th>
    </tr>
  </thead>
  <tbody>
  @foreach($cliente as $item)
    <tr>
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->nome}}</td>
      <td>{{$item->emai}}l</td>
      <td>{{$item->sexo}}</td>
      <td>{{ \Carbon\Carbon::parse($item->nascimento)->format('d/m/Y')}}</td>
      <td>
        <a href="{{route('cliente.show',$item->id)}}" class="btn btn-info btn-sm"  role="button"> Editar </a>
        <button class="btn btn-danger btn-sm " id="btnExcluirDocumento"> Excluir </button>
      </td>
    </tr>
  @endforeach  
  </tbody>
</table>



@endsection
