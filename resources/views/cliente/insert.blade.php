@extends('layouts.app')
@section('title', 'Cadastro de clientes')

@section('content')
{{--Caso os campos do forumario de inserir seja invalidos mostrar essa MSG  --}}
        
@if(isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
@endif 
 <form class="was-validated needs-validation" method="POST" action="{{route('cliente.save')}}">
    {!! csrf_field() !!}
        <div class="form-row ">
            <div class="form-group col-md-6">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control is-invalid" id="nome" name="nome" placeholder="nome" value="">

            <label for="email">E-mail:</label>
            <input type="email" class="form-control is-valid" id="email" name="email" placeholder="E-mail" value="" required>

            <label for="telefone">Telefone</label>
            <input type="number" class="form-control is-invalid" id="telefone" name="telefone" placeholder="Telefone" aria-describedby="inputGroupPrepend3"value=""  required>

            <label for="sexo">Sexo</label>
               <select class="custom-select" id="sexo" name="sexo">
                    <option selected></option>
                    <option value="1">M</option>
                    <option value="2">F</option>
               </select>

            <label for="nascimento">Nascimento</label>
            <input type="date" class="form-control" id="nascimento" name="nascimento"  value=""  >

            <label for="logradoro">CEP</label>
            <input type="number" class="form-control is-invalid" id="cep" name="cep" placeholder="CEP" value=""required>
        </div>

        <div class="form-group col-md-6">
         

            <label for="logradoro">Logradoro</label>
            <input type="text" class="form-control is-valid" id="logradouro" name="logradouro" placeholder="Logradoro" value=""required readonly>

            <label for="complemento">Complemento</label>
            <input type="text" class="form-control is-valid" id="complemento" name="complemento" placeholder="Complemento" value="">

            <label for="numero">Numero</label>
            <input type="number" class="form-control is-valid" id="numero" name="numero" placeholder="Numero" value="" required>

            <label for="bairro">Bairro</label>
            <input type="text" class="form-control is-invalid" id="bairro" name="bairro" placeholder="Bairro" aria-describedby="inputGroupPrepend3" value="" required readonly>

            <label for="cidade">Cidade</label>
            <input type="text" class="form-control is-invalid" id="cidade" name="cidade" placeholder="Cidade" value="" required readonly>

            <label for="estado">Estado</label>
            <input type="text" class="form-control is-invalid" id="estado" name="estado" placeholder="Estado" value="" required readonly>
        </div>
            <div class="form-group col-md-12">
            <label for="pais" class="col-form-label">Pais:</label>
             <select class="custom-select" id="inputGroupSelect01" name="pais">
                    <option selected></option>
                    <option value="Brazil">Brazil</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Uruguai">Uruguai</option>
               </select>   
            </div>
            <input type="hidden" name="id" value="" id="id">
        </div>
           <button type="submit" class="btn btn-primary  form-control" >Salvar</button>
    </div>
</form>
@endsection