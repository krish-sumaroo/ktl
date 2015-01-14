<div id="notifErrors">

</div>

{{Form::open(array('id' => 'frmEdit'))}}
<input type="hidden" id="actionUrl" value="{{$entity}}" />
<input type="hidden" name="object" value="{{$book->id}}" />

<div class="form-group">
	{{Form::label('title', 'Title')}}
	{{Form::text('title', $book->title,array('class'=>'form-model'))}}
</div>

<div class="form-group">
	{{Form::label('author','Author')}}
	{{Form::text('author', $book->author,array('class'=>'form-model'))}}
</div>

<div class="form-group">
	{{Form::label('published','Published')}}
	{{Form::selectYear('year', 1900,2014,$book->year,['class' =>'form-model'])}}
</div>

<div class="form-group">
	{{Form::label('price', 'Price')}}
	{{Form::text('price', $book->price,array('class'=>'form-model'))}}
</div>

{{Form::button('Save changes', array('class'=>'btn btn-primary', 'id' => 'butEdit'))}} 

{{Form::close()}}