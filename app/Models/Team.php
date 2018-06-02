<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	protected $fillable = [
		'teacher_id','name','qtd_students','shift','serie','year'
	];
	public function studentTeams(){
		return $this->hasMany(StudentTeam::class,'team_id','id');
	}

	public function teacher(){
		return $this->belongsTo(Teacher::class);
	}
}
