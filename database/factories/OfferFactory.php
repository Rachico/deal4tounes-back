<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Offer;
use Faker\Generator as Faker;

$factory->define(Offer::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'price'=>25,
        'description'=>$faker->sentence,
        'image'=>$faker->imageUrl(),
    ];
});
