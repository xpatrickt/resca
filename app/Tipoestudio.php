<?php

namespace resca;

use Illuminate\Database\Eloquent\Model;

class Tipoestudio extends Model
{
    protected $table='tipoestudio';
    protected $primaryKey='idtipoestudio';

    public $timestamps=false;

    protected $fillable=[
    	'nombretipoestudio','siglastipoestudio'
    ];
    protected $guarded=[
    ];

}