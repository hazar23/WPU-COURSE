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

class SubMenu extends Model
{
    use SoftDeletes;
    protected $table = "sub_menu";
    protected $primaryKey = "id";
    protected $dates = ['deleted_at'];
    protected $fillable = ['title','menu_id','icon','url','slug'];

}
