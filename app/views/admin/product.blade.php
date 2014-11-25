@extends('layouts/admin')
@section('main')

<select id="categories" name="categories">
	<option value="0">Choose 1 </option>

	@foreach($categories as $key=>$value)
		<option value="{{$key}}">{{$value}}</option>
	@endforeach
 </select>

 <input type="button" id="goBut" value="Go" />


 <div id="prodList">
	<ul id="prodListEl">

	</ul>

	<div id="addNew">
		<input type="text" size="25" id="newProd" /><input type="button" id="addProd" value="Add" />
	</div>
 </div>
 @stop


 @section('script')
<script>
var chosenCat;
$(function() {
    console.log( "ready!" );

    $( "#goBut" ).click(function() {
    	var cat = $('#categories').val();

    	if(cat ==0)
    	{
    		return false;
    	}

	  $.post( "admin/products", {'catId':cat}, function( data ) {
	  	chosenCat = cat;
	  });
	});

	$('#addProd').click(function(){
		var prodName = $('#newProd').val();

		$.post("admin/addProduct", {'cat':chosenCat, 'prod':prodName}, function (data){

		});
	});

});


</script>
 @stop