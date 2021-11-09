<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Member;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Member::class, function (Faker $faker) {
    return [
        //
        'first_name' => 'member',
        'last_name' => 'member',
        'gender' => 'male',
        'role_id' => 4,
        'outstation_id' => 1,
      
        'baptism_id' => 4,
        'DOB' => $faker->date(),
        'status' => 'active',
        'phone_number' =>$faker->phoneNumber,
        
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
