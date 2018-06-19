<?php

namespace resca;

use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    protected $table='catalogo';
    protected $primaryKey='idcatalogo';

    public $timestamps=false;

    protected $fillable=[
    	'idactividad','nombrecatalogo','descripcioncatalogo'
    ];
    protected $guarded=[
    ];

}
