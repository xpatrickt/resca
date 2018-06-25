<?php

namespace resca;

use Illuminate\Database\Eloquent\Model;

class Documentoobservacion extends Model
{
    protected $table='documentoobservacion';
    protected $primaryKey='iddocumentoobservacion';

    public $timestamps=true;

    protected $fillable=[
    	'descdocumentoestudio',
    	'urldocumentoobservacion','condicion',
    	'idobservacion'
    ];
    protected $guarded=[
    ];

}