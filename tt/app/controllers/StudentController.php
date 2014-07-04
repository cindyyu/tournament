<?php

class StudentController extends BaseController {

	public function newStudent()
	{
		$users = User::all();
		$data = array(
			'schools' => $users, 
			'alert' => ''
		);
		return View::make('student.new', $data);
	}

	public function addNewStudent() 
	{

		if (Input::get('schoolcode') == Input::get('school')) {
			$username = Input::get('username'); 
			$count = Student::where('username', '=', $username)->count(); 

			if ($count == 0) {
				$student = new Student;
				$student->firstname = Input::get('firstname');
				$student->lastname = Input::get('lastname');
				$student->username = Input::get('username');
				$student->password = md5('238ynsd?'.Input::get('password').'23nlkfjs23');
				$student->phone = Input::get('phone');
				$student->email = Input::get('email');
				$student->sex = Input::get('sex');
				$student->grade = Input::get('grade');
				$student->school_id = User::where('schoolcode', '=', Input::get('schoolcode'))->pluck('id');
				$student->save();
				$url = URL::asset('student/login');
				$alert = "<div class='success'>You have been registered. <a href='$url'>Click here to login and register for events.</a></div>";

				return View::make('student.addnew', array('alert' => $alert, 'schools' => User::all()));
			}
			else {
				$alert = "<div class='error'>The username you have chosen has already been taken. Please try again.</div>";
				return View::make('student.new', array('alert' => $alert, 'schools' => User::all()));
			}
		}
		else {
			$alert = "The schoolcode you provided is incorrect. Please contact the teacher or administrator that registered your school for TAMS Tournament and verify the schoolcode."; 

			return View::make('student.addnew', array('alert' => $alert, 'schools' => User::all()));
		}

	}

	public function showStudentLogin() 
	{
		return View::make('student.login', array('alert' => ''));
	}

	public function authStudentLogin()
	{
		$passgiven = md5('238ynsd?'.Input::get('password').'23nlkfjs23');
		$dbpass = DB::table('students')->where('username', '=', Input::get('username'))->pluck('password');
		$dbid = DB::table('students')->where('username', '=', Input::get('username'))->pluck('id');
		if ($passgiven == $dbpass) {
			Session::put('loggedin', '1');
			Session::put('id', $dbid);
			return Redirect::to('student/dash');
		}
		else {
			$alert = "<div class='error'>The username and password combination that you entered is incorrect.</div>";
			return View::make('student.login', array('alert' => $alert));
		}
	}

	public function studentDash() 
	{
		$dbid = Session::get('id');
		$alert = '';
		$student = Student::find($dbid);
		$school_id = $student->school_id;
		$school = User::where('id', '=', $school_id)->pluck('name');
		$data = array(
			'dbid' => $dbid,
			'student' => $student, 
			'school' => $school, 
			'alert' => $alert
		);	
		return View::make('student.dashboard', $data);
	}

	public function studentLogout() 
	{
		Session::flush();
		return Redirect::to('student/login');
	}

	public function edit() 
	{
		$id = Session::get('id');
		$student = Student::find($id);
		$school_id = $student->school_id;
		$school = User::where('id', '=', $school_id)->pluck('name');
		$alert = "<div class='success padding radius'><span class='icon edit'></span> Your changes have been saved!</div><br /><br />";
		$student->event1 = Input::get('event1'); 
		$student->event2 = Input::get('event2'); 
		$student->event3 = Input::get('event3'); 
		$student->event4 = Input::get('event4'); 
		$student->event5 = Input::get('event5'); 
		$student->event6 = Input::get('event6'); 
		$student->event7 = Input::get('event7'); 
		$student->event8 = Input::get('event8'); 
		$student->save();
		return View::make('student.dashboard', array('alert' => $alert, 'student' => $student, 'school' => $school));
	}

}