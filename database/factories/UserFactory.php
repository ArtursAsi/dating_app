<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {



    return [
        'gender'=>$faker->randomElement(['male','female']),
        'first_name' => $faker->name,
        'last_name' => $faker->lastName,
        'bio' => $faker->text,
        'age' => $faker->dateTimeBetween('-100 years','-18 years'),
        'location' =>$faker->country,
        'profile_picture' =>'https://source.unsplash.com/random',
        'min_age' =>$faker->numberBetween(18,40),
        'max_age' =>$faker->numberBetween(41,100),
        'looking_for' =>$faker->randomElement(['male','female']),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});


