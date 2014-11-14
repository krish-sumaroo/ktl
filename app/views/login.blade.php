<!doctype html>
<html>
<head>
	<title>Login Page</title>
</head>

<body>
	{{Form::open(['url' => 'login'])}}
	<h1>Login</h1>

	<p>
		{{ $errors->first('email')}}
		{{ $errors->first('password')}}
	</p>

	<p>
		{{ Form::label('email','Email Address')}}
		{{ Form::text('email', Input::old('email'),['placeholder'=>'user1@kitole.mu'])}}
	</p>

	<p>
		{{ Form::label('password','Password')}}
		{{ Form::password('password')}}
	</p>

	<p>{{ Form::submit('Submit!')}}</p>
{{Form::close()}}
</body>
</html>