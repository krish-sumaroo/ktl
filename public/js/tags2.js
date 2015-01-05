$(function() {

$( "#allTags" ).on( "click", ".tags", function() {
	$.post( root_url+'tags/addPost', {'element':id}, function( data ) { 

	});
	$(this).removeClass('btn-default').addClass('btn-primary tagsIn').append('<span class="glyphicon glyphicon-ok-sign tagsOk" aria-hidden="true"></span>');
});


$( "#allTags" ).on( "click", ".tagsIn", function() {
	$.post( root_url+'tags/rmPost', {'element':$(this).data('element')}, function( data ) { 
	});
	$(this).removeClass('btn-primary tagsIn').addClass('btn-default').children('.glyphicon').remove();
});

});
