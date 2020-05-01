<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Exam\Reading;
use Faker\Generator as Faker;

$factory->define(Reading::class, function (Faker $faker) {
    return [
        'paragraph' => $faker->paragraph,
        'exam_id' => function () {
            return factory(App\Exam::class)->create()->id;
        },
        'Part' => (string)$faker->numberBetween(5, 7),
    ];
});
