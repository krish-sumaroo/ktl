$(function() {

$('.addFav').click(function() {

	var element = $(this);
	
	//ajax to enable	
	$.post(root_url+'fav/AddFavourite', {'itemId':$(this).data('item'), 'entity':$('#entity').val()}, function( data ) {
		element.parent().children('.addFav').remove();
	});

});

$('.removeFav').click(function() {
	console.log("Remove from favourite");
	var element = $(this);
	//need to get favId to be able to remove

	element.parent().children('.removeFav').remove()

	//to do
	//implement post to delete fav

});

});