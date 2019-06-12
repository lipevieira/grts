@extends('layouts.app')
@section('title', 'Cadastro de clientes')

@section('content')
<h3>Editar cliente</h3>

@if ( isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{route('cliente.update')}}">
 {!! csrf_field() !!}
<input type="hidden" name="id" value="{{$cliente->id}}">
  <div class="form-group">
    <label for="nome">Nome:</label>
    <input type="text" class="form-control" id="nome" name="nome" aria-describedby="emailHelp"  value="{{$cliente->nome}}">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="{{$cliente->email}}">
  </div>
  <div class="form-group">
    <label for="telefone">Telefone</label>
    <input type="number" class="form-control" id="telefone" name="telefone" value="{{$cliente->telefone}}">
  </div>
  <div class="form-group">
    <label for="nascimento">Nascimento</label>
    <input type="date" class="form-control" id="nascimento" name="nascimento" value="{{$cliente->nascimento}}">
  </div>
  <div class="form-group">
    <label for="sexo">Sexo</label>
    <select class="custom-select" id="sexo" name="sexo">
        <option selected value="{{$cliente->sexo}}">{{$cliente->sexo}}</option>
        <option value="M">M</option>
        <option value="F">F</option>
    </select>
  </div>
 
  <button type="submit" class="btn btn-primary">Atualizar</button>
</form>

@endsection