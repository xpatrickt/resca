<?php

namespace resca;

use Illuminate\Database\Eloquent\Model;

class Entidad extends Model
{
    protected $table='entidad';
    protected $primaryKey='identidad';

    public $timestamps=false;

    protected $fillable=[
    	'nombreentidad','direccionentidad','telefonoentidad','emailentidad','rucentidad','idactividad'
    ];
    protected $guarded=[
    ];

}