@extends('master')

@section('header')
--Owner info 
--Ratings
@stop

@section('content')

{{$view}}
<div class="row" id="assets">
{{$gallery}}
</div>


@stop

@section('script')
{{ HTML::script('js/upload.js') }}
{{ HTML::script('js/tag.js') }}
@stop