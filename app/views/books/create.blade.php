{{ HTML::ul($errors->all())}}

{{Form::open(array('url' => 'books'))}}

<div class="form-group">
	{{Form::label('title', 'Title')}}
	{{Form::text('title', Input::old('title'), array('class'=>'form-model'))}}
</div>

<div class="form-group">
	{{Form::label('author','Author')}}
	{{Form::text('author', Input::old('author'), array('class'=>'form-model'))}}
</div>

<div class="form-group">
	{{Form::label('published','Published')}}
	{{Form::selectYear('year', 1900,2014,2014,['class' =>'form-model'])}}
</div>

<div class="form-group">
	{{Form::label('price', 'Price')}}
	{{Form::text('price',Input::old('price'), array('class'=>'form-model'))}}
</div>

{{Form::submit('Save', array('class'=>'btn btn-primary'))}}

{{Form::close()}}