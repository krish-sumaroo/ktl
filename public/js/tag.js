$(function() {

$("#tgAdd").popover({
    placement: 'bottom',
    html: 'true',
    title : 'New Tag',
    content : "<input type='text' id='tgVal' size='10' /> <button type='button' id='tgSave' class='btn btn-primary btn-sm'>Save</button><br /><span class='label label-danger' id='tgMsg'></span>"
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
	saveTags($(this).data('element'));
	


});

$( "#chTag" ).on( "click", ".tagsIn", function() {
	//ajax to remove from post ->with $(this).data('ref');
	var acEl = $(this).data('ref');

	$(this).remove();
	$('#'+acEl).show();
});


$('#mainTags').on('click','#tgSave', function (){
	var title = $('#tgVal').val();
	$.post( root_url+'tags/add', {'title':title}, function( data ) {

		if(data.status == 0)
		{
			//saved fine
			$('#tgMsg').html('');
			$('#tgAdd').popover('hide');
			$('#tgAdd').html('<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add').removeClass('tgDismiss');
			$('#tgVal').val('');

			//add to basket
			$('#chTag').append('<span class="label label-warning tagsIn" data-ref="tag_'+data.id+'">'+title+'</span>');
			$('#allTags').append('<span class="label label-warning tags" id="tag_'+data.id+'" style="display:none;">'+title+'</span>');


		} else {
			//show error
			$('#tgMsg').html(data.msg);
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

function saveTags(id)
{
	$.post( root_url+'tags/addPost', {'element':id}, function( data ) { 

	});
}