<?php

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu')->insert([
    		[
                'title' => 'User Management',
                'slug' => 'user-management',
                'url' => 'menu.index',                
                'icon' => 'fas fa-users-cog',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'title' => 'Bahan Ajar',
                'slug' => 'bahan-ajar',
                'url' => 'menu.index',                
                'icon' => 'fas fa-laptop-code',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'title' => 'kategori',
                'slug' => 'kategori',
                'url' => 'menu.index',                
                'icon' => 'fas fa-sliders-h',
                'created_at' => date("Y-m-d H:i:s")
            ]
        ]);
    }
}
