<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = "area";
    public $timestamps = false;
    //const CREATED_AT = 'created_time';
    //const UPDATED_AT = 'updated_time';
    protected $primaryKey = 'AreaID';
}
