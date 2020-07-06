<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Offer;
use Faker\Generator as Faker;

$factory->define(Offer::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'price'=>$faker->numberBetween(1000, 5000),
        'description'=>$faker->sentence,
        'image'=>$faker->imageUrl(),
    ];
});
