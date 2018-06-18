<?php

namespace App\Http\Controllers\Admin;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;

class TeacherController extends Controller {

	public function index() {

		$teachers = Teacher::paginate(10);
		return view( 'admin.users.teachers.index', compact( 'teachers' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view( 'admin.users.teachers.create' );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request ) {

		$validation = $this->validation($request->all());

		if($validation->fails()){
			return redirect()
				->back()
				->withErrors($validation->errors())
				->withInput($request->all());
		}

		Teacher::create( $request->all('name','cpf','tel'));

		return redirect()->route('teacher.index')->with('status', 'Registro Inserido!');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {
		$teachers = Teacher::findOrFail($id);
		return view('admin.users.teachers.edit', compact('teachers'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update($id, Request $request) {

		$validation = $this->validation($request->all());

		if($validation->fails()){
			return redirect()
				->back()
				->withErrors($validation->errors())
				->withInput($request->all());
		}

		$teachers = Teacher::findOrFail($id);

		$teachers->update($request->all());
		return redirect()->route('teacher.index')->with('status', 'Registro alterado!');
	}


	public function destroy( Request $request ) {

		$teacher = Teacher::findOrFail($request->category_id);
		$teacher->delete();
		return back()->with('status', 'Registro apagado!');
	}

	private function validation($data){

		$rules = [
			'name' =>'required|min:6',
			'cpf' =>'required',
			'tel' => 'required|size:11',
		];
		$mensagens = [
			'name.required'=>'Campo nome é obrigatório',
			'cpf.required'=>'Campo CPF é obrigatório',
			'tel.required'=>'Campo telefone é obrigatório',
		];
		return \Validator::make($data,$rules,$mensagens);
	}

	public function select(){
		$teachers    =  Teacher::all();
		return Response::json( $teachers );
	}


	public function searchTeacher(Request $request){

		$teacher    =  Teacher::all()
		                      ->where('id','=',$request->teachers)
		                      ->first();
		if(empty($teacher)){
			return back()->with('status', 'Professor não cadastrado!');
		}else{
			return view('admin.users.teachers.index',compact('teacher'));
		}
	}

}
