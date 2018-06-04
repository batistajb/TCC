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
        'serie',
	];

    public function students(){
    	return $this->hasMany(Student::class,'id','student_id');
    }

    public function subjects(){
	    return $this->hasMany(Subject::class,'id','subject_id');
    }

}
