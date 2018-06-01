<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentTeam extends Model
{
    protected $fillable = [
    	'student_id','team_id','degree_id','qtd','serie'
    ];

    public function students(){
    	return $this->hasMany(Student::class,'id','student_id');
    }

    public function teams(){
	    return $this->hasMany(Team::class,'id','team_id');
    }

    public function degrees(){
	    return $this->hasMany(Degree::class,'id','degree_id');
    }
}
