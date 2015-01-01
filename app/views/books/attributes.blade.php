@extends('master')

@section('header')
@stop

@section('content')

{{$view}}
<div class="row">
{{$gallery}}
{{$upload}}
</div>
{{$tag}}

<!-- tag here -->

@stop

@section('script')
{{ HTML::script('js/upload.js') }}
{{ HTML::script('js/tag.js') }}
@stop