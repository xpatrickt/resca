<?php

namespace resca;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    protected $table='observacion';
    protected $primaryKey='idobservacion';
    public $timestamps=true;

    protected $fillable =[
    	'idobservacion',
    	'descripcionobservacion',
     ];

    protected $guarded =[

    ];


}
