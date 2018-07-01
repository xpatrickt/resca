<?php

namespace resca;

use Illuminate\Database\Eloquent\Model;

class Responsableproyecto extends Model
{
    protected $table='responsableproyecto';
    protected $primaryKey='idresponsableproyecto';
    public $timestamps=true;

    protected $fillable =[
    	'idproyecto',
    	'idpersona'
    ];

    protected $guarded =[

    ];


}
