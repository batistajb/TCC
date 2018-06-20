<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(App\User::class,1)->create();

         App\User::create([
         	'name'                  => 'João Batista',
	        'email'                 => 'batista@gmail.com',
	        'cpf'                   => '12345678911',
	        'access'                => '1',
	        'password'              => bcrypt('12'),
	        'remember_token'        => str_random(10),
		]);
    }
}
