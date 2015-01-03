$(function() {

$('.validAc').click(function() {
	console.log($(this).data('ref'));
	var element = $(this);
	
	//ajax to enable	
	$.post(root_url+'tags/validate', {'id':$(this).data('ref')}, function( data ) { 

		element.parent().parent().parent().remove();

	});

});


$('.declineAC').click(function() {
	console.log($(this).data('ref'));
	var element = $(this);
	
	//ajax to enable
	$.post(root_url+'tags/decline', {'id':$(this).data('ref')}, function( data ) {

		element.parent().parent().parent().remove();

	});
});

});