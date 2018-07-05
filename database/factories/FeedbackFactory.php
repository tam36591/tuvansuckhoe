<?php

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

$factory->define(App\Models\Feedback::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone'=> $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'content' => $faker->realText($maxNbChars = 4000, $indexSize = 2),
    ];
});
