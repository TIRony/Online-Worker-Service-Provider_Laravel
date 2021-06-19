<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignWorker extends Model
{
    protected $table = "assignworker";
    public $timestamps = false;
    //const CREATED_AT = 'created_time';
    //const UPDATED_AT = 'updated_time';
    protected $primaryKey = 'AssignID';
}
