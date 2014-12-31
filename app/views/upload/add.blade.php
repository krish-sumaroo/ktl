@for ($i = 1; $i <= $count; $i++)
  <div class="col-xs-4 col-md-2">
    <div class="thumbnail">
      {{ HTML::image($defImg, 'default', array('class' => 'thumb', 'width' => '150')) }}
      <div class="caption delBox hidden">
        <a href="#" class="btn btn-primary" role="button" class="delImage" data-ref="{{$defImg}}">Delete</a>
      </div>
      <div class="caption addBox">
        <input type="file" name="file" class="imagesUp" accept="image/*"/>
      </div>
    </div>
  </div>
@endfor