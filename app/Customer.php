<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customer";
    public $timestamps = false;
    //const CREATED_AT = 'created_time';
    //const UPDATED_AT = 'updated_time';
    protected $primaryKey = 'CID';
}
