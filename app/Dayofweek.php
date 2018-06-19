<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dayofweek extends Model
{
    public $timestamps = false;
    protected $primaryKey='id_dayofweek';
    protected $table='dayofweek';
    protected $fillable=["day"];
}
