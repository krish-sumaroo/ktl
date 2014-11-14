@extends('master')

@section('header')
All books
@stop


@section('content')
	<table class="table table-striped table-bordered">
		<thead>
		<tr>
			<td>Title</td>
			<td>Author</td>
			<td>Published</td>
			<td>Price</td>
		</tr>
	</head>

	<tbody>
		@foreach($books as $key=>$value)
			<tr>
				<td>{{$value->title}}</td>
				<td>{{$value->author}}</td>
				<td>{{$value->year}}</td>
				<td>{{$value->price}}</td>
			</tr>
		@endforeach	
	</tbody>
  </table>
@stop