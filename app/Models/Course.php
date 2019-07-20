<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Course
 *
 * @package App
 * @property string $title
 * @property string $slug
 * @property text $description
 * @property string $image
 * @property tinyInteger $published
*/
class Course extends Model
{
    use SoftDeletes;
    protected $table = "course";
    protected $primaryKey = "id";
    protected $dates = ['deleted_at'];
    protected $fillable = ['subject_id','path_id','level_id','title','slug','description','image','published'];

    public function subject(){

        return $this->belongsTo('App\Models\Subject', 'subject_id', 'id');
    }
    public function path(){

        return $this->belongsTo('App\Models\Path', 'path_id', 'id');
    }
    public function level(){
        
        return $this->belongsTo('App\Models\Level', 'level_id', 'id');
    }
    public function lesson()
    {
        return $this->hasOne('App\Models\Course', 'course_id', 'id');
    }
}
