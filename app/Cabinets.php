<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabinets extends Model
{
    public $timestamps = false;
    protected $primaryKey='id_cabinets';
    protected $table='cabinets';
    protected $fillable=["num_cabinet"];
}
