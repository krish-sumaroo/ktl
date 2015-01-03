@foreach ($files as $file)	
  <div class="col-xs-4 col-md-2">
    <div class="thumbnail">
      {{ HTML::image($file, 'a picture', array('class' => 'thumb', 'width' => '150')) }}
    </div>
  </div>
  @endforeach