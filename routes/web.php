<?php

$this->get('/','Site\SiteController@index')->name('home');


Route::prefix('admin')->group(function (){
	Auth::routes();
	Route::group([
		'namespace'=>'\Admin',
		'middleware' => ['auth'],
	],function (){
		Route::get('dashboard','AdminController@index')->name('dashboard');

		Route::get('test/{serie}','EnturmController@degreeTeam')->name('test');//ajax



		/*Gerenciamneto da enturmação*/

		Route::resource('enturm','EnturmController');




		/*Gerenciamento das Matrícula*/
		Route::get('enrolment','EnrollController@enrolment')->name('enrolment');
		Route::post('enroll/list','EnrollController@enroll')->name('enroll.list');
		Route::post('enroll/low','EnrollController@low')->name('enroll.low');
		Route::get('renew','EnrollController@renew')->name('enroll.renew');
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
