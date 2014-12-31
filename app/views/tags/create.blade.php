{{Form::open(array('url' => 'tags'))}}

<div class="form-group">
	{{Form::label('title', 'Title')}}
	{{Form::text('title', Input::old('title'), array('class'=>'form-model'))}}
</div>

{{Form::submit('Save', array('class'=>'btn btn-primary'))}}

{{Form::close()}}