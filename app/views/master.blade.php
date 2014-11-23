2425971440553275201424242

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Books</title>
		<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.css')}}">
	</head>	

	<body>
		<div class="container">

			{{Form::open(array('url' => 'logout'))}}

			{{Form::submit('Logout', array('class'=>'btn btn-primary'))}}

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
		</div>
	</body>
</html>