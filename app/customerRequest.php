<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customerRequest extends Model
{
    protected $table = "request";
    public $timestamps = false;
    //const CREATED_AT = 'created_time';
    //const UPDATED_AT = 'updated_time';
    protected $primaryKey = 'RID';
}
