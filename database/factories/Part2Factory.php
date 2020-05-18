<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Exam\Part2;
use Faker\Generator as Faker;

$factory->define(Part2::class, function (Faker $faker) {
    return [
        'listening_id' => function () {
            return factory(App\Exam\Listening::class)->create()->id;
        },
        'question_type_id' => $faker->numberBetween(3, 6),
        'answer' => $faker->randomElement(['A', 'B', 'C']),
    ];
});
