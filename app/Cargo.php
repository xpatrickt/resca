<?php

namespace resca;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table='cargo';
    protected $primaryKey='idcargo';

    public $timestamps=false;

    protected $fillable=[
    	'idcargo','nombrecargo'
    ];
    protected $guarded=[
    ];

}
