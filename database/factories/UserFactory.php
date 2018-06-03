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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name'                  => $faker->name,
        'email'                 => $faker->safeEmail,
        'cpf'                   => str_random(11),
        'access'                => rand(1,3),
        'password'              => bcrypt(123123123),
        'remember_token'        => str_random(10),
    ];
});
