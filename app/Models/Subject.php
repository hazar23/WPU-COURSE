<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Matakuliah
 *
 * @package App
 * @property string $name 
*/

class Subject extends Model
{
    use SoftDeletes;
    protected $table = "subject";
    protected $primaryKey = "id";
    protected $dates = ['deleted_at'];
    protected $fillable = ['title','image','description','slug'];

    public function courses()
    {
        return $this->hasMany('App\Models\Course', 'subject_id', 'id');
    }
}
