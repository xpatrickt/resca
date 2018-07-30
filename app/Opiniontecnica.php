<?php

namespace resca;

use Illuminate\Database\Eloquent\Model;

class Opiniontecnica extends Model
{
    protected $table='opiniontecnica';
    protected $primaryKey='idopiniontecnica';

    public $timestamps=true;

    protected $fillable=[
        'descopiniontecnica',
        'idestudio'  
    ];
    protected $guarded=[
    ];

}