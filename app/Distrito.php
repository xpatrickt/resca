<?php

namespace resca;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    protected $table='distrito';
    protected $primaryKey='iddistrito';

    public $timestamps=true;

    protected $fillable=[
    	'idprovincia','nombredistrito'
    ];
    protected $guarded=[
    ];

}
