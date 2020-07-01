<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Code::class, function (Faker $faker) {
    return [
        'points'=>$faker->randomNumber(),
    ];
});
