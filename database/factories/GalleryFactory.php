<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Gallery;
use Faker\Generator as Faker;

$factory->define(Gallery::class, function (Faker $faker) {
    return [
      'user_id'=>$faker->numberBetween(1,100),
        'name'=>'https://picsum.photos/200/300'
    ];
});
