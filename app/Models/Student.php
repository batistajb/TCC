<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
    	'name',
    	'color',
    	'birth',
    	'nationality',
	    'naturalness',
	    'sex',
	    'uf',
	    'certificate_number',
	    'certificate_leaf',
	    'certificate_register',
	    'certificate_expedition',
	    'name_mother',
	    'name_father',
	    'nis',
	    'serie',
	    'degree_id',
	    'enroll',
	    'responsible_id'
    ];

    public function responsible(){
    	return $this->belongsTo(Responsible::class);
    }
    public function studentTeam(){
    	return $this->belongsTo(StudentTeam::class);
    }

    static function inserting($request){

	    $dataResp = $request->all(
		    'tel','cel','street','state','city','number','district','responsible','kinship','divulgation');
	    $dataStudent = $request->all(
		    'name','color','birth','nationality','naturalness','sex',
		    'uf','certificate_number','certificate_leaf','certificate_register',
		    'certificate_expedition','name_mother','name_father','nis','serie','degree_id');

	    $responsible = Responsible::create($dataResp);
	    $responsible_id = $responsible->id;

	    $students = Student::create($dataStudent);
	    $students_id = $students->id;

	    $student_resp = Student::findOrFail($students_id);
	    $resp_student = Responsible::findOrFail($responsible_id);

	    if($request->name_responsible!=null){
		    $responsible['name_responsible']=$request->name_responsible;
		    $responsible['kinship']=$request->kinship;
		    $responsible->save();
	    }
	    if($request->mother==1){
		    $resp_student['name_responsible']=$request->name_mother;
		    $resp_student['kinship']="Mãe";
		    $resp_student->save();
	    }
	    if($request->father==2){
		    $resp_student['name_responsible']=$request->name_father;
		    $resp_student['kinship']="Pai";
		    $resp_student->save();
	    }

	    $student_resp->responsible_id = $responsible_id;
	    $student_resp->enroll = 1;
	    $student_resp->save();
    }

    static function up($id) {
    	$data = Student::findOrFail($id);
    	$data->enroll =3;
    	$data->save();
    }

}
