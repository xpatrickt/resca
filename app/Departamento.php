<?php

namespace resca;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table='departamento';
    protected $primaryKey='iddepartamento';

    public $timestamps=true;

    protected $fillable=[
    	'iddepartamento',
    	'nombredepartamento',
    	'fechacreate',
    	'fechaupdate'
    ];
    protected $guarded=[
    ];

}