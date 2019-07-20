<?php

use Illuminate\Database\Seeder;

class AksesMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('akses_menu')->insert([
    		[
                'menu_id' => 1,
                'role_id' => 1,                
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'menu_id' => 2,
                'role_id' => 1,                
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'menu_id' => 3,
                'role_id' => 1,                
                'created_at' => date("Y-m-d H:i:s")
            ]
        ]);
    }
}
