<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Treasurer;
use Illuminate\Support\Str;
use App\User;
use Faker\Generator as Faker;

$factory->define(Treasurer::class, function (Faker $faker) {
    return [
        //
        'first_name' => 'treasurer',
        'last_name' => 'treasurer',
        'gender' => 'male',
        'role_id' => 2,
        'outstation_id' => 1,
      
        'baptism_id' => 2,
        'DOB' => $faker->date(),
        'status' => 'active',
        'phone_number' =>$faker->phoneNumber,
     
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
