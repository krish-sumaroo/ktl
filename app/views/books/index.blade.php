@extends('master')

@section('header')
All books
@stop

@section('content')
<div id="searchBar">
{{$search}}
</div>	

<div id="rstSet">
{{$results}}
</div>
<input id = "entity" type="hidden" name="entity" value="{{$entity}}" />
@stop

@section('script')
{{ HTML::script('slider/js/slider.js') }}
{{ HTML::script('js/favourite.js') }}

<script>
var tagsSel = new Array();
$(function() {
	$('.slider').slider({
		'tooltip' :'hide'
		});

	$(".slider").on("slide", function(slideEvt) {
	var el = $(this).data('ref');
	$("#"+el+"From").text(slideEvt.value[0]);
	$("#"+el+"To").text(slideEvt.value[1]);

	$('#'+el+'_range').val(slideEvt.value[0]+'|'+slideEvt.value[1]);
	});

	$('#acSearch').click(function (){
		$('#schTags').val(tagsSel.join());
		$('#frmSearch').submit();
	});

	$( "#tagsBasket" ).on( "click", ".tagsSh", function() {
		$(this).removeClass('btn-default tagsSh').addClass('btn-primary tagsIn');
		$(this).children('.tgIcon').removeClass('glyphicon-plus-sign').addClass('glyphicon-ok-sign');
		tagsSel.push($(this).data('element'));
	});

	$( "#tagsBasket" ).on( "click", ".tagsIn", function() {
		$(this).removeClass('btn-primary tagsIn').addClass('btn-default tagsSh');
		$(this).children('.tgIcon').removeClass('glyphicon-ok-sign').addClass('glyphicon-plus-sign');
		tagsSel.splice( $.inArray($(this).data('element'), tagsSel), 1 );
	});
});
</script>
@stop