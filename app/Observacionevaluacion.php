<?php

namespace resca;

use Illuminate\Database\Eloquent\Model;

class Observacionevaluacion extends Model
{
    protected $table='observacion';
    protected $primaryKey='idobservacion';

    public $timestamps=true;

    protected $fillable=[
    	'idobservacion',
    	'asuntoobservacion',
    	'descripcionobservacion',
    	'condicion',
        'idevalucionestudio'
    ];
    protected $guarded=[
    ];

}