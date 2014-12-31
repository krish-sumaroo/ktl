@extends('master')

@section('header')
@stop

@section('content')

{{$view}}
<div class="row">
{{$gallery}}
{{$upload}}
</div>

<!-- tag here -->

@stop

@section('script')
{{ HTML::script('js/upload.js') }}
@stop