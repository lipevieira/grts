<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Endereco;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $cliente = Cliente::all();

        return view('cliente.index', compact('cliente'));
    }
    public function showViewInsert()
    {
        return view('cliente.insert');
    }
    public function save(Request $request)
    {
        $dataForm = $request->except('_token');

        $cliente = new Cliente();
        $endereco = new Endereco();
        #Validação do formulario
        $msg = [
            'nome.required' => 'O campo nome é obrigatorio',
            'email.unique' => 'Esse E-mail já está cadastrado',
            'email.required' => 'O campo E-mail é obrigatório',
            'telefone.required' => 'O campo telefone é obrigatório',
            'sexo.required' => 'O campo Sexo é obrigatório',

        ];
        $rules = $cliente->rules();

        $this->validate($request, $rules, $msg);

        #Convertendo data
        if ($dataForm['nascimento'] != null) {

            $nascimento = date('d/m/Y', strtotime($dataForm['nascimento']));
            $dataForm['nascimento'] = $nascimento;
        } else {
            unset($dataForm['nascimento']);
        }

        $cliente = Cliente::create($dataForm);

        $endereco = $cliente->enderecos()->create($dataForm);

        return redirect()->route('cliente.index')
            ->with('success', 'Cliente salvo com sucesso!');

    }
    public function showCliente(Request $request)
    {
        $id = $request->id;
        $cliente = Cliente::find($id);

        return view('cliente.update', compact('cliente'));
    }
    public function updateCliente(Request $request)
    {
        $cliente = new Cliente();

        $dataForm = $request->except('_token');
        $msg = [
            'nome.required' => 'O campo nome é obrigatorio',
            'email.unique' => 'Esse E-mail já está cadastrado',
            'email.required' => 'O campo E-mail é obrigatório',
            'telefone.required' => 'O campo telefone é obrigatório',
            'sexo.required' => 'O campo Sexo é obrigatório',

        ];
        $rules = $cliente->rules();

        $this->validate($request, $rules, $msg);

        #Convertendo data
        if ($dataForm['nascimento'] != null) {

            $nascimento = date('d/m/Y', strtotime($dataForm['nascimento']));
            $dataForm['nascimento'] = $nascimento;
        } else {
            unset($dataForm['nascimento']);
        }

        $cliente = Cliente::find($request->id);
        $cliente->update($dataForm);

        return redirect()->route('cliente.index')
            ->with('success', 'Cliente alterado com sucesso!');
    }
    public function showClienteDelete(Request $request)
    {
        $id = $request->id;
        $cliente = Cliente::find($id);

        return response()->json($cliente);
    }
    public function delete(Request $request)
    {
        $cliente = Cliente::find($request->id_excluir);
        $cliente->enderecos()->delete();
        $cliente->delete();

        return redirect()->route('cliente.index')
            ->with('success', 'Cliente Deletado com sucesso!');
    }
}
