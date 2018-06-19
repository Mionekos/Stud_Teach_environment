<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visits extends Model
{
    public $timestamps = false;
    protected $primaryKey='id_visits';
    protected $table='visits';
    protected $fillable=["id_visits","option"];
}
