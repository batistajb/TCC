<?php


$this->get('/','Site\SiteController@index')->name('home');


	Route::prefix('admin')->group(function (){
	Auth::routes();
	Route::group([
		'namespace'=>'\Admin',
		'middleware' => ['auth'],
	],function (){
		Route::get('dashboard','AdminController@index')->name('dashboard');

		Route::get('ajax-line-chart','AdminController@lineChart')->name('lineChart');//ajax
		Route::get('ajax-team/{serie}','EnturmController@Team')->name('test');//ajax
		Route::get('ajax-degree/{serie}','EnturmController@degree')->name('test');//ajax
		Route::get('students/select','StudentsController@select')->name('students.select');//ajax
		Route::get('teachers/select','TeacherController@select')->name('teachers.select');//ajax
		Route::get('team/select','TeamController@select')->name('teams.select');//ajax
		Route::get('subjects/select','SubjectsController@select')->name('subjects.select');//ajax
		Route::get('users/select','UsersController@select')->name('users.select');//ajax
		Route::get('ajax-subjects/{series}','SubjectsController@search')->name('subjects.search');//ajax


		/*Gerenciamneto dos históricos boletins*/

		Route::get('history/{id}/show','HistoryController@showHistory')->name('history.show');
		Route::get('history/create','HistoryController@createHistory')->name('history.create');
		Route::post('history/store','HistoryController@storeHistory')->name('history.store');
		Route::get('history/old','HistoryController@old')->name('history.old');
		Route::post('history/search','HistoryController@search')->name('history.search');
		Route::get('old-history/{id}','HistoryController@oldHistory')->name('old-history');
		Route::get('old','HistoryController@old')->name('admin.old');


		Route::get('bulletin','HistoryController@showBulletin')->name('bulletin');
		Route::post('bulletin/create','HistoryController@createBulletin')->name('createBulletin');


		/*Gerenciamneto das notas e frequencia-diário*/
		Route::resource('dailies','DailiesController');
		Route::post('dailies/store','DailiesController@store')->name('dailies.store');
		Route::post('dailies/confirm','DailiesController@confirm')->name('dailies.confirm');
		Route::post('dailies/','DailiesController@search')->name('dailies.search');
		Route::post('dailies/subject/{request}','DailiesController@dailies')->name('dailies.subject');


		/*Gerenciamneto da enturmação*/
		Route::resource('enturm','EnturmController');
		Route::post('enturm.search','EnturmController@search')->name('enturm.search');
		Route::get('enturm/show','EnturmController@show')->name('enturm.show');
		Route::get('enturm.dailies/{id}','EnturmController@dailies')->name('enturm.dailies');
		Route::post('enturm.archive','EnturmController@archive')->name('enturm.archive');


		/*Gerenciamento das Matrícula*/
		Route::get('enrolment','EnrollController@enrolment')->name('enrolment');
		Route::post('enroll/list','EnrollController@enroll')->name('enroll.list');
		Route::get('enroll/renewEnrollment/{id}','EnrollController@renewEnrollment')->name('renewEnrollment');
		Route::post('enroll/low','EnrollController@low')->name('enroll.low');
		Route::get('renew','EnrollController@renew')->name('enroll.renew');
		Route::get('students/enroll/{id}/edit','EnrollController@renewEdit')->name('enroll.renew.edit');
		Route::resource('enroll','EnrollController');
		Route::get('old-enroll/{id}','HistoryController@edit')->name('old-enroll');



		Route::resource('teacher','TeacherController');
		Route::resource('degree','DegreeController');
		Route::resource('team','TeamController');
		Route::resource('students','StudentsController');
		Route::resource('subjects','SubjectsController');
		Route::resource('users','UsersController');


		Route::get('myProfile','UsersController@myProfile')->name('myProfile');
		Route::patch('myProfile','UsersController@editProfile')->name('myProfile');

		/*Gerando PDF*/
		Route::get('bulletin/pdf', 'HistoryController@boletimPdf')->name('boletimPdf');
		Route::get('history/pdf', 'HistoryController@historyPdf')->name('historyPdf');

		//Rotas das buscas pelo select
		Route::post('enroll/searchEnroll','EnrollController@searchEnroll')->name('searchEnroll');
		Route::post('enroll/searchEnrollRenew','EnrollController@searchEnrollRenew')->name('searchEnrollRenew');
		Route::post('enroll/searchEnrollment','EnrollController@searchEnrollment')->name('searchEnrollment');
		Route::post('history/searchOld','HistoryController@searchOld')->name('searchOld');
		Route::post('students/searchStudent','StudentsController@searchStudent')->name('searchStudent');
		Route::post('teacher/searchTeacher','TeacherController@searchTeacher')->name('searchTeacher');
		Route::post('team/searchTeam','TeamController@searchTeam')->name('searchTeam');
		Route::post('subjects/searchSubjects','SubjectsController@searchSubjects')->name('searchSubjects');
		Route::post('users/searchUsers','UsersController@searchUsers')->name('searchUsers');
	});

});
