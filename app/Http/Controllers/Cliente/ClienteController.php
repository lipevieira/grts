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

        // $rules     = $cliente->rules();
        // $rulesEnd  = $endereco->rules();
        #validamdo formulario
        // $this->validate($request, $rules);


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
        // $dataForm = $request->except('_token');
        // $cliente = new Cliente();

        // $rules = $cliente->rules();
        // $this->validate($request, $rules);

        dd($dataForm);
        return view('cliente.update');


    }
}

