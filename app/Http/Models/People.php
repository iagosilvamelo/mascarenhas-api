<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{

    //
    //  NOME DA TABELA
    //
    protected $table = 'people';
    //
    //  SETA PRIMARYKEY
    //
    protected $primaryKey = 'id';
    //
    //  DESABILITA CAMPO updated_at
    //
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'nome', 'type', 'endereco', 'numero', 'complemento', 'bairro', 'cidade', 'uf', 'cep', 'email', 'fone', 'celular', 'nascimento',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
