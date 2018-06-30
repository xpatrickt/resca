<?php

namespace resca;

use Illuminate\Database\Eloquent\Model;

class Documentoobservacion extends Model
{
    protected $table='documentoobservacion';
    protected $primaryKey='iddocumentoobservacion';

    public $timestamps=true;

    protected $fillable=[
    	'desdocumentoobservacion',
    	'urldocumentoobservacion','condicion',
    	'idobservacion'
    ];
    protected $guarded=[
    ];

}