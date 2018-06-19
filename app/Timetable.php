<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    public $timestamps = false;
    protected $primaryKey='id_timetable';
    protected $table='timetable';
    protected $fillable=["pairs_id","lecture_practic_id","dayofweek_id","time_id","cabinets_id"];
}
