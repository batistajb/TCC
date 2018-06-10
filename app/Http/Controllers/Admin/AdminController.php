<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Team;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){
    	$students_count                 =   Student::all()->count();
    	$teachers_count                 =   Teacher::all()->count();
    	$teams_count                    =   Team::all()->count();
    	$teams                          =   Team::all();

    	return view('admin.admin.index', compact('students_count','teachers_count','teams_count','teams'));
    }

	public function chart(){

    	$students = Student::all();
		return \Response::json($students);
	}

	public function old(){
		$students   =   Student::where('enroll', '=', 4)->Paginate(10);

		return view('admin.admin.old',compact('students'));
	}


	public function createHistory(){
		return view('admin.admin.create');
	}



	public function showHistory($id){

    	$student    	= Student::findOrFail($id);

		return view('admin.admin.show',compact('student'));
	}



}
