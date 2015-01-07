@extends('master')

@section('header')
All books
@stop

@section('content')
<div id="searchBar">
{{$search}}
</div>	

<div id="rstSet">
@foreach($books as $key=>$value)
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">
			<a href="{{Request::url()}}/{{$value->id}}">{{$value->title}}</a>
			<?php 
	    		if (in_array($value->id, $favs)) {
	    	?>
				<button type="button" data-item="{{$value->id}}" class="btn btn-default btn-xs btn-danger removeFav " style="float: right;margin-left: 10px;">
					<span class="glyphicon glyphicon-heart-empty " aria-hidden="true"></span>
				</button>
				<button type="button" data-item="{{$value->id}}" class="btn btn-default btn-xs btn-success addFav " style="float: right; display:none;">
					<span class="glyphicon glyphicon-heart-empty " aria-hidden="true"></span>
				</button>	
   			<?php 
				} else 
				{
			?>
				<button type="button" data-item="{{$value->id}}" class="btn btn-default btn-xs btn-danger removeFav " style="float: right;margin-left: 10px; display:none;">
					<span class="glyphicon glyphicon-heart-empty " aria-hidden="true"></span>
				</button>
				<button type="button" data-item="{{$value->id}}" class="btn btn-default btn-xs btn-success addFav " style="float: right;">
					<span class="glyphicon glyphicon-heart-empty " aria-hidden="true"></span>
				</button>					
			<?php 
				}
			?>			
			
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
	    	<span class="label label-success" >{{$tagsVals[$tag]}}</span>
	    	@endforeach  

	    </div>
  	</div>  
</div>
@endforeach
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