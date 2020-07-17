<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(6, true),
        'description' => $faker->paragraph(2, true),
        'sortOrder' => $faker->randomDigit
    ];
});
