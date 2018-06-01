<?php

namespace App\Http\Controllers\Admin;

use App\Models\Degree;
use App\Models\DegreeSubject;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DegreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$degrees = Degree::paginate(10);
        return view('admin.degree.index',compact('degrees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

	    $subjects = Subject::all();
	    return view('admin.degree.create',compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	   /* $subjects = $degree->subjects;

	    foreach ($subjects as $subject){
		    echo " {$subject->name}:{$subject->c_h};";
	    }*/

	    $validation = $this->validation($request->all());

	    if($validation->fails()){
		    return redirect()
			    ->back()
			    ->withErrors($validation->errors())
			    ->withInput($request->all());
	    }

	    $subjects_id = $request->subject_id;
	    $degree_id = Degree::create($request->all('year','series'));
	    $degree = Degree::findOrFail($degree_id->id);
	    $degree->subjects()->sync($subjects_id);
	    return redirect()->route('degree.index')->with('status', 'Registro inserido!');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
    public function destroy(Request $request)
    {
	    $degree = Degree::findOrFail($request->category_id);
	    $degree->subjects()->detach();
	    $degree->delete();
	    return back()->with('status', 'Registro apagado!');

    }

	private function validation($data){

		$rules = [
			'year' =>'required|min:4',
			'series' =>'required',
			'subject_id' =>'required',
		];
		$mensagens = [
			'year.required'=>'Campo ano é obrigatório',
			'series.required'=>'Campo turma horária é obrigatório',
			'subject_id.required'=>'Campo disciplina é obrigatório',

		];
		return \Validator::make($data,$rules,$mensagens);
	}

	public function search(Request $request){
		$subjects = Subject::search($request->table_search);
		return view('admin.subjects.index',compact('subjects'));
	}

}
