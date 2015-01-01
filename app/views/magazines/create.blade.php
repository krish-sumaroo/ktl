@extends('master')

@section('header')
<h3><span class="label label-primary">New Magazine</span></h3>
@stop


@section('content')
{{ HTML::ul($errors->all())}}

{{Form::open(array('url' => 'magazine'))}}

<div class="form-group">
	{{Form::label('title', 'Title')}}
	{{Form::text('title', Input::old('title'), array('class'=>'form-model'))}}
</div>

<div class="form-group">
	{{Form::label('house','House')}}
	{{Form::text('house', Input::old('house'), array('class'=>'form-model'))}}
</div>

{{Form::submit('Save', array('class'=>'btn btn-primary'))}}

{{Form::close()}}
@stop