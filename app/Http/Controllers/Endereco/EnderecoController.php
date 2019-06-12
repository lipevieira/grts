<?php

namespace App\Http\Controllers\Endereco;

use App\Http\Controllers\Controller;

class EnderecoController extends Controller
{
    public function index()
    {
        return view('endereco.index');
    }
}
