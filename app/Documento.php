<?php

namespace resca;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table='documento';
    protected $primaryKey='iddocumento';

    public $timestamps=false;

    protected $fillable=[
    	'nombredocumento','descripciondocumento'
    ];
    protected $guarded=[
    ];

}