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

$factory->define(App\Models\Responsible::class, function (Faker $faker) {
    return [
	        'name_responsible'       => $faker->name,
	        'tel'                    => $faker->phoneNumber,
	        'street'                 => $faker->streetName,
	        'state'                  => $faker->streetName,
	        'city'                   => $faker->city,
	        'number'                 => $faker->randomNumber(4),
	        'district'               => $faker->streetAddress,
	        'kinship'                => $faker->sentence,
	        'divulgation'            => $faker->boolean,
    ];
});
