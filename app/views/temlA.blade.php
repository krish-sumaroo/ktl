<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Authentication</title>

		{{ HTML::style('bootstrap/css/bootstrap.css')}}
		{{HTML::style('css/main.css')}}

	</head>	

	<body>
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<ul class="nav">
						<li>{{HTML::link('users/register', 'Register')}}</li>
						<li>{{HTML::link('users/login','Login')}}</li>
					</ul>
				</div>
			</div>	

		</div>

		<div class="container">
			@if(Session::has('message'))
				<p class="alert">{{Session::get('message')}}</p>
			@endif

			{{$content}}
		</div>
	</body>
</html>