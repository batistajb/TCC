<?php

namespace App\Http\Controllers\Admin;

use App\Models\Daily;
use App\Models\Degree;
use App\Models\DegreeSubject;
use App\Models\StudentTeam;
use App\Models\Subject;
use App\Models\Team;
use DB;
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
        return $request;
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
        //
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
	    $team_id                = $request->team_id;
	    $degree_id              = $request->degree_id;
	    $serie                  = $request->serie;
	    $team                   = Team::findOrFail($team_id);
	    $degree                 = Degree::findOrFail($degree_id);
	    $student_teams          = StudentTeam::all()
	                                          ->where('team_id',  '=',$team_id)
	                                          ->where('degree_id','=',$degree_id)
	                                          ->where('serie',    '=',$serie);
	    $degrees                = Degree::all()->where( 'id',     '=', $degree_id );
	    $dailies                = Daily::all();

	    return view('admin.daily.show',compact('student_teams','degrees','team','degree','dailies'));
    }

    public function subject(Request $request){

    	$subjects =Subject::all();

    	return view('admin.daily.create',compact('subjects'));
    }


	public function dailies($id){
		$dailies                 = Daily::findOrFail($id );
		return $dailies;
	}
}
