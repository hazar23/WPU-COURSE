<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Path extends Model
{
    use SoftDeletes;
    protected $table = "path";
    protected $primaryKey = "id";
    protected $dates = ['deleted_at'];
    protected $fillable = ['title','image','description','slug'];

    public function courses()
    {
        return $this->hasMany('App\Models\Course', 'path_id', 'id');
    }
}
