<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
    		[
                'email' => 'admin@gmail.com',
                'name' => 'admin',
                'image' => 'titikkoma.png',                
                'password' => Crypt::encryptString('adminwpu'),
                'created_at' => date("Y-m-d H:i:s")
            ]
        ]);
    }
}
