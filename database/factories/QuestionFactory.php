<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Question;
use Faker\Generator as Faker;


/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Question::class, function (Faker $faker) {
    return [
        'question' => $faker->text(150),
        'point' => $faker->numberBetween(5,20),
        'updated_at' => $faker->dateTimeBetween(),
        'created_at' => $faker->dateTimeBetween(),
    ];
});
