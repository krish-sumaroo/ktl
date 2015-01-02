<div class="panel panel-success">
	<div class="panel-heading" id="mainTags">
		<h3 class="panel-title">Tags</h3>
		<button type="button" id="tgAdd" class="btn btn-default btn-sm pull-right" data-toggle="popover" >
		  <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add
		</button>
	</div>
  <div class="panel-body">
    <h4 id="allTags">
		@foreach($tags as $key=>$value)
		<span class="label label-success tags" id="tag_{{$value->id}}">{{$value->title}}</span>
		@endforeach
	</h4>
  </div>  
</div>

<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">My Tags</h3>
	</div>
  <div class="panel-body">
    <h4 id="chTag">
		
	</h4>
  </div>  
</div>