$(function() {

  $('#butEdit').click(function (){
    var url = $('#actionUrl').val();
    var elements = $('#frmEdit').serialize();

    $.post( root_url+url+'/edit', $('#frmEdit').serialize(), function( data ) { 

    },'json');
  });


  $( "#assets" ).on( "change", ".imagesUp", function() {

//document.querySelector('.imagesUp').addEventListener('change', function(e) {

  console.log(this.files);

  var file = this.files[0];

  var fd = new FormData();
  fd.append("file", file);

  var xhr = new XMLHttpRequest();
  xhr.open('POST', root_url+'upload', true);
  
  xhr.upload.onprogress = function(e) {
    if (e.lengthComputable) {
      var percentComplete = (e.loaded / e.total) * 100;
      console.log(percentComplete + '% uploaded');
    }
  };

  xhr.onload = function() {
    
    if (this.status == 200) {
      /*
      var resp = JSON.parse(this.response);

      console.log('Server got:', resp);

      var image = document.createElement('img');
      image.src = resp.dataUrl;
      document.body.appendChild(image);
      */
    };
  };

  xhr.send(fd);
//}, false);
});

$( "#assets" ).on( "click", ".delImage", function() {
  //ajax to remove from post ->with $(this).data('ref');
  $.post( root_url+'imageDelete', {'img':$(this).data('ref')}, function( data ) {
      console.log(data);
     
    },'json');

  console.log($(this).data('ref'));
});

});