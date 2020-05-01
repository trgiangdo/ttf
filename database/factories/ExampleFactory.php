<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Exam\Example;
use Faker\Generator as Faker;

$factory->define(Example::class, function (Faker $faker) {
    return [
        'example' => $faker->paragraph(5, True),
        'image_url' => 'https://picsum.photos/250/188',
    ];
});
