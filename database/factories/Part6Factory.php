<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Exam\Part6;
use Faker\Generator as Faker;

$factory->define(Part6::class, function (Faker $faker) {
    return [
        'reading_id' => function () {
            return factory(App\Exam\Reading::class)->create()->id;
        },
        'question_type_id' => $faker->numberBetween(15, 17),
        'choice_A' => $faker->sentence,
        'choice_B' => $faker->sentence,
        'choice_C' => $faker->sentence,
        'choice_D' => $faker->sentence,
        'answer' => $faker->randomElement(['A', 'B', 'C', 'D']),
    ];
});
