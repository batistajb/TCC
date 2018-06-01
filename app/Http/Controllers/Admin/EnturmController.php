<?php

namespace App\Http\Controllers\Admin;

use App\Models\Degree;
use App\Models\Student;
use App\Models\StudentTeam;
use App\Models\Team;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EnturmController extends Controller{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$students = Student::paginate( 15 );
		$degrees = Degree::all();

		return view( 'admin.enturm.index', compact( 'students','degrees' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request ) {
		/*return $request;*/
		$serie   = $request->turma; //série/ano que será enturmada
		$year    = $request->year;//ano(data) da enturmação
		$team_id = $request->team;//id da turma que será enturmada

		$degrees = Degree::all( 'year', 'id' );

		$students = DB::table( 'students' )->where( [
			[ 'serie', '=', $serie ],
			[ 'year', '=', $year ],
			[ 'enroll', 2 ]
		] )->get();

		$teams    = DB::table( 'teams' )->where( [
			[ 'serie', '=', $serie ],
			[ 'year', '=', $year ]
		] )->get();
		$degreess = DB::table( 'degrees' )->where( [
			[ 'series', '=', $serie ],
			[ 'year', '=', $year ],
		] )->get();

		/*metódo para enturmar os alunos de acordo com o ano/serie grade*/
		foreach ( $degreess as $degree ) {                                 //percorre as grades cadastradas
			foreach ( $teams as $team ) {                                 //percorre as turmas cadastradas
				foreach ( $students as $student ) {                      //pecorre os estudantes cadastrados
					$studentTam["student_id"] = $student->id;            //atribuições para savar
					$studentTam["degree_id"]  = $degree->id;
					if ( ( $team->id == $team_id ) && ( $student->enroll == 2 ) ) {   //condição para vincular somente a série e aluno ,atriculado
						Student::up( $student->id );/*atualiza o controle de matriculas*/
						$studentTam["team_id"] = $team->id;
						$studentTeam_id        = StudentTeam::create( [ 'team_id' => $team->id ] ); //cria um registro com a id da turma
						StudentTeam::findOrFail( $studentTeam_id->id ); //recuperar o registro criado
						$studentTeam_id->update( [ 'student_id' => $student->id ] );//vincula o estudante com o registro
						$studentTeam_id->update( [ 'degree_id' => $degree->id ] );//vincula a grade com o registro
					}
				}
			}
		}return view( 'admin.enturm.enturm',
			compact( 'teams', 'students', 'serie', 'degrees', 'year', 'request' ) )
			->with( 'status', 'Enturmação Concluída!' );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function details( ) {

		return view('admin.enturm.show');
		/*$degree = Degree::findOrFail($id);
		$subjects = $degree->subjects()->getQuery()->get(['subject_id','name']);
		return \Response::json($subjects);*/
	}

	public function degreeTeam($serie) {
		$degree = DB::table( 'degrees' )->where( 'series', '=', $serie )->get();
		return \Response::json($degree);
	}

	public function show() {
		$student_teams = StudentTeam::paginate(10);
		return view('admin.enturm.show',compact('student_teams'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {
		$student         = Student::findOrFail( $id );
		$student->enroll = 2;
		$student->save();

		return back()->with( 'status', 'Aluno Matriculado com sucesso!' );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, $id ) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( Request $request ) {
		$student         = Student::findOrFail( $request->category_id );
		$student->enroll = 0;
		$student->save();

		return back()->with( 'status', 'Matrícula na lista de espera!' );
	}

	public function enturm() {

		$student_teams = StudentTeam::paginate(10);

		$degrees = Degree::all();

		return view( 'admin.enturm.enturm', compact( 'teams', 'degrees','student_teams','students' ) );
	}

	public function search( Request $request ) {
		/*return $request;*/
		$serie   = $request->turma;             //série/ano que será enturmada
		$year    = $request->year;              //ano(data) da enturmação
		$team_id = $request->team;              //id da turma que será enturmada
		$degree_id = $request->degree_turma;              //id da turma que será enturmada

		$degrees  = Degree::all( 'year', 'id' );


		$students = DB::table( 'students' )->where( [
			[ 'serie', '=', $serie ],
			[ 'year', '=', $year ],
			[ 'enroll', 2 ]
		] )->get();

		$students_cont = DB::table( 'students' )->where( [
			[ 'serie', '=', $serie ],
			[ 'year', '=', $year ],
			[ 'enroll', 2 ]
		] )->get()->count();

		$teams = DB::table( 'teams' )->where( [
			[ 'serie', '=', $serie ],
			[ 'year', '=', $year ]
		] )->get();

		$degreess = DB::table( 'degrees' )->where( [
			[ 'series', '=', $serie ],
			[ 'year', '=', $year ],
		] )->get();

		$student_teams = StudentTeam::all();

		if ( $request->team != null) {                                                  //Direciona para a enturmação
			if($students_cont > 0) {
				foreach ( $degreess as $degree ) {                                 //percorre as grades cadastradas
					foreach ( $teams as $team ) {                                 //percorre as turmas cadastradas
						foreach ( $students as $student ) {                      //pecorre os estudantes cadastrados
							$studentTam["student_id"] = $student->id;            //atribuições para savar
							$studentTam["degree_id"]  = $degree->id;
							if ( ( $team->id == $team_id ) && ( $student->enroll == 2 ) ) {   //condição para vincular somente a série e aluno ,atriculado
								Student::up( $student->id );/*atualiza o controle de matriculas*/
								$studentTam["team_id"] = $team->id;
								$studentTeam_id        = StudentTeam::create( [ 'team_id' => $team->id ] ); //cria um registro com a id da turma
								StudentTeam::findOrFail( $studentTeam_id->id ); //recuperar o registro criado
								$studentTeam_id->update( [ 'student_id' => $student->id ] );//vincula o estudante com o registro
								$studentTeam_id->update( [ 'degree_id' => $degree->id ] );//vincula a grade com o registro
							}
						}
					}
				}
				return redirect()
					->route( 'enturm',
						compact( 'teams',
							'students', 'serie',
								'degrees', 'year', 'request',
								'student_teams','degreess' ) )
									->with( 'status', 'Enturmação Concluída!' );
			}else
				return redirect()
					->route( 'enturm.search2',
						compact( 'teams',
							'students', 'serie', 'degrees',
								'year', 'request','student_teams',
									'degreess' ) )
										->with( 'status', 'Não existe alunos para enturmar!' );
		} else {
			return view( 'admin.enturm.enturm',
				compact( 'teams', 'students',
					'serie', 'degrees', 'year', 'request',
					'student_teams') );
		}
	}

}
