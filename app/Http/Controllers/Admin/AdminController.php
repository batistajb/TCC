<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use App\Models\StudentTeam;
use App\Models\Teacher;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){
    	$students_count                 =   Student::all()->count();
    	$teachers_count                 =   Teacher::all()->count();
    	$teams_count                    =   Team::all()->count();
    	$teams                          =   Team::all();
	    $teams_students_count           =   Team::all('qtd_students');

    	return view('admin.admin.index', compact('students_count','teachers_count','teams_count','teams','teams_students_count'));
    }

    public function pieChart(){
		$chart                   =  app()->chartjs
                                    ->name('Alunos por turmas')
                                    ->type('pie')
                                    ->size(['width'=>400,'height'=>200])
                                    ->labels(['Label x','Label y'])
                                    ->datasets([
                                        [
						                    'label'                 => 'Label x',
						                    'fillColor'             => 'rgba(210, 214, 222, 1)',
						                    'strokeColor'           => 'rgba(210, 214, 222, 1)',
						                    'pointColor'            => 'rgba(210, 214, 222, 1)',
						                    'pointStrokeColor'      => '#c1c7d1',
						                    'pointHighlightFill'    => '#fff',
						                    'pointHighlightStroke'  => 'rgba(220,220,220,1)',
						                    'data'                  => [65, 59, 80, 81, 56, 55, 40]
						                ],
	                                    [
		                                    'label'                 => 'Label y',
		                                    'fillColor'             => 'rgba(210, 214, 222, 1)',
		                                    'strokeColor'           => 'rgba(210, 214, 222, 1)',
		                                    'pointColor'            => '#3b8bba',
		                                    'pointStrokeColor'      => '#c1c7d1',
		                                    'pointHighlightFill'    => '#fff',
		                                    'pointHighlightStroke'  => 'rgba(220,220,220,1)',
		                                    'data'                  => [28, 48, 40, 19, 86, 27, 90]
	                                    ]
                                    ])
									->options([]);
		return view('admin.admin.index', compact('chart'));
    }

    public function history(){
    	return view('admin.admin.show');
    }

}
