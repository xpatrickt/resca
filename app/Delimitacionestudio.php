<?php

namespace resca;

use Illuminate\Database\Eloquent\Model;

class Delimitacionestudio extends Model
{
    protected $table='delimitacionestudio';
    protected $primaryKey='iddelimitacionestudio';

    public $timestamps=false;

    protected $fillable=[
    	'iddelimitacionestudio','descripciondelimitacion',
    	'coordenadasx','coordenadasy',
    	'iddistrito','idestudio'
    ];
    protected $guarded=[
    ];

}
