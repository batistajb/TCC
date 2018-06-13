<?php

namespace App\Http\Controllers\Admin;

use App\Models\Daily;
use App\Models\Degree;
use App\Models\Student;
use App\Models\StudentTeam;
use App\Models\Subject;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DailiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.daily.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*return $request;*/

	    $student_id                     =   $request->student_id;

	    $student                        =   Student::findOrFail($student_id);

	    $student->enroll                = 0;
	    $student->save();


	    return redirect()->route('dailies.index')->with('status','Salvo com sucesso!');

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$student                = Student::findOrFail($id);
	    $student_teams          = StudentTeam::all()->where('student_id',  '=',$id);
	    $dailies                = Daily::all();

        return view('admin.daily.edit', compact('student','student_teams','dailies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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


	    return view('admin.daily.show',compact('student_teams','degrees','team','degree','dailies'));
    }

    public function subject($id){

    	$subjects =Subject::all();

    	return view('admin.daily.create',compact('subjects'));
    }


	public function dailies(Request $request){

    	$student_id                     =   $request->student_id;
    	$subject_id                     =   $request->subject_id;
    	$frequency                      =   $request->frequency;
    	$note                           =   $request->note;
    	$coef                           =   ($note*$frequency);
		$coef_note                      =   0;
		$coef_total                     =   0;

		$student                        =   Student::findOrFail($student_id);


		$subjects                       =   Subject::all()
					                               ->where('id',        '=',$subject_id)
					                               ->where('serie',     '=',$student->serie);

		$dailies                        =   Daily::all()
					                               ->where('subject_id','=',$subject_id)
					                               ->where('student_id','=',$student_id);

		$daily_count                    =   Daily::all()
					                               ->where('subject_id','=',$subject_id)
					                               ->where('student_id','=',$student_id)
					                               ->count();


		if($daily_count > 0){
			foreach ($dailies as $daily){
				$daily->frequency       =  $frequency;
				$daily->note            =  $note;
				$daily->coef            =  $coef;
				$daily->save();
			}
		}else{
			Daily::create($request->all());
		}

		return redirect()->back()->with('status','Inserido com sucesso!');
	}

}
