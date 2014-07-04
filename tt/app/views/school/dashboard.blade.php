@extends('school.base')

@section('content')

	<div class="column_12 padding">
		<h3>Welcome, {{ $schoolname }}!

		<h5>School Information</h5>

		<div class="row">
			<div class="column_2">
				<strong>Coach</strong><br />
				{{ $schoolinfo->coach }}
			</div>
			<div class="column_2">
				<strong>Address</strong><br />
				{{ $schoolinfo->address }}
			</div>
			<div class="column_2">
				<strong>Phone</strong><br />
				{{ $schoolinfo->phone }}
			</div>
			<div class="column_3">
				<strong>Email</strong><br />
				{{ $schoolinfo->email }}
			</div>
			<div class="column_2">
				<strong>Schoolcode</strong><br />
				{{ $schoolinfo->schoolcode }}
			</div>
		</div>

		<br /><br />

		<h5>Registered Students</h5>

		<table>
			<tr>
				<th>Name</th>
				<th>Grade</th>
				<th>Event 1</th>
				<th>Event 2</th>
				<th>Event 3</th>
				<th>Event 4</th>
				<th>Event 5</th>
				<th>Event 6</th>
				<th>Event 7</th>
				<th>Delete</th>
			</tr>
			@foreach ($students as $student) 
			<tr>
				<td>{{ $student->firstname }} {{ $student->lastname }}</td>
				<td>{{ $student->grade }}</td>
				<td>{{ $student->event1 }}</td>
				<td>{{ $student->event2 }}</td>
				<td>{{ $student->event3 }}</td>
				<td>{{ $student->event4 }}</td>
				<td>{{ $student->event5 }}</td>
				<td>{{ $student->event6 }}</td>
				<td>{{ $student->event7 }}</td>
				<td class="align right"><a href="{{ URL::asset('school/deletestudent') }}/{{ $student->id }}"><span class="icon remove"></span></a></td>
			</tr>
			@endforeach
		</table>
	</div>
@stop