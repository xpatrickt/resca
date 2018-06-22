<?php

namespace resca;

use Illuminate\Database\Eloquent\Model;

class Representante extends Model
{
    protected $table='representante';
    protected $primaryKey='idrepresentante';
    public $timestamps=true;

    protected $fillable =[
    	'descripcionrepresentante',
    	'identidad',
    	'idpersona'
    ];

    protected $guarded =[

    ];


}
