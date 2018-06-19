<?php

namespace resca;

use Illuminate\Database\Eloquent\Model;

class Instrumento extends Model
{
    protected $table='instrumento_gestion';
    protected $primaryKey='idinstrumentog';

    public $timestamps=false;

    protected $fillable=[
    	'nombresinstrumentog','siglasinstrumentog'
    ];
    protected $guarded=[
    ];
}