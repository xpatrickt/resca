<?php

namespace resca;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    protected $table='ubicacion';
    protected $primaryKey='idubicacion';
    public $timestamps=true;

    protected $fillable =[
    	'departamento',
    	'provincia',
        'distrito',
    	'ubigeo'
    ];

    protected $guarded =[

    ];


}
