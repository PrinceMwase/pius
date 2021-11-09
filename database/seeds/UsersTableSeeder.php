<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\User::class, 1)->create();
        factory(App\Member::class, 1)->create();
        factory(App\Treasurer::class, 1)->create();
        factory(App\Secretary::class, 1)->create();
    }
}
