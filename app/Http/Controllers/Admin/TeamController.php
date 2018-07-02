<?php

namespace App\Http\Controllers\Admin;

use App\Models\Teacher;
use App\Models\Team;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$teams = Team::where('controll','=','0')->paginate(10);
        return view('admin.team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$teachers = Teacher::all('id','name');
	    return view('admin.team.create',compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $validation = $this->validation($request->all());
	    if($validation->fails()){
		    return redirect()
			    ->back()
			    ->withErrors($validation->errors())
			    ->withInput($request->all());
	    }
    	Team::create($request->all());
	    return redirect()->route('team.index')->with('status', 'Registro inserido!');
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
    	$team = Team::findOrFail($id);
	    $teacher_id = $team->teacher_id;
    	$teachers = DB::select('select * from teste.teachers where id = ?', [$teacher_id]);
        return view('admin.team.edit',compact('team','teachers'));
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
	    $validation = $this->validation($request->all());

	    if($validation->fails()){
		    return redirect()
			    ->back()
			    ->withErrors($validation->errors())
			    ->withInput($request->all());
	    }
	    $team = Team::findOrFail($id);
	    $team->update($request->all());
	    return redirect()->route('team.index')->with('status', 'Registro alterado!');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
    public function destroy(Request $request)
    {
	    $subject = Team::findOrFail($request->category_id);
	    $subject->delete();
	    return back()->with('status', 'Registro apagado!');
    }

	private function validation($data){

		$rules = [
			'name' =>'required',
			'qtd_students' =>'required',
			'serie' => 'required',
			'shift' => 'required',
			'teacher_id' => 'required',
		];
		$mensagens = [
			'name.required'=>'Campo nome é obrigatório',
			'qtd_students.required'=>'Campo quantidade é obrigatório',
			'serie.required'=>'Campo série é obrigatório',
			'shift.required'=>'Campo turno é obrigatório',
			'teacher_id.required'=>'Campo professor é obrigatório',
		];
		return \Validator::make($data,$rules,$mensagens);
	}

	public function select(){
		$teams    =  Team::all();
		return Response::json( $teams );
	}


	public function searchTeam(Request $request){

		$teams    =  Team::where('year',    '=',$request->teams)
		                        ->where('controll','=','0')
		                        ->paginate(10);

		if(!empty($teams->teacher)){
			return back()->with('status', 'Turma não cadastrada!');
		}else{
			return view('admin.team.index',compact('teams'));
		}
	}
}
