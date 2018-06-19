<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    public $timestamps = false;
    protected $primaryKey='id_subjects';
    protected $table='subjects';
    protected $fillable=["name_subject"];
}
