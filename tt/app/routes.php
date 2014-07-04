<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

App::missing(function($exception)
{
    return View::make('404');
});

Route::get('/', function() {
	return View::make('hello');
}); 
Route::get('student/new', 'StudentController@newStudent'); 
Route::post('student/new', 'StudentController@addNewStudent');
Route::get('student/login', 'StudentController@showStudentLogin');
Route::post('student/login', 'StudentController@authStudentLogin');
Route::get('student/dash', 'StudentController@studentDash');
Route::post('student/dash', 'StudentController@edit');
Route::get('student/logout', 'StudentController@studentLogout');

Route::get('/school/deletestudent/{id}', 'SchoolController@deleteStudent');
Route::get('/school/editstudent/{id}', 'SchoolController@editStudent');
Route::get('/school/deletestudent/{id}', 'SchoolController@deleteStudent');
Route::post('/school/editstudent/{id}', 'SchoolController@edittedStudent');
Route::get('/school/new', 'SchoolController@newSchool'); 
Route::post('/school/new', 'SchoolController@addNewSchool'); 
Route::get('/school/dashboard', array('before' => 'auth', 'uses' => 'SchoolController@dashboard'));
Route::get('/school/editinfo', array('before' => 'auth', 'uses' => 'SchoolController@editInfo'));
Route::post('/school/editinfo', array('before' => 'auth', 'uses' => 'SchoolController@edittedInfo'));
Route::get('/login', function()
{
	return View::make('login');
});

Route::post('/login', function()
{
	// Validation later - for now let’s just get the creds
	Auth::attempt( 
		array(
			'username' => Input::get('username'), 
			'password' => Input::get('password')
		) 
	);

	$username = Input::get('username');
	$userid = User::where('username', '=', $username)->pluck('id');
	Session::put('userid', $userid);

	return Redirect::to('school/dashboard');
});

Route::get('/logout', function()
{
	Auth::logout();
	
	return Redirect::to('login');
});