$(function() {

$('.addFav').click(function() {

	var element = $(this);
	
	//ajax to enable	
	$.post(root_url+'fav/addFavourite', {'itemId':$(this).data('item'), 'entity':$('#entity').val()}, function( data ) {
		element.parent().children('.addFav').hide();
		element.parent().children('.removeFav').show();
	});

});

$('.removeFav').click(function() {
	console.log("Remove from favourite");
	var element = $(this);
	//ajax to enable	
	$.post(root_url+'fav/delFavourite', {'itemId':$(this).data('item'), 'entity':$('#entity').val()}, function( data ) {
		element.parent().children('.removeFav').hide();
		element.parent().children('.addFav').show();
	});

});

});