<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Degree extends Model
{
    protected $fillable =  [
    	'series','year','subject_id'
    ];

	public function subjects(){
			return $this->belongsToMany(Subject::class);
	}

	public function studentTeam(){
		return $this->belongsTo(StudentTeam::class);
	}

	public function daily(){
		return $this->belongsTo(Daily::class);
	}
}
