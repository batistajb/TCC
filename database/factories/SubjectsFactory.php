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

$factory->define(App\Models\Subject::class, function (Faker $faker) {
    return [
        'name' => $faker->firstNameFemale,
        'c_h' => $faker->randomNumber(2),
        'serie' =>  rand(1,5)
    ];
});
