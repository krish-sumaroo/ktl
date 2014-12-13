@extends('master')

@section('content')
<input type="file" name="file1" id="file1" accept="image/*"/>

<script>

var root_url = "<?php echo Request::root(); ?>/";
document.querySelector('#file1').addEventListener('change', function(e) {

  console.log(this.files);

  var file = this.files[0];

  var fd = new FormData();
  fd.append("file1", file);
  // These extra params aren't necessary but show that you can include other data.
  fd.append("entity", "books");
  fd.append("pid", 13);
  fd.append("hash", "5cdbb0cf2f2ae4701dcf758e5b378145");
  fd.append("file",1);

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
}, false);
</script>
@stop