<?php

namespace resca;

use Illuminate\Database\Eloquent\Model;


class Rolusuario extends Model
{
    

    protected $table='role_user';
    protected $primaryKey='id';
    public $timestamps=true;
    protected $fillable = [
        'role_id', 'user_id'
    ];


    protected $guarded =[

    ];
}
