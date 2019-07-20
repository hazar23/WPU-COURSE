<?php

use Illuminate\Database\Seeder;

class SubMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_menu')->insert([
    		[
                'menu_id' => 1,
                'title' => 'Menu',
                'slug' => 'menu',                
                'url' => 'menu.index',                
                'icon' => 'fas fa-tasks',                
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'menu_id' => 1,
                'title' => 'Sub Menu',
                'slug' => 'sub-menu',                
                'url' => 'submenu.index',                
                'icon' => 'fas fa-sitemap', 
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'menu_id' => 1,
                'title' => 'Role',
                'slug' => 'role',                
                'url' => 'role.index',                
                'icon' => 'fas fa-random', 
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'menu_id' => 1,
                'title' => 'User',
                'slug' => 'user',                
                'url' => 'user.index',                
                'icon' => 'fas fa-users', 
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'menu_id' => 2,
                'title' => 'Course',
                'slug' => 'course',                
                'url' => 'course.index',                
                'icon' => 'fas fa-clipboard-list', 
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'menu_id' => 2,
                'title' => 'lesson',
                'slug' => 'lesson',                
                'url' => 'lesson.index',                
                'icon' => 'fas fa-stream', 
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'menu_id' => 3,
                'title' => 'Matakuliah',
                'slug' => 'matakuliah',                
                'url' => 'matakuliah.index',                
                'icon' => 'fas fa-graduation-cap', 
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'menu_id' => 3,
                'title' => 'Jalur',
                'slug' => 'jalur',                
                'url' => 'jalur.index',                
                'icon' => 'fas fa-road', 
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'menu_id' => 3,
                'title' => 'Level',
                'slug' => 'level',                
                'url' => 'level.index',                
                'icon' => 'fas fa-level-up-alt', 
                'created_at' => date("Y-m-d H:i:s")
            ]
        ]);
    }
}
