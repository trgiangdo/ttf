<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Exam\Listening;
use Faker\Generator as Faker;

$factory->define(Listening::class, function (Faker $faker) {
    return [
        'audio_url' => $faker->url,
        'exam_id' => function () {
            return factory(App\Exam::class)->create()->id;
        },
        'Part' => (string)$faker->numberBetween(1, 4)
    ];
});
