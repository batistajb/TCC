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
		$student            = Student::findOrFail( $request->category_id );
		$student->enroll    = 5;
		$student->save();

		return  redirect()  ->route('enrolment')
							->with( 'status', 'Matrícula na lista de espera!' );
	}

	public function enroll(Request $request) {
		$student            = Student::findOrFail( $request->category_id );
		$student->enroll    = 2;
		$student->save();

		return redirect()   ->route('enrolment')
							->with( 'status', 'Matrículado com sucesso!' );
	}

	public function edit($id){
		$student            = Student::findOrFail( $id );
		$student->enroll    = 2;
		$student->save();

		return redirect()   ->route('enroll.index')
							->with( 'status', 'Matrículado com sucesso!' );
	}

	public function renewEdit($id){
		$student            = Student::findOrFail( $id );
		$student->enroll    = 2;
		$student->save();

		return redirect()   ->route('enroll.renew')
							->with( 'status', 'Matrículado com sucesso!' );
	}

	public function low(Request $request){
		$student            = Student::findOrFail( $request->category_id );
		$student->enroll    = 4;
		$student->save();

		return redirect()   ->route('enroll.renew')
							->with( 'status', 'Registro arquivado!' );
	}

}
