<?php

namespace resca;

use Illuminate\Database\Eloquent\Model;


class Detalleusuario extends Model
{
   
    protected $table='users';
    protected $primaryKey='id';
    public $timestamps=true;

    protected $fillable =[
        'name',
        'email',
        'password',
        'remember_toke'
    ];

    protected $guarded =[

    ];
}
