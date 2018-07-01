<?php

namespace resca;

use Illuminate\Database\Eloquent\Model;

class Respuestaevaluacion extends Model
{
    protected $table='respuestaobservacion';
    protected $primaryKey='idrespuestaobservacion';

    public $timestamps=true;

    protected $fillable=[
    	'idrespuestaobservacion',
    	'asuntorespuesta',
    	'descripcionrespuesta',
    	'condicion',
        'idobservacion',
        'iddocumentoestudio'
    ];
    protected $guarded=[
    ];

}