$(function() {



$('.validAc').click(function() {
	console.log($(this).data('ref'));
	var element = $(this);
	
	//ajax to enable

	//element.parent().parent().parent().remove();

	
	$.post(root_url+'tags/validate', {'id':$(this).data('ref')}, function( data ) { 
		
		console.log('am here');
		element.parent().parent().parent().remove();

	});

});



$('.declineAC').click(function() {

console.log('hello');

});


});