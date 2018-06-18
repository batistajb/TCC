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
	    $year                           =   $request->year;
	    $student                        =   Student::findOrFail($student_id);

	    $dailies                        =   Daily::all()
	                                             ->where('student_id',  '=',$student_id)
	                                             ->where('year',        '=',$year);
	    foreach ($dailies as $daily){
		    if(($daily->note == 0)||($daily->frequency ==0)){
			    return redirect()->back()->with('status','Atenção! Realize todos os lançamentos das notas e frequencias.');
		    }
	    }
	    foreach ($dailies as $daily){
		    if(($daily->note < 60)||($daily->frequency < 60)){
			    $student->status        =   1;              //reprovado
			    $student->save();
			    return redirect()->route('dailies.index')->with('status','Salvo com sucesso!');
		    }else{
			    $student->status        =   2;              //aprovado
		    }
	    }
	    $student->save();
	    return redirect()->route('dailies.index')->with('status','Salvo com sucesso!');
	}

	public function confirm(Request $request){
    	/*return $request;*/
		$team                               =   Team::findOrFail($request->team);
		$year                               =   $request->year;
		$degree                             =   Degree::findOrFail($request->degree);

		$student_teams                      =   StudentTeam::all()
		                                               ->where('team_id',   '=',$team->id)
		                                               ->where('degree_id', '=',$degree->id);


		foreach ($student_teams as $student_team){
			foreach ($student_team->students as $student){
				if($student->status == 0){
					return redirect()->back()->with('status','Atenção! Encerre as notas e frequencias de todos alunos.');
				}
				else{
					foreach ($student_team->team as $team) {
						$team->controll     =   2;
						$team->save();
					}
				}
			}
		}
		if(empty($student_team)){
			return redirect()->back()->with('status','Atenção! Não existes alunos nesta turma.');
		}else
		return redirect()->back()->with( 'status', 'Concluído com sucesso.' );
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
    	$student                    =   Student::findOrFail($id);
	    $degree                     =   Degree::findOrFail($student->degree_id);
	    $year                       =   $degree->year;

	    $dailies                    =   Daily::all()
		                                        ->where('year','=',$year)
		                                        ->where('student_id','=',$id);

	    $dailies_count                    =   Daily::all()
		                                        ->where('year','=',$year)
		                                        ->where('student_id','=',$id)
		                                        ->count();

	    if(! $dailies_count > 0)
	    {
			foreach( $degree->subjects as $subject){
				$daily                          =   new Daily;
				$daily->student_id              =   $student->id;
				$daily->year                    =   $year;
				$daily->subject_id              =   $subject->id;
				$daily->degree_id               =   $student->degree_id;
				$daily->save();
		    }
		    $dailies                    =   Daily::all()
		                                         ->where('year','=',$year)
		                                         ->where('student_id','=',$id);
	    }
        return view('admin.daily.edit', compact('student','dailies','year','degree'));
    }


	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
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

		$student                        =   Student::findOrFail($student_id);

		$degree                         =   Degree::findOrFail($student->degree_id);

		$year                           =   $degree->year;

		$dailie                        =   Daily::all()
					                               ->where('subject_id','=',$subject_id)
					                               ->where('student_id','=',$student_id)
					                               ->where('year',      '=',$year)
					                               ->first();

		$dailie->frequency       =  $frequency;
		$dailie->note            =  $note;
		$dailie->year            =  $year;

		if(($frequency < 60)||($note < 60)){
			$dailie->status            =   1;              //reprovado
		}else{
			$dailie->status            =   2;              //aprovado
		}
		$dailie->save();

		return redirect()->back();
	}

}
