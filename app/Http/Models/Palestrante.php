<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Palestrante extends Model
{
    protected $table = 'palestrante';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'curriculo', 'people_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
