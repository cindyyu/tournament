<?php

class SchoolController extends BaseController {

	public function newSchool()
	{
		return View::make('school.new', array('alert' => ''));
	}

	public function addNewSchool() 
	{
		$username = Input::get('username'); 

		$count = Student::where('username', '=', $username)->count();
		
		if ($count == 0) {
			$school = new User;
			$school->name = Input::get('name');
			$school->username = Input::get('username');
			$school->password = Hash::make(Input::get('password'));
			$school->coach = Input::get('coach');
			$school->phone = Input::get('phone');
			$school->email = Input::get('email');
			$school->address = Input::get('address');
			$school->city = Input::get('city');
			$school->state = Input::get('state');
			$school->zipcode = Input::get('zipcode');
			$school->schoolcode = Input::get('schoolcode');
			$school->save();
			$alert = "<div class='success'>Your school has been registered! <a href='../login'>Click here to login.</a></div>";
			return View::make('school.addnew', array('alert' => $alert));
		}
		else {
			$alert = "<div class='error'>The username you have chosen has already been taken. Please try again.</div>";
			return View::make('school.new', array('alert' => $alert));
		}

		echo $count; 

	}

	public function editInfo() 
	{
		$userid = Session::get('userid');
		$user = User::find($userid);
		$data = array(
			'user' => $user,
			'alert' => ''
		); 
		return View::make('school.edit', $data);

	}
	public function edittedInfo() 
	{
		$id = Input::get('id'); 
		$user = User::find($id);
		$user->name = Input::get('name');
		$user->username = Input::get('username');
		$user->password = Hash::make(Input::get('password'));
		$user->coach = Input::get('coach');
		$user->phone = Input::get('phone');
		$user->email = Input::get('email');
		$user->address = Input::get('address');
		$user->city = Input::get('city');
		$user->state = Input::get('state');
		$user->zipcode = Input::get('zipcode');
		$user->schoolcode = Input::get('schoolcode');
		$user->save();
		$alert = "<div class='success padding radius width100'><span class='icon edit'></span> Your changes have been saved!</div><br /><br />";
		return View::make('school.edit', array('user' => $user, 'alert' => $alert));
	}

	public function dashboard() 
	{
		$schoolid = Session::get('userid');
		$schoolinfo = User::where('id', '=', $schoolid)->first();
		$schoolname = User::where('id', '=', $schoolid)->pluck('name');
		$students = Student::where('school_id', '=', $schoolid)->get();
		return View::make('school.dashboard', array('schoolinfo' => $schoolinfo, 'students' => $students, 'schoolname' => $schoolname)); 
		
	}

	public function editStudent($id) 
	{
		$student = Student::where('id', '=', $id)->first();
		$studentschool = Student::where('id', '=', $id)->pluck('school_id');
		$alert = '';
		if (count($student) === 0) {
			echo "404 student not found";
		}
		else {
			if ($studentschool == Session::get('userid')) {
				$data = array(
					'student' => $student, 
					'id' => $id, 
					'alert' => $alert
				);
				return View::make('school.editstudent', $data);
			}
			else {
				echo "you do not have permission to do dis";
			}
		}
	}

	public function edittedStudent($id)
	{
		$student = Student::where('id', '=', $id)->first();
		$studentschool = Student::where('id', '=', $id)->pluck('school_id');
		$alert = '';
		if (count($student) === 0) {
			echo "404 student not found";
		}
		else {
			if ($studentschool == Session::get('userid')) {
				$student = Student::where('id', '=', $id)->first();
				$newstudent = Student::find($id);
				$newstudent->firstname = Input::get('firstname');
				$newstudent->save();
				$data = array(
					'student' => $newstudent, 
					'id' => $id, 
					'alert' => $alert
				);
				return View::make('school.edittedstudent', $data);
			}
			else {
				echo "you do not have permission to do dis";
			}
		}

	}

	public function deleteStudent($id) 
	{
		$student = Student::where('id', '=', $id)->first();
		$studentschool = Student::where('id', '=', $id)->pluck('school_id');
		if (count($student) === 0) {
			$alert = "<h2>Whoops!</h2>An error has occurred. Please go back and try again.";
			return View::make('school.delete', array('alert' => $alert)); 
		}
		else {
			if ($studentschool == Session::get('userid')) {
				$student = Student::where('id', '=', $id)->first();
				$student->delete();
				$alert = "<div class='success radius padding'><span class='icon check'></span> $student->firstname $student->lastname has been deleted.</div>";
				$data = array(
					'student' => $student, 
					'id' => $id, 
					'alert' => $alert
				);
				return View::make('school.delete', $data); 

			}
			else {
				$alert = "<h2>Whoops!</h2>An error has occurred. Please go back and try again.";
				return View::make('school.delete', array('alert' => $alert)); 
			}
		}
	}

}