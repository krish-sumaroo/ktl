$(function() {

$("#tgAdd").popover({
    placement: 'bottom',
    html: 'true',
    title : 'New Tag',
    content : "<input type='text' id='tgVal' size='10' /> <button type='button' id='tgSave' class='btn btn-primary btn-sm'>Save</button><br /><span class='label label-danger' id='tgMsg'></span>"
  });

$( "#allTags" ).on( "click", ".tags", function() {
	$.post( root_url+'tags/addPost', {'element':$(this).data('element')}, function( data ) {});
	$(this).removeClass('btn-default').addClass('btn-primary tagsIn').append('<span class="glyphicon glyphicon-ok-sign tagsOk" aria-hidden="true"></span>');
});


$( "#allTags" ).on( "click", ".tagsIn", function() {
	$.post( root_url+'tags/rmPost', {'element':$(this).data('element')}, function( data ) {});
	$(this).removeClass('btn-primary tagsIn').addClass('btn-default').children('.glyphicon').remove();
});

$('#mainTags').on('click','#tgSave', function (){
	var title = $('#tgVal').val();
	$.post( root_url+'tags/add', {'title':title}, function( data ) {

		if(data.status == 0){
			//saved fine
			$('#tgMsg').html('');
			$('#tgAdd').popover('hide');
			$('#tgAdd').html('<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add').removeClass('tgDismiss');
			$('#tgVal').val('');

			
			$('#allTags').append('<button type="button" class="btn btn-primary btn-xs tagsIn" data-element="'+data.id+'">'+title+' <span class="glyphicon glyphicon-ok-sign tagsOk" aria-hidden="true"></span></button>');
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

});
