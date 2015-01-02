@extends('master')

@section('header')
<div class="well">Tag Validation</div>
@stop

@section('content')


<div id="humhai">

<table class="table table-hover">
	<thead>
		<tr>
			<th>Entity</th>
			<th>Title</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
 @foreach($tagsAdmin as $key=>$value)
	<tr>
		<td>{{$value->entity}}</td>
		<td>{{$value->title}}</td>
		<td><div class="btn-group" role="group" aria-label="...">
		  	<button type="button" class="btn btn-success validAc" data-ref="{{$value->id}}">Validate</button>
		  	<button type="button" class="btn btn-danger declineAC" data-ref="{{$value->id}}">Decline</button>
		</div>
		</td>
	</tr>
 @endforeach
	</tbody>

</table>

<div id="test">


</div>

</div>

@stop

@section('script')
{{ HTML::script('js/tagAdmin.js') }}
@stop