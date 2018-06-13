<?php

$this->get('/','Site\SiteController@index')->name('home');


	Route::prefix('admin')->group(function (){
	Auth::routes();
	Route::group([
		'namespace'=>'\Admin',
		'middleware' => ['auth'],
	],function (){
		Route::get('dashboard','AdminController@index')->name('dashboard');

		Route::get('ajax-degree/{serie}','EnturmController@degree')->name('test');//ajax
		Route::get('ajax-team/{serie}','EnturmController@Team')->name('test');//ajax
		Route::get('ajax-chart','AdminController@chart')->name('chart');//ajax


		Route::get('history/{id}/show','AdminController@showHistory')->name('history.show');
		Route::get('history/create','AdminController@createHistory')->name('history.create');
		Route::post('history/search','AdminController@search')->name('history.search');


		/*Gerenciamneto das notas e frequencia-diário*/
		Route::resource('dailies','DailiesController');
		Route::post('dailies/store','DailiesController@store')->name('dailies.store');
		Route::post('dailies/','DailiesController@search')->name('dailies.search');
		Route::post('dailies/subject/{request}','DailiesController@dailies')->name('dailies.subject');


		/*Gerenciamneto da enturmação*/
		Route::resource('enturm','EnturmController');
		Route::post('enturm.search','EnturmController@search')->name('enturm.search');
		Route::get('enturm.list','EnturmController@list')->name('enturm.list');
		Route::get('enturm.dailies/{id}','EnturmController@dailies')->name('enturm.dailies');
		Route::post('enturm.archive','EnturmController@archive')->name('enturm.archive');


		/*Gerenciamento das Matrícula*/
		Route::get('enrolment','EnrollController@enrolment')->name('enrolment');
		Route::post('enroll/list','EnrollController@enroll')->name('enroll.list');
		Route::post('enroll/low','EnrollController@low')->name('enroll.low');
		Route::get('renew','EnrollController@renew')->name('enroll.renew');
		Route::get('old','AdminController@old')->name('admin.old');
		Route::get('students/enroll/{id}/edit','EnrollController@renewEdit')->name('enroll.renew.edit');
		Route::resource('enroll','EnrollController');



		Route::resource('teacher','TeacherController');
		Route::resource('degree','DegreeController');
		Route::resource('team','TeamController');
		Route::resource('students','StudentsController');
		Route::resource('subjects','SubjectsController');
		Route::resource('users','UsersController');




		Route::post('subjects/search','SubjectsController@search')->name('subjects.search');
		Route::post('teacher/search','TeacherController@search')->name('teacher.search');
		Route::get('myProfile','UsersController@myProfile')->name('myProfile');
		Route::patch('myProfile','UsersController@editProfile')->name('myProfile');
	});

});
