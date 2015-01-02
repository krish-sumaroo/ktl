<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Books</title>
		<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
		<script>
		var root_url = "<?php echo Request::root(); ?>/";
		</script>
	</head>	

	<body>
		<div class="container">

			{{Form::open(array('url' => 'logout'))}}

			<!-- {{Form::submit('Logout', array('class'=>'btn btn-primary'))}} -->

			{{Form::close()}}
			<div class="page-header">
				@yield('header')
			</div>
			@if(Session::has('message'))
				<div class="alert alert-success">
					{{Session::get('message')}}	
				</div>
			@endif
			@yield('content')

			{{ HTML::script('js/jquery.js') }}
			{{ HTML::script('bootstrap/js/bootstrap.js') }}

			@yield('script')
		</div>
	</body>
</html>