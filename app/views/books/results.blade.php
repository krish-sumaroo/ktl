@foreach($results as $key=>$value)
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">
			<a href="{{Request::url()}}/{{$value->id}}">{{$value->title}}</a>	
	    		@if (in_array($value->id, $favs)) 
					<button type="button" data-item="{{$value->id}}" class="btn btn-default btn-xs btn-danger removeFav " style="float: right;margin-left: 10px;">
						<span class="glyphicon glyphicon-heart-empty " aria-hidden="true"></span>
					</button>
					<button type="button" data-item="{{$value->id}}" class="btn btn-default btn-xs btn-success addFav " style="float: right; display:none;">
						<span class="glyphicon glyphicon-heart-empty " aria-hidden="true"></span>
					</button>	
   				 @else 
					<button type="button" data-item="{{$value->id}}" class="btn btn-default btn-xs btn-danger removeFav " style="float: right;margin-left: 10px; display:none;">
						<span class="glyphicon glyphicon-heart-empty " aria-hidden="true"></span>
					</button>
					<button type="button" data-entity="{{$entity}}" data-item="{{$value->id}}" class="btn btn-default btn-xs btn-success addFav " style="float: right;">
						<span class="glyphicon glyphicon-heart-empty " aria-hidden="true"></span>
					</button>					
				@endif
		</h3>
		
	</div>
  	<div class="panel-body">
	    <div>
	    	<ul class="list-group">
			  <li class="list-group-item list-group-item-info">Author : {{$value->author}}</li>
			  <li class="list-group-item list-group-item-info">Published : {{$value->year}}</li>
			  <li class="list-group-item list-group-item-info">Price : {{$value->price}}</li>
			</ul>
	    </div>

	    <div>
	    	<?php $tags = explode(',', $value->tags);
	    		  array_shift($tags);
	    	?>
	    	@foreach($tags as $tag)
	    	<span class="label label-success" >{{$tag}}</span>
	    	@endforeach
	    </div>



	    @if($owner)
	    <div class="action">
	    	<a href="{{Request::root()}}/{{$entity}}/details/{{$value->id}}"><button type="button" class="btn btn-warning">Edit</button></a>	    	
	    </div>
	    @endif	
  	</div>  
</div>
@endforeach