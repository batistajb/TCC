<?php

namespace App\Http\Controllers\Admin;

use App\Models\Daily;
use App\Models\Degree;
use App\Models\Student;
use App\Models\StudentTeam;
use App\Models\Team;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;

class EnturmController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$layout = 0;

		return view( 'admin.enturm.index', compact( 'layout' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function archive( Request $request ) {
		/*return $request;*/
		$cont    = 0;
		$team_id = $request->team_id;
		$team    = Team::findOrFail( $team_id );
		$degrees = Degree::all();

		if ( $team->controll == 2 ) {
			foreach ( $team->studentTeams as $student_team ) {
				foreach ( $student_team->students as $student ) {
					foreach ( $student_team->degrees as $_degree ) {
						foreach ( $degrees as $degree ) {

							if ( ( $degree->year == $_degree->year + 1 ) && ( $degree->series == $_degree->series + 1 ) ) {
								$cont = 2;
							} elseif ( ( $degree->year == $_degree->year + 1 ) && ( $degree->series == $_degree->series ) ) {
								$cont = 1;
							} elseif ( ( $student->status == 2 ) && ( $student->serie == 5 ) ) {
								$cont = 3;
							}else {
								$cont = 0;
							}

							if ( $cont == 1 ) {
								if ( $student->status == 1 ) {
									$student->serie;
									$student->enroll    = 0;
									$student->status    = 1;
									$student->degree_id = $degree->id;
									$student->save();
								}
							}
							if ( $cont == 2 ) {
								if ( ( $student->status == 2 ) ) {
									$student->serie ++;
									$student->enroll    = 0;
									$student->status    = 2;
									$student->degree_id = $degree->id;
									$student->save();
								}
							}
							if ( $cont == 3 ) {
								$student->enroll = 0;
								$student->status = 2;
								$student->save();
								echo $student->id . "Aprovado" . "<br/>";
								echo $_degree->series . "serie" . "<br/>";
							}
						}
					}
				}
			}
			if ( ( $cont == 1 ) || ( $cont == 2 )||($cont == 3) ) {
				$team->delete();
				return back()->with( 'status', 'Registro arquivado com sucesso!' );
			}
			if ( $cont == 0 ) {
				return back()->with( 'status', 'Não existem turma ou grade escolar para a série do próximo ano!' );
			}
		} else {
			return back()->with( 'status', 'Atenção! Realize o fechamento dos diários da turma!' );
		}

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
		$layout    = 0;
		$serie     = $request->serie;                           //série/ano que será enturmada
		$degree_id = $request->degree_id;                      //ano(data) da enturmação
		$team_id   = $request->team_id;                        //id da turma que será enturmada

		$team = Team::findOrFail( $team_id );

		$students = Student::all()->where( 'serie', '=', $serie )->where( 'degree_id', '=', $degree_id )->where( 'enroll', '=', 2 );

		$students_count = Student::all()->where( 'serie', '=', $serie )->where( 'degree_id', '=', $degree_id )->where( 'enroll', '=', 2 )->count();

		if ( $students_count > 0 ) {
			foreach ( $students as $student ) {
				$students_cont = DB::table( 'student_teams' )->where( 'team_id', '=', $team_id )->count();
				if ( $team->qtd_students > $students_cont ) {
					if ( $student->enroll == 2 ) {
						$studentTeam_id = StudentTeam::create( [ 'team_id' => $team_id ] );     //cria um registro com a id da turma
						StudentTeam::findOrFail( $studentTeam_id->id );                                 //recuperar o registro criado
						$studentTeam_id->update( [ 'student_id' => $student->id ] );                     //vincula o estudante com o registro
						$studentTeam_id->update( [ 'degree_id' => $degree_id ] );                      //vincula a grade com o registro
						$studentTeam_id->update( [ 'serie' => $serie ] );
						Student::up( $student->id );                                                //Atlz controle da matrícula
						$studentTeam_id->update( [ 'qtd' => $students_cont + 1 ] );                 //controle da qntidade de alunos da turma
						$team->controll = 1;
						$team->save();
					}
				} else {
					return redirect()->route( 'enturm.index', compact( 'layout' ) )->with( 'status', 'Limite de alunos por turma excedido! Selecione uma nova turma' );
				}
			}

			return redirect()->route( 'enturm.index', compact( 'layout' ) )->with( 'status', 'Enturmação concluída!' );
		} else {
			return redirect()->route( 'enturm.index', compact( 'layout' ) )->with( 'status', 'Não existe alunos para enturmar!' );
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function details() {

		return view( 'admin.enturm.show' );
		/*$degree = Degree::findOrFail($id);
		$subjects = $degree->subjects()->getQuery()->get(['subject_id','name']);
		return \Response::json($subjects);*/
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
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( Request $request ) {/*usado para pesquisar as turmas e retornar os alunos que estão aptos para serem esnturmados*/
		/*return $request;*/
		$team_id   = $request->team_id;
		$degree_id = $request->degree_id;
		$serie     = $request->serie;
		$layout    = 1;

		$team   = Team::findOrFail( $team_id );
		$degree = Degree::findOrFail( $degree_id );
		$year   = $degree->year;

		$students = Student::all()->where( 'serie', '=', $serie )->where( 'degree_id', '=', $degree_id )->where( 'enroll', '=', 2 );

		$student_teams = StudentTeam::paginate( 10 );

		return view( 'admin.enturm.index', compact( 'team', 'students', 'degree', 'layout', 'student_teams' ) );

	}

	public function enturm() {
		$student_teams = StudentTeam::paginate( 20 );
		$degrees       = Degree::all();

		return view( 'admin.enturm.enturm', compact( 'teams', 'degrees', 'student_teams', 'students' ) );
	}

	public function search( Request $request ) {
		/*return $request;*/
		$serie     = $request->turma;             //série/ano que será enturmada
		$year      = $request->year;              //ano(data) da enturmação
		$team_id   = $request->team;              //id da turma que será enturmada
		$degree_id = $request->degree_turma;              //id da turma que será enturmada

		$degrees = Degree::all( 'year', 'id' );

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

		if ( $request->team != null ) {                                                  //Direciona para a enturmação
			if ( $students_cont > 0 ) {
				foreach ( $degreess as $degree ) {                                 //percorre as grades cadastradas
					foreach ( $teams as $team ) {                                 //percorre as turmas cadastradas
						foreach ( $students as $student ) {                      //pecorre os estudantes cadastrados
							$studentTam["student_id"] = $student->id;            //atribuições para savar
							$studentTam["degree_id"]  = $degree->id;
							if ( ( $team->id == $team_id ) && ( $student->enroll == 2 ) ) {                         //condição para vincular somente a série e aluno ,atriculado
								Student::up( $student->id );                                                        /*atualiza o controle de matriculas*/
								$studentTam["team_id"] = $team->id;
								$studentTeam_id        = StudentTeam::create( [ 'team_id' => $team->id ] );         //cria um registro com a id da turma
								StudentTeam::findOrFail( $studentTeam_id->id );                                     //recuperar o registro criado
								$studentTeam_id->update( [ 'student_id' => $student->id ] );                        //vincula o estudante com o registro
								$studentTeam_id->update( [ 'degree_id' => $degree->id ] );                          //vincula a grade com o registro
							}
						}
					}
				}

				return redirect()->route( 'enturm', compact( 'teams', 'students', 'serie', 'degrees', 'year', 'request', 'student_teams', 'degreess' ) )->with( 'status', 'Enturmação Concluída!' );
			} else {
				return redirect()->route( 'enturm.search2', compact( 'teams', 'students', 'serie', 'degrees', 'year', 'request', 'student_teams', 'degreess' ) )->with( 'status', 'Não existe alunos para enturmar!' );
			}
		} else {
			return view( 'admin.enturm.enturm', compact( 'teams', 'students', 'serie', 'degrees', 'year', 'request', 'student_teams' ) );
		}
	}

	public function show() {
		$teams = Team::where( 'controll', '>=', '1' )->paginate( 10 );

		return view( 'admin.enturm.show', compact( 'teams' ) );
	}

	public function dailies( $id ) {
		/*return $id;*/
		$student_team = StudentTeam::findOrfail( $id );
		$team_id      = $student_team->team_id;
		$serie        = $student_team->serie;

		foreach ( $student_team->degrees as $degree ) {
			$degree_id = $degree->id;
		};

		$team          = Team::findOrFail( $team_id );
		$degree        = Degree::findOrFail( $degree_id );
		$student_teams = StudentTeam::all()->where( 'team_id', '=', $team_id )->where( 'degree_id', '=', $degree_id )->where( 'serie', '=', $serie );
		$degrees       = Degree::all()->where( 'id', '=', $degree_id );
		$dailies       = Daily::all();


		return view( 'admin.daily.details', compact( 'student_teams', 'degrees', 'team', 'degree', 'dailies' ) );
	}


	/*metódos ajax*/
	public function team( $serie ) {
		$teams = DB::table( 'teams' )->where( 'serie', '=', $serie )->get();

		return \Response::json( $teams );
	}

	public function degree( $serie ) {
		$degree = DB::table( 'degrees' )->where( 'series', '=', $serie )->get();

		return Response::json( $degree );
	}

}
