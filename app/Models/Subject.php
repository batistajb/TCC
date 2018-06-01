<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Subject extends Model
{
	protected $fillable = [
		'name','c_h','serie'
	];

	public function degrees(){
		return $this->belongsToMany(Degree::class);
	}
}