@extends('master')

@section('header')
All books
@stop

@section('content')
@foreach($books as $key=>$value)
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">
			<a href="{{Request::url()}}/{{$value->id}}">{{$value->title}}</a>			
		</h3>
	</div>
  	<div class="panel-body">
	    <div>
	    	<ul class="list-group">
			  <li class="list-group-item list-group-item-info">Author : {{$value->author}}</li>
			  <li class="list-group-item list-group-item-info">Published : {{$value->year}}</li>
			  <li class="list-group-item list-group-item-info">Price : {{$value->price}}</li>
			</ul>
	    </div>

	    <div>
	    	<?php $tags = explode(',', $value->tags);
	    		  array_shift($tags);
	    	?>
	    	@foreach($tags as $tag)
	    	<span class="label label-success" >{{$tag}}</span>
	    	@endforeach	    	
	    </div>
  	</div>  
</div>
@endforeach
@stop