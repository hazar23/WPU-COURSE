<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Menu
 *
 * @package App
 * @property integer $menu_id
 * @property integer $role_id
*/

class AksesMenu extends Model
{
    use SoftDeletes;
    protected $table = "akses_menu";
    protected $primaryKey = "id";
    protected $dates = ['deleted_at'];
    protected $fillable = ['menu_id','role_id'];

    
}
