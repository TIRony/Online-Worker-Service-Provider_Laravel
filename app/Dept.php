<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dept extends Model
{
    protected $table = "dept";
    public $timestamps = false;
    //const CREATED_AT = 'created_time';
    //const UPDATED_AT = 'updated_time';
    protected $primaryKey = 'DID';
}
