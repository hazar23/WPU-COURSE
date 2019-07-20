<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([
    		[
                'id' => 1,
                'title' => 'Admin'
            ],
            [
                'id' => 2,
                'title' => 'Instruktur'
            ]
        ]);
    }
}
