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

$factory->define(App\Models\Post::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\Models\User::class)->create()->id;
        },
        'category_id' => function () {
            return factory(App\Models\Category::class)->create()->id;
        },
        'title'       => $faker->text($maxNbChars = 80),
        'description' => $faker->text($maxNbChars = 200),
        'content'     => $faker->realText($maxNbChars = 4000, $indexSize = 2),
        'thumbnail'   => 'http://via.placeholder.com/640x480',
    ];
});
