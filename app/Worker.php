<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $table = "worker";
    public $timestamps = false;
    //const CREATED_AT = 'created_time';
    //const UPDATED_AT = 'updated_time';
    protected $primaryKey = 'WID';
}
