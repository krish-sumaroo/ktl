@extends('master')

@section('header')
New Post
@stop

@section('content')
<div id="categories"> 
	<div class="btn-group" role="group" aria-label="...">
		@foreach($categories as $key=>$value)
		<button type="button" class="btn btn-default cat" data-ref="{{$key}}">{{$value}}</button>
		@endforeach
	</div>
</div>

<div>
	<div id="products" class="btn-group" role="group" aria-label="...">
	</div>
</div>
@stop

@section('script')
{{ HTML::script('js/post.js') }}
@stop