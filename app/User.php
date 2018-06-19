<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = false;
    public $remember_token=false;

    protected $appends = ['value', 'label'];

    protected $primaryKey = 'id_user';
    protected $table='user';
    protected $fillable=["lastname","name","patronymic","birthday","gender","email","login","password","post_id","role_id","group_id"];


    public function getValueAttribute()
    {
        return $this["id_user"];
    }

    public function getLabelAttribute()
    {
        return $this['lastname']." ".$this['name']." ".$this['patronymic'];
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','id_user'
    ];
}
