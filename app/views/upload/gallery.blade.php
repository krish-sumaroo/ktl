<ul>
@foreach ($files as $file)
      <li>{{ HTML::image($file, 'a picture', array('class' => 'thumb')) }}</li>
@endforeach
</ul>