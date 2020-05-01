<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Exam\Part5;
use Faker\Generator as Faker;

$factory->define(Part5::class, function (Faker $faker) {
    return [
        'reading_id' => function () {
            return factory(App\Exam\Reading::class)->create()->id;
        },
        'question_type_id' => $faker->numberBetween(13, 14),
        'choice_A' => $faker->sentence,
        'choice_B' => $faker->sentence,
        'choice_C' => $faker->sentence,
        'choice_D' => $faker->sentence,
        'answer' => $faker->randomElement(['A', 'B', 'C', 'D']),
    ];
});
