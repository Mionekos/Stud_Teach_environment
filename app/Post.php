<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;
    protected $primaryKey='id_post';
    protected $table='post';
    protected $fillable=["post_name"];
}
