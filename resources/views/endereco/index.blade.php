@extends('layouts.app')
@section('title', 'Endereços Cadastrados')

@section('content')
<h1>Cadastro de Endereços</h1>

<table class="table table-sm" id="tblCliente">
  <thead class="thead-dark">
    <tr>
      <th scope="col">COD</th>
      <th scope="col">LOGRADOURO</th>
      <th scope="col">COMPLEMENTO</th>
      <th scope="col">NUMERO</th>
      <th scope="col">BAIRRO</th>
      <th scope="col">CIDADE</th>
      <th scope="col">ESTADO</th>
      <th scope="col">PAIS</th>
      <th scope="col">CEP</th>
      <th scope="col">ACTIONS</th>
    </tr>
  </thead>
  <tbody>

    <tr>
      <th scope="row">Linha</th>
      <td>Linha</td>
      <td>Linha</td>
      <td>Linha</td>
      <td>Linha</td>
      <td>Linha</td>
      <td>Linha</td>
      <td>Linha</td>
      <td>Linha</td>
      <td>Linha</td>
      <td>
       
    </tr>
 
  <tfoot class="thead-dark">
    <tr>
      <th scope="col">COD</th>
      <th scope="col">LOGRADOURO</th>
      <th scope="col">COMPLEMENTO</th>
      <th scope="col">NUMERO</th>
      <th scope="col">BAIRRO</th>
      <th scope="col">CIDADE</th>
      <th scope="col">ESTADO</th>
      <th scope="col">PAIS</th>
      <th scope="col">CEP</th>
      <th scope="col">ACTIONS</th>
    </tr>
  </tfoot> 
  </tbody>
</table>

@endsection