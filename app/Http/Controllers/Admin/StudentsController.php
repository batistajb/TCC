<?php

namespace App\Http\Controllers\Admin;

use App\Models\Degree;
use App\Models\Responsible;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$students = Student::paginate(10);
       return view('admin.users.students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$degrees = Degree::all('id','year');
	    return view('admin.users.students.create',compact('degrees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	Student::inserting($request);
	    return redirect()->route('students.index')->with('status', 'Registro inserido!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    $students = Student::findOrFail($id);
	    $degrees = Degree::all('id','year');
	    return view('admin.users.students.edit', compact('students','degrees'));
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
	    $student = Student::findOrFail($id);
	    $responsible = Responsible::findOrFail($student->responsible_id);

	    $student->update($request->all());
	    $student->responsible->update($request->all());


	    if($request->name_responsible!=null){
		    $responsible['name_responsible']=$request->name_responsible;
		    $responsible['kinship']=$request->kinship;
		    $responsible->save();
	    }
	    if($request->mother==1){
		    $responsible['name_responsible']=$request->name_mother;
		    $responsible['kinship']="Mãe";
		    $responsible->save();
	    }
	    if($request->father==2){
		    $responsible['name_responsible']=$request->name_father;
		    $responsible['kinship']="Pai";
		    $responsible->save();
	    }

	    return view('admin.enroll.renew-edit',compact('student'));
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
	    $student = Student::findOrFail($request->category_id);
	    $student->responsible->delete();
	    $student->delete();
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

}
