<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email'=>$faker->email,
        'subject' => $faker->sentence(4),
        'message' => $faker->paragraphs(4, true),
    ];
});
