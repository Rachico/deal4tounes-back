<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use App\User;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title'=>$faker->streetName,
        'subheader'=>$faker->date(),
        'Typography'=>$faker->paragraph,
        'TypographyParagraph'=>$faker->paragraph,
        'content_image'=>$faker->imageUrl(),
        'moreIcon'=>$faker->url,
        'avatar'=> $faker->image(),
        'User_id'=>function () {
            return User::inRandomOrder()->first()->id;
        },
    ];

});

