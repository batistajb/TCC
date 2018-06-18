<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class EnrollController extends Controller {


	public function index(){
		$students   =   Student::where('enroll', '=', 1)->Paginate(10);

		return view('admin.enroll.index', compact('students'));
	}

	public function renew(){
		$students   =   Student::where('enroll', '=', 0)->paginate(10);
		return view('admin.enroll.renew', compact('students'));
	}

	public function enrolment(){
		$students   =   Student::where('enroll', '=', 5)->paginate(10);
		return view('admin.enroll.enrolment', compact('students'));
	}

	public function destroy(Request $request ) {
		$this->authorize('view-enrollment');
		$student            = Student::findOrFail( $request->category_id );
		$student->enroll    = 5;
		$student->save();

		return  redirect()  ->route('enrolment')
							->with( 'status', 'Matrícula na lista de espera!' );
	}

	public function enroll(Request $request) {
		$this->authorize('view-enrollment');
		$student            = Student::findOrFail( $request->category_id );
		$student->enroll    = 2;
		$student->save();

		return redirect()   ->route('enrolment')
							->with( 'status', 'Matrículado com sucesso!' );
	}

	public function edit($id){
		$this->authorize('view-enrollment');
		$student            = Student::findOrFail( $id );
		$student->enroll    = 2;
		$student->save();

		return redirect()   ->route('enroll.index')
							->with( 'status', 'Matrículado com sucesso!' );
	}

	public function renewEdit($id){
		$this->authorize('view-enrollment');
		$student            = Student::findOrFail( $id );
		$student->enroll    = 2;
		$student->save();

		return redirect()   ->route('enroll.renew')
							->with( 'status', 'Matrículado com sucesso!' );
	}

	public function low(Request $request){
		$this->authorize('view-enrollment');
		$student            = Student::findOrFail( $request->category_id );
		$student->enroll    = 4;
		$student->save();

		return redirect()   ->route('enroll.renew')
							->with( 'status', 'Registro arquivado!' );
	}

	public function renewEnrollment($id){
		$student_id         =   $id;
		$student            =   Student::findOrFail($student_id);

		If($student->status == 0){
			return redirect()   ->back()
			                    ->with( 'status', 'Atenção! Aluno em curso. Finalize as notas e presenças.' );
		}elseif ($student->status == 1){
			$student->enroll = 2;
			$student->save();
		}elseif ($student->status == 2){
			$student->enroll = 2;
			$student->serie ++;
			$student->save();
		}
		return redirect()   ->back()
		                    ->with( 'status', 'Rematriculado com sucesso!' );
	}


	public function searchEnroll(Request $request){

		$student    =  Student::all()
		                      ->where('id','=',$request->students)
		                      ->where('enroll','=',1)
		                      ->first();

		if(empty($student)){
			return back()->with('status', 'Solicitação de matrícula não efetuada!');
		}else{
			return view('admin.enroll.index',compact('student'));
		}
	}


	public function searchEnrollRenew(Request $request){

		$student    =  Student::all()
		                      ->where('id','=',$request->students)
		                      ->where('enroll','=',0)
		                      ->first();
		if(empty($student)){
			return back()->with('status', 'Solicitação de rematrícula não efetuada!');
		}else{
			return view('admin.enroll.renew',compact('student'));
		}
	}
	public function searchEnrollment(Request $request){

		$student    =  Student::all()
		                      ->where('id','=',$request->students)
		                      ->where('enroll','=',5)
		                      ->first();
		if(empty($student)){
			return back()->with('status', 'Solicitação da lista de espera não efetuada!');
		}else{
			return view('admin.enroll.enrolment',compact('student'));
		}
	}

}
