<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Exam\Part4;
use Faker\Generator as Faker;

$factory->define(Part4::class, function (Faker $faker) {
    return [
        'listening_id' => function () {
            return factory(App\Exam\Listening::class)->create()->id;
        },
        'question_type_id' => $faker->numberBetween(10, 12),
        'question' => $faker->sentence,
        'choice_A' => $faker->sentence,
        'choice_B' => $faker->sentence,
        'choice_C' => $faker->sentence,
        'choice_D' => $faker->sentence,
        'answer' => $faker->randomElement(['A', 'B', 'C', 'D']),
    ];
});
