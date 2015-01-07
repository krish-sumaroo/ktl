<?php print_r($ranges); ?>

<div class="panel panel-success">
	<div class="panel-heading" id="mainTags">
		<h3 class="panel-title"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
		Search</h3>
	</div>
  <div class="panel-body">
		<form action="{{Request::url()}}" method="get" id="frmSearch">
		  <div class="form-group">
		    <input type="text" class="form-control" name="book_title" id="book_title" placeholder="Title" />
		  </div>

		  <div class="form-group">
		    <input type="text" class="form-control" name="book_author" id="book_author" placeholder="Author" />
		  </div>

		  <div class="form-group">Published : <span id="pubFrom">{{$ranges->minYr}}</span> to <span id="pubTo">{{$ranges->maxYr}}</span>
		  	<div class="well">
		  		<b>{{$ranges->minYr}}</b>
		  		<input type="text" class="slider" value="" data-slider-min="{{$ranges->minYr}}" data-slider-max="{{$ranges->maxYr}}" data-slider-step="1" data-slider-value="[{{$ranges->minYr}},{{$ranges->maxYr}}]" id="sl" data-ref="pub">
		  		<b>{{$ranges->maxYr}}</b>
		  	</div>
		  </div>

		  <div class="form-group">Price : <span id="prFrom">0</span> to <span id="prTo">{{$ranges->maxPrice}}</span>
		  	<div class="well">
		  		<b>0</b>
		  		<input type="text" class="slider" value="" data-slider-min="0" data-slider-max="{{$ranges->maxPrice}}" data-slider-step="50" data-slider-value="[0,{{$ranges->maxPrice}}]" id="s2" data-ref="pr">
		  		<b>{{$ranges->maxPrice}}</b>
		  	</div>
		  </div>
		  <input type="hidden" name="pr_range" id="pr_range" />
		<input type="hidden" name="pub_range" id="pub_range" />
		<input type="hidden" name="schTags" id="schTags" /> 
		  
		</form>
		<div id="tagsBasket">
		@foreach($tags as $id=>$value)
		<button type="button" class="btn btn-default btn-xs tagsSh" data-element="{{$id}}">{{$value}} <span class="glyphicon glyphicon-plus-sign tgIcon tagsOk" aria-hidden="true"></span></button>
		@endforeach
		</div>

		<button type="button" id="acSearch" class="btn btn-primary">Search</button>
	</div>	
</div>