<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>TAMS Tournament</title>
		<meta name="description" content="TAMS Tournament">
		<meta name="author" content="Cindy Yu">
		<link rel="stylesheet" href="{{ URL::asset('css/tuktuk.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/tuktuk.icons.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/tuktuk.theme.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
	  	<!--[if lt IE 9]>
	  	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	  	<![endif]-->
	  	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	  	<script src="{{ URL::asset('js/tuktuk.js') }}"></script>
	 	<script src="{{ URL::asset('js/script.css') }}"></script>
	</head>
	<body id="student">
	 	<section class="bck padding">
	 		<div class="row">
	 			<div class="column_4">
	 				<a href="{{ URL::asset('school/dashboard') }}">
	 					<img class="width100" src="{{ URL::asset('css/images/logo.png') }}" alt="" />
	 				</a>
	 			</div>
	 			<nav class="align right column_8 text bold" data-tuktuk="menu">
	 				<a href="{{ URL::asset('school/dashboard') }}"> <span class="icon group"></span> Home</a>
	 				<a href="{{ URL::asset('school/editinfo') }}"> <span class="icon edit"></span> Edit Information </a>
	 				<a href="{{ URL::asset('logout') }}"> <span class="icon off"></span> Logout </a>
	 			</nav>
	 		</div>
	 	</section>

	 	<section class="bck padding bgwhite">
	 		<div class="row">
	 			@yield('content')
		 	</div>
	 	</section>
	</body>
</html>