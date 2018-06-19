<?php

namespace resca;

use Illuminate\Database\Eloquent\Model;

class Estadoestudio extends Model
{
    protected $table='estadoestudio';
    protected $primaryKey='idestadoestudio';
    public $timestamps=true;

    protected $fillable =[
    	'idestudio',
    	'idestado'
    ];

    protected $guarded =[

    ];


}
