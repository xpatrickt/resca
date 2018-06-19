<?php

namespace resca;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table='persona';
    protected $primaryKey='idpersona';

    public $timestamps=false;

    protected $fillable=[
    	'nombrepersona','apellidospersona','dnipersona','telefonopersona','direccionpersona','emailpersona','idcargo','identidad'
    ];
    protected $guarded=[
    ];

}