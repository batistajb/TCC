<?php

namespace App\Http\Controllers\Admin;


use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;

class SubjectsController extends Controller
{

	public function index()
	{
		$subjects = Subject::paginate(7);
		return view('admin.subjects.index',compact('subjects'))->with('search', '');
	}


	public function create()
	{
		return view('admin.subjects.create');
	}

	public function store(Request $request)
	{
		$validation = $this->validation($request->all());

		if($validation->fails()){
			return redirect()
				->back()
				->withErrors($validation->errors())
				->withInput($request->all());
		}
		$disciplinas = Subject::create($request->all());

		return redirect()->route('subjects.index')->with('status', 'Registro inserido!');

	}

	public function show( Subject $subject)
	{
		return view('admin.subjects.index', compact('subject'));
	}

	public function edit( $id)
	{
		$subject = Subject::findOrFail($id);
		return view('admin.subjects.edit', compact('subject'));
	}


	public function update($id, Request $request)
	{
		$validation = $this->validation($request->all());

		if($validation->fails()){
			return redirect()
				->back()
				->withErrors($validation->errors())
				->withInput($request->all());
		}

		$subject = Subject::findOrFail($id);
		$subject->update($request->all());
		return redirect()->route('subjects.index')->with('status', 'Registro alterado!');
	}

	public function destroy(Request $request)
	{

		$subject = Subject::findOrFail($request->category_id);
		$subject->delete();
		return back()->with('status', 'Registro apagado!');

	}

	private function validation($data){

		$rules = [
			'name' =>'required|min:6',
			'c_h' =>'required',
			'serie' =>'required',
		];
		$mensagens = [
			'name.required'=>'Campo nome é obrigatório',
			'c_h.required'=>'Campo carga horária é obrigatório',
			'serie.required'=>'Campo série é obrigatório',

		];
		return \Validator::make($data,$rules,$mensagens);
	}


	public function select(){
		$subjects    =  Subject::all();
		return Response::json( $subjects );
	}

	public function search($series){
		$subjects    =  Subject::all()->where('serie','=',$series);
		return Response::json( $subjects );
	}


	public function searchSubjects(Request $request){


		$subject    =  Subject::paginate(15)
		                 ->where('id','=',$request->subjects)->first();

		if(empty($subject)){
			return back()->with('status', 'Disciplina não cadastrada!');
		}else{
			return view('admin.subjects.index', compact('subject'));
		}
	}
}