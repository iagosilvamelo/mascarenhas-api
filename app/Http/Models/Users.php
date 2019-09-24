<?php

namespace App\Http\Models;

use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Users extends Model implements AuthenticatableContract
{
    use AuthenticableTrait;

    //
    //  NOME DA TABELA
    //
    protected $table = 'users';
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
        'id', 'username', 'password', 'status', 'people_id', 'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
