<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Responsible extends Model
{
    protected $fillable = [
    	'tel','street','state','city','number','district','name_responsible','kinship','divulgation'
    ];

    public function students(){
    	return $this->hasMany(Student::class);
    }

}
