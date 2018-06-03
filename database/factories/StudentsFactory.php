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

$factory->define(App\Models\Student::class, function (Faker $faker) {
    return [
        'name'                              => $faker->name,
        'color'                             => $faker->colorName,
        'birth'                             => $faker->date('Y-m-d'),
        'nationality'                       => $faker->country,
	    'naturalness'                       => $faker->city,
	    'sex'                               => $faker->boolean,
	    'uf'                                => $faker->citySuffix,
	    'certificate_number'                => rand(100,500),
	    'certificate_leaf'                  => rand(100,500),
	    'certificate_register'              => $faker->name,
	    'certificate_expedition'            => $faker->date('Y-m-d'),
	    'name_mother'                       => $faker->firstNameFemale,
	    'name_father'                       => $faker->firstNameMale,
	    'nis'                               => rand(1000000000,9999999999),
	    'serie'                             => rand(1,5),
	    'degree_id'                         => rand(1,10),
	    'enroll'                            => rand(0,4),
	    'responsible_id'                    => rand(1,50),
    ];
});
