<?php

namespace resca;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table='proyecto';
    protected $primaryKey='idproyecto';
    public $timestamps=true;

    protected $fillable =[
    	'nombreproyecto',
    	'descripcionproyecto',
        'objetivoproyecto',
        'beneficiariosproyecto',
        'identidad'
    ];

    protected $guarded =[

    ];


}
