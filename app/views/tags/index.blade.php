@extends('master')



@section('content')
<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Tags</h3>
	</div>
  <div class="panel-body">
    <h4 id="allTags">
		@foreach($tags as $key=>$value)
		<span class="label label-success tags" id="tag_{{$value->id}}">{{$value->title}}</span>
		@endforeach
	</h4>
  </div>  
</div>

<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">My Tags</h3>
	</div>
  <div class="panel-body">
    <h4 id="chTag">
		
	</h4>
  </div>  
</div>

@stop	

@section('script')
{{ HTML::script('js/tag.js') }}
@stop