<?php

namespace App\Http\Controllers\Admin;


use App\Models\Student;
use App\Models\Teacher;
use App\Models\Team;
use App\Http\Controllers\Controller;

/**
 * Class AdminController
 * @package App\Http\Controllers\Admin\AdminController
 */
class AdminController extends Controller
{
    public function index(){
    	$students_count                 =   Student::all()->count();
    	$teachers_count                 =   Teacher::all()->count();
    	$teams_count                    =   Team::all()->count();
    	$teams                          =   Team::all();

    	return view('admin.admin.index', compact('students_count','teachers_count','teams_count','teams'));
    }

	public function lineChart(){

    	$students = Student::all();
		return \Response::json($students);
	}

}
