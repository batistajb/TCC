<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DegreeSubject extends Model {
	protected $fillable = [
		'subject_id',
		'degree_id'
	];
}
