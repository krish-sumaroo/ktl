$(function() {

$("#tgAdd").popover({
    placement: 'bottom',
    html: 'true',
    title : 'New Tag',
    content : "<input type='text' id='tgVal' size='10' /> <button type='button' id='tgSave' class='btn btn-primary btn-sm'>Save</button>"
  });


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


$('#mainTags').on('click','#tgSave', function (){
	$.post( root_url+'tags/add', {'title':$('#tgVal').val()}, function( data ) {

		if(data.status == 0)
		{
			//saved fine
			$('#tgAdd').popover('hide')
			$('#tgAdd').html('<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add').removeClass('tgDismiss');
			$('#tgVal').val('');
		} else {
			//show error
			alert(data.msg);
		}
    },'json');
});


$('#tgAdd').click(function (){
	if($(this).hasClass('tgDismiss')){
		$(this).html('<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add').removeClass('tgDismiss');
	}else{
		$(this).html('<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Cancel').addClass('tgDismiss');
	}	
	
});


//add your own tags
//goes for review and validate to add to tag pool

});