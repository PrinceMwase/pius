<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            'name' => 'admin'
        ]);
        DB::table('roles')->insert([
            'name' => 'treasurer'
        ]);
        DB::table('roles')->insert([
            'name' => 'secretary'
        ]);
        DB::table('roles')->insert([
            'name' => 'member'
        ]);
        DB::table('roles')->insert([
            'name' => 'outstatioon_leader'
        ]);

    }
}
