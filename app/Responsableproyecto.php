<?php

namespace resca;

use Illuminate\Database\Eloquent\Model;

class Evaluacionestudio extends Model
{
    protected $table='evaluacionestudio';
    protected $primaryKey='idevaluacionestudio';
    public $timestamps=true;

    protected $fillable =[
    	'idestudio',
    	'idpersona'
    ];

    protected $guarded =[

    ];


}
