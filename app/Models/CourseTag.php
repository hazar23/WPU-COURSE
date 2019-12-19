<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseTag extends Model
{
    use SoftDeletes;
    protected $table = "course_tag";
    protected $primaryKey = "id";
    protected $dates = ['deleted_at'];
    protected $fillable = ['course_id','tag_id'];

}
