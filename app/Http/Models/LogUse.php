<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class LogUse extends Model
{
    protected $table = 'log_use';

    protected $primaryKey = 'id';

    public $timestamps = true;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'date', 'time', 'user_ir', 'ip', 'action',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}