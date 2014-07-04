@extends('school.base')

@section('content')


	<div class="column_12">
		{{ $alert }}
		<h3>Edit Information</h3>
		{{ Form::open(array('url' => '/school/editinfo', 'method' => 'post')) }}
			<div class="row">
				<div class="column_6">
					<h5>School Information</h5>
					<input name="id" type="hidden" id="id" value="{{ $user->id }}">
					<label for="name">Name</label>
					<input name="name" type="text" id="name" value="{{ $user->name }}">
					<label for="schoolcode">Schoolcode</label>
					<input name="schoolcode" type="text" id="schoolcode" value="{{ $user->schoolcode }}">
					<label for="address">Address</label>
					<input name="address" type="text" id="address" value="{{ $user->address }}">
					<label for="city">City</label>
					<input name="city" type="text" id="city" value="{{ $user->city }}">
					<label for="state">State</label>
					<input name="state" type="text" id="state" value="{{ $user->state }}">
					<label for="zipcode">Zipcode</label>
					<input name="zipcode" type="text" id="zipcode" value="{{ $user->zipcode }}">
				</div>
				<div class="column_6">
					<h5>Login Information</h5>
					<label for="username">username</label>
					<input name="username" type="text" id="username" value="{{ $user->username }}">
					<label for="password">password</label>
					<input name="password" type="password" value="" id="password">

					<h5>Coach Information</h5>
					<label for="coach">name</label>
					<input name="coach" type="text" id="coach" value="{{ $user->coach }}">
					<label for="email">email</label>
					<input name="email" type="text" id="email" value="{{ $user->email }}">
					<label for="phone">phone</label>
					<input name="phone" type="text" id="phone" value="{{ $user->phone }}">

					<button class="floatright">Save Changes</button>
				</div>
			</div>
		{{ Form::close() }}

	</div>

@stop