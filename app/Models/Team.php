<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	protected $fillable = [
		'teacher_id','name','qtd_students','shift','serie','year'
	];
	public function studentTeam(){
		return $this->belongsTo(StudentTeam::class,'id');
	}

	public function teachers(){
		return $this->hasMany(Teacher::class);
	}
}
