<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;


class Cliente extends Model
{
    // protected $table = 'clientes';
    public $timestamps = false;
    protected $fillable = ['nome', 'email', 'telefone', 'sexo', 'nascimento'];

    public function enderecos()
    {
        return $this->hasMany('App\Models\Endereco', 'clientes_id', 'id');
    }
    public function rules()
    {
        return [
            'nome' => 'required|max:191',
            'email' => 'required|unique:clientes,id|max:40',
            'telefone' => 'required|min:3|max:150',
            'sexo' => 'required|max:1',
        ];

    }
}
