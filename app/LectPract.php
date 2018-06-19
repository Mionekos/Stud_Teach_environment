<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LectPract extends Model
{
    public $timestamps = false;
    protected $primaryKey='id_lecture_practic';
    protected $table='lecture_practic';
    protected $fillable=["name_lectpract"];
}
