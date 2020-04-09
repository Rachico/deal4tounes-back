<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\ClientDetails::class, function (Faker $faker) {
    return [
        'date_of_Birth' =>$faker->date(),
        'address' =>$faker->address,
        'motorized' =>$faker->boolean,
        'points'=>$faker->numberBetween(0,10000),
        'phone'=>$faker->phoneNumber,
    ];
});
