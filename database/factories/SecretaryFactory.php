<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Secretary;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Secretary::class, function (Faker $faker) {
    return [
        //
        'first_name' => 'secretary',
        'last_name' => 'secretary',
        'gender' => 'male',
        'role_id' => 3,
        'outstation_id' => 1,
 
        'baptism_id' => 3,
        'DOB' => $faker->date(),
        'status' => 'active',
        'phone_number' =>$faker->phoneNumber,
    
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
