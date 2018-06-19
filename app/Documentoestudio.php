<?php

namespace resca;

use Illuminate\Database\Eloquent\Model;

class Documentoestudio extends Model
{
    protected $table='documentoestudio';
    protected $primaryKey='iddocumentoestudio';

    public $timestamps=true;

    protected $fillable=[
    	'iddocumentoestudio','descdocumentoestudio',
    	'urldocumentoestudio','idestudio',
    	'iddocumento'
    ];
    protected $guarded=[
    ];

}