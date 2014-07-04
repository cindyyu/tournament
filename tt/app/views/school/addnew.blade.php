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
	 			<div id="login" class="boxshadow radius padding column_6 offset_3">
	 				<img class="width100" src="{{ URL::asset('css/images/logo.png') }}" alt="Logo" />
	 				<h4>School Registration</h4>
	 				{{ $alert }}
	 			</div>
	 		</div>
	 	</section>
	</body>
</html>