<?php

namespace resca;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table='estado';
    protected $primaryKey='idestado';

    public $timestamps=false;

    protected $fillable=[
    	'idestado','nombreestado'
    ];
    protected $guarded=[
    ];

}
