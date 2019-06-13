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
<table class="table table-sm" id="tblCliente">
  <thead>
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
      <td>{{$item->email}}l</td>
      <td>{{$item->sexo}}</td>
      <td>{{$item->nascimento}}</td>
      <td>
        <a href="{{route('cliente.show',$item->id)}}" class="btn btn-info btn-sm"  role="button"> Editar </a>
        <button class="btn btn-danger btn-sm " id_cliente="{{$item->id}}" id="btnExcluir" data-url="{{route('cliente.show.delete')}}"> Excluir </button>
      </td>
    </tr>
  @endforeach 
  <tfoot>
    <tr>
      <th scope="col">COD</th>
      <th scope="col">NOME</th>
      <th scope="col">E-MAIL</th>
      <th scope="col">SEXO</th>
      <th scope="col">NASCIMENTO</th>
      <th scope="col">ACTIONS</th>
    </tr>
  </tfoot> 
  </tbody>
</table>
<!-- Modal confirma a exclusão de cliente no sistema -->
<div class="modal" tabindex="-1" role="dialog" id="confirmaExclucao" >
   <div class="modal-dialog"  role="document">
      <div class="modal-content ">
         <div class="modal-body">
            <center><h4>Deseja realmente excluir este cliente?</h4><center>
          <form method="POST" action="{{route('cliente.delete')}}">
               {!! csrf_field() !!}
               <input type="hidden" name="id_excluir" id="id_excluir" value="">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-danger btn-sm">
                    Confirmar Exclusão 
                </button>
          </form>
         </div>
      </div>
   </div>
</div>



@endsection
