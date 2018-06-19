<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $hidden = ['id_group'];
    protected $appends = ['value', 'label'];

    public $timestamps = false;
    protected $primaryKey = 'id_group';
    protected $table = 'groups';

    protected $fillable = ["group_name", "course_num"];

    public function getValueAttribute()
    {
        return $this["id_group"];
    }

    public function getLabelAttribute()
    {
        return $this["group_name"];
    }
}
