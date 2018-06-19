<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public $timestamps = false;
    protected $primaryKey='id_attendance';
    protected $table='attendance';
    protected $fillable=["date","timetable_id","user_id","visits_id","mark"];
}
