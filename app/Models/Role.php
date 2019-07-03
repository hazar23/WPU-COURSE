<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Menu
 *
 * @package App
 * @property string $title
*/

class Role extends Model
{
    use SoftDeletes;
    protected $table = "role";
    protected $primaryKey = "id";
    protected $dates = ['deleted_at'];
    protected $fillable = ['title'];

    public function menus()
    {
        return $this->belongsToMany('App\Models\Menu','akses_menu')->withTimestamps();
    } 
    public function users()
    {
        return $this->belongsToMany('App\Models\User','user_role')->withTimestamps();
    } 
}
