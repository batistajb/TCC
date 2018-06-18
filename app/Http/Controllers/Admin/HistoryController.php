<?php

namespace App\Http\Controllers\Admin;

use App\Models\Daily;
use App\Models\Degree;
use App\Models\School;
use App\Models\Student;
use App\Models\StudentTeam;
use App\Models\Teacher;
use App\Models\Team;
use PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class AdminController
 * @package App\Http\Controllers\Admin\AdminController
 */
class HistoryController extends Controller
{
    public function index(){
    	$students_count                 =   Student::all()->count();
    	$teachers_count                 =   Teacher::all()->count();
    	$teams_count                    =   Team::all()->count();
    	$teams                          =   Team::all();

    	return view('admin.history.index', compact('students_count','teachers_count','teams_count','teams'));
    }


	public function old(){
		$students                       =   Student::where('enroll', '=', 4)->Paginate(10);
		return view('admin.history.old',compact('students'));
	}


	public function createHistory(){
		$layout                         =   0;
		$students                       =   Student::all();
		return view('admin.history.create',compact('layout','students'));
	}

	public function storeHistory(Request $request){

    	$student                        =   Student::findOrFail($request->student_id);
    	$dailies                        =   Daily::all()
	                                                    ->where('student_id','=',$student->id);
    	$school                         =   School::findOrFail(1);

		return view('admin.history.show', compact('student','dailies','school'));
	}



	public function showHistory($id){

    	$student    	                =   Student::findOrFail($id);

		return view('admin.history.show',compact('student'));
	}

	public function showBulletin(){

		$layout                         =   0;
		$students                       =   Student::all();
		$degrees                        =   Degree::all();

		return view('admin.history.searchBulletin',compact('students','layout','degrees'));
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


		return view('admin.history.show',compact('student_teams','degrees','team','degree','dailies'));
	}

	public function edit($id){
		$this->authorize('view-enrollment');

		$student                        = Student::findOrFail( $id );

		If($student->serie >    4) {
			return redirect()   ->back()
			                    ->with( 'status', 'Atenção! Aluno atingiu a série máxima ofertada nesta escola.' );
		}else{
			$student->enroll             = 2;
			$student->save();
		}
		return redirect()   ->back()
		                    ->with( 'status', 'Matrículado com sucesso!' );
	}

	public function createBulletin(Request $request){
    	/*return $request;*/
		$student                        =   Student::findOrFail($request->student_id);
		$dailies                        =   Daily::all()
		                                         ->where('student_id','=',$student->id);

		$school                         =   School::findOrFail(1);

		return view('admin.history.bulletin',compact('student','dailies','school'));
	}


	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function boletimPdf(Request $request){
		$student                        =   Student::findOrFail($request->student_id);
		$dailies                        =   Daily::all()
		                                         ->where('student_id','=',$student->id);
		$today = date("j/ m/ Y");

		view('pdf.bulletin',compact('student','dailies','today'));


		 $pdf = PDF::loadView('pdf.bulletin',['student'=>$student,'dailies'=>$dailies,'today'=>$today]);

		 return $pdf->stream($student->name.'_Boletim_Escolar.pdf');

	}

	public function historyPdf(Request $request){
		$student                        =   Student::findOrFail($request->student_id);
		$dailies                        =   Daily::all()
		                                         ->where('student_id','=',$student->id);
		$today = date("j/ m/ Y");

		$school                         =   School::findOrFail(1);

		view('pdf.history',compact('student','dailies','school','today'));


		$pdf = PDF::loadView('pdf.history',['student'=>$student,'dailies'=>$dailies,'school'=>$school,'today'=>$today]);

		 return $pdf->stream($student->name.'_History_Escolar.pdf');
	}

}
