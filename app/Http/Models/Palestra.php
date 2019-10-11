<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Palestra extends Model
{
    protected $table = 'palestra';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'titulo', 'conteudo', 'evento_id', 'palestrante_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
