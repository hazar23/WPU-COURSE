<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Lesson
 *
 * @package App
 * @property integer $course_id
 * @property string $title
 * @property string $slug
 * @property string $link
 * @property string $file
 * @property text $content
 * @property integer $position
 * @property tinyInteger $published
*/
class Lesson extends Model
{
    use SoftDeletes;
    protected $table = "lesson";
    protected $primaryKey = "id";
    protected $dates = ['deleted_at'];
    protected $fillable = ['course_id','title','slug','video_link','position','content','materi','source_code','published'];
    
    public function course()
    {
        return $this->belongsTo('App\Models\Course','course_id', 'id');        
    }
    
}