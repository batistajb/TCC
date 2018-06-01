<?php

namespace App;

use Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{
	use Notifiable;
	const ROLE_ADMIN = 1;
	const ROLE_TEC_ADMIN = 2;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'access',
		'cpf',
		'email',
		'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	static function inserting($request) {
		$user = new User;
		$user->name = $request->name;
		$user->cpf = $request->cpf;
		$user->access = $request->access;
		$user->email = $request->email;
		$user->password = Hash::make($request->password);
		$user->save();
	}
	static function updata($request,$id) {
		$user = User::findOrFail($id);
		$user->name = $request->name;
		$user->cpf = $request->cpf;
		$user->access = $request->access;
		$user->email = $request->email;
		$user->password = Hash::make($request->password);
		$user->save();
	}

}