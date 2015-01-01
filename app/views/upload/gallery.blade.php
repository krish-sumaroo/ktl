@foreach ($files as $file)	
  <div class="col-xs-4 col-md-2">
    <div class="thumbnail">
      {{ HTML::image($file, 'a picture', array('class' => 'thumb', 'width' => '150')) }}
      <div class="caption delBox">
        <a href="#" class="btn btn-primary delImage" role="button" data-ref="{{$file}}">Delete</a>
      </div>
      <div class="caption addBox hidden">
        <input type="file" name="file" class="imagesUp" accept="image/*"/>
      </div>
    </div>
  </div>
  @endforeach