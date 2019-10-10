<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'evento';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'titulo', 'date_ini', 'date_fom', 'programa', 'people_id', 'local', 'tipo', 'endereco', 'numero', 'complemento', 'bairro', 'cidade', 'uf', 'cep', 'site', 'contato', 'telefone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
