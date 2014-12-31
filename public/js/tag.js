$(function() {

$( ".tags" ).mouseover(function() {
  $(this).addClass('highlight');
});

$( ".tags" ).mouseout(function() {
  $(this).removeClass('highlight');
});


$( "#allTags" ).on( "click", ".tags", function() {
	$(this).hide();
	$('#chTag').append('<span class="label label-primary tagsIn" data-ref="'+$(this).prop('id')+'">'+$(this).html()+'</span>');

	//ajax to save to post

});

$( "#chTag" ).on( "click", ".tagsIn", function() {
	//ajax to remove from post ->with $(this).data('ref');
	var acEl = $(this).data('ref');

	$(this).remove();
	$('#'+acEl).show();
});

//add your own tags
//goes for review and validate to add to tag pool


});