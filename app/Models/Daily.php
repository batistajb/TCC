<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Daily extends Model
{
    protected $fillable = [
        'subject_id',
        'student_id',
        'frequency',
        'note',
        'year',
	    'degree_id'
	];

    public function students(){
    	return $this->hasMany(Student::class,'id','student_id');
    }

    public function subjects(){
	    return $this->hasMany(Subject::class,'id','subject_id');
    }

    public function degrees(){
	    return $this->hasMany(Degree::class,'id','degree_id');
    }

}
