<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Menu
 *
 * @package App
 * @property string $title
 * @property string $icon
 * @property string $url
 * @property string $slug 
*/

class Menu extends Model
{
    use SoftDeletes;
    protected $table = "menu";
    protected $primaryKey = "id";
    protected $dates = ['deleted_at'];
    protected $fillable = ['title','icon','url','slug'];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role','akses_menu')->withTimestamps();
    }
    public function subMenus()
    {
        return $this->hasMany('App\Models\SubMenu','menu_id','id');
    } 

}
