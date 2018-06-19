<?php

namespace resca;

use Illuminate\Database\Eloquent\Model;

class Estudio extends Model
{
    protected $table='estudio';
    protected $primaryKey='idestudio';

    public $timestamps=true;

    protected $fillable=[
    	'nombreestudio','descripcionestudio',
		'condicion',
        'idproyecto',
		'idtipoevaluacion',
        'idtipoestudio'
    ];
    protected $guarded=[
    ];

}