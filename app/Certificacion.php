<?php

namespace resca;

use Illuminate\Database\Eloquent\Model;

class Certificacion extends Model
{
    protected $table='resolucion';
    protected $primaryKey='idresolucion';
    public $timestamps=false;

    protected $fillable =[
    	'nombreresolucion',
    	'descripcionresolucion',
    	'idestudio'    	
    ];

    protected $guarded =[

    ];


}
