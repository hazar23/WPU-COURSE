<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Tag extends Model
{
    use SoftDeletes;
    protected $table = "tag";
    protected $primaryKey = "id";
    protected $dates = ['deleted_at'];
    protected $fillable = ['title'];

    public function courses()
    {
        return $this->belongsToMany('App\Models\Course','course_tag')->withTimestamps();
    }
}
