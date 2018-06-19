<?php

namespace resca;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table='provincia';
    protected $primaryKey='idprovincia';

    public $timestamps=true;

    protected $fillable=[
    	'iddepartamento','nombreprovincia'
    ];
    protected $guarded=[
    ];

}
