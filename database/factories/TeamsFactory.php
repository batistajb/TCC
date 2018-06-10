<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factoriesm
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Team::class, function (Faker $faker) {
    return [
        'name'                      => $faker->colorName,
        'teacher_id'                => rand(1,50),
        'qtd_students'              => rand(20,32),
        'shift'                     => $faker->sentence,
        'serie'                     => rand(1,5),
        'year'                      => rand(2016,2020),
    ];
});
