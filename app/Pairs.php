<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pairs extends Model
{
    public $timestamps = false;
    protected $primaryKey='id_pairs';
    protected $table='pairs';
    protected $fillable=["subjects_id","user_id","group_id"];
}
