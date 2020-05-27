<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Blog;

use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    return [
        'title' => substr($faker->sentence(2), 0, -1),
        'content' => $faker->paragraph,
    ];
});
