<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'enderecos';
    public $timestamps = false;
    protected $fillable = ['logradouro', 'complemento', 'numero', 'bairro', 'cidade', 'estado', 'pais', 'cep', 'clientes_id'];

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente', 'clientes_id', 'id');
    }
    public function rules()
    {
        return [
            'logradouro' => 'required|max:45',
            'numero' => 'required|max:45',
            'bairro' => 'required|max:45',
            'cidade' => 'required|max:45',
            'estado' => 'required|max:45',
            'pais' => 'required|max:45',
            'cep' => 'required|max:7',
        ];
    }
}
