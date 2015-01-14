@extends('master')

@section('header')
My posts
@stop

@section('content')

<div id="rstSet">
{{$views}}
</div>

@stop

@section('script')
{{ HTML::script('js/favourite.js') }}
@stop