<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Teacher extends Model
{
	protected $fillable = [
		'name','cpf','tel'
	];

	public function team(){
		return $this->belongsTo(Team::class);
	}
}
