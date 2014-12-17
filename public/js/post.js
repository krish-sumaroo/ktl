var entity;

$(function() {

$('.cat').click(function() {

//visual 	
	$( "#categories .btn-primary" ).each(function( index ) {  //make this smart to remeber the choice
		$(this).removeClass('btn-primary').addClass('btn-default');
	});
$(this).removeClass('btn-default').addClass('btn-primary');

//get products
$.post( "post/products", {'catId':$(this).data('ref')}, function( data ) {
	  	console.log(data);
	  	var html = '';
	  	$.each(data, function(key,value) {
		  html += '<button type="button" class="btn btn-default prod" data-ref="'+value+'">'+key+'</button>';
		}); 
		$('#products').html(html);
	  },'json');
});


$( "#products" ).on( "click", ".prod", function() {
  entity = $(this).data('ref');

  $.get(entity+"/create", function(data){
  	$('#postDet').html(data);
  });
});




});