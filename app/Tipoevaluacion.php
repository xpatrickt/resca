<?php

namespace resca;

use Illuminate\Database\Eloquent\Model;

class Tipoevaluacion extends Model
{
    protected $table='tipoevaluacion';
    protected $primaryKey='idtipoevaluacion';

    public $timestamps=false;

    protected $fillable=[
    	'idtipoevaluacion','nombretipoevaluacion'
    ];
    protected $guarded=[
    ];

}
