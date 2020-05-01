<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Exam\Part1;
use Faker\Generator as Faker;

$factory->define(Part1::class, function (Faker $faker) {
    return [
        'listening_id' => function () {
            return factory(App\Exam\Listening::class)->create()->id;
        },
        'question_type_id' => $faker->numberBetween(1, 2),
        'image_url' => 'https://picsum.photos/250/188',
        'answer' => $faker->randomElement(['A', 'B', 'C', 'D']),
    ];
});
