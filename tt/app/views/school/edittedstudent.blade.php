@extends('school.base')

@section('content')
	
	<?php
		$url = "school/editstudent/$id";
	?>
	{{ Form::open(array('url' => $url, 'method' => 'post')) }}
	
	{{ Form::label('firstname', 'firstname') }}	
	{{ Form::text('firstname', $student->firstname) }}

	{{ Form::submit('Click Me!') }}

	{{ Form::close() }}

@stop