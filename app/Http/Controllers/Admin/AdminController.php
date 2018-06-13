<?php

namespace App\Http\Controllers\Admin;

use App\Models\Daily;
use App\Models\Degree;
use App\Models\Student;
use App\Models\StudentTeam;
use App\Models\Teacher;
use App\Models\Team;
use Illuminate\Http\Request;
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

	public function chart(){

    	$students = Student::all();
		return \Response::json($students);
	}

	public function old(){
		$students   =   Student::where('enroll', '=', 4)->Paginate(10);

		return view('admin.admin.old',compact('students'));
	}


	public function createHistory(){
		$layout = 0;
		return view('admin.admin.create',compact('layout'));
	}



	public function showHistory($id){

    	$student    	= Student::findOrFail($id);

		return view('admin.admin.show',compact('student'));
	}



	public function search(Request $request){
		/*return $request;*/
		$team_id                        =   $request->team_id;
		$degree_id                      =   $request->degree_id;
		$serie                          =   $request->serie;

		$team                           =   Team::findOrFail($team_id);
		$degree                         =   Degree::findOrFail($degree_id);
		$student_teams                  =   StudentTeam::all()
		                                               ->where('team_id',  '=',$team_id)
		                                               ->where('degree_id','=',$degree_id)
		                                               ->where('serie',    '=',$serie);
		$degrees                        =   Degree::all()->where( 'id',       '=', $degree_id );
		$dailies                        =   Daily::all();


		return view('admin.admin.show',compact('student_teams','degrees','team','degree','dailies'));
	}



}
