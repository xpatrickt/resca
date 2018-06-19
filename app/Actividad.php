<?php

namespace resca;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table='actividad';
    protected $primaryKey='idactividad';

    public $timestamps=false;

    protected $fillable=[
    	'nombreactividad','descripcionactividad'
    ];
    protected $guarded=[
    ];

}