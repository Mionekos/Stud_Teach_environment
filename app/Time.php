<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    public $timestamps = false;
    protected $primaryKey='id_time';
    protected $table='time';
    protected $fillable=["begin","finish"];
}
