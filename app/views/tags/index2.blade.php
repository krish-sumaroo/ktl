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
			@if(isset($savedTags[$value->id]))
				<button type="button" class="btn btn-primary btn-xs tagsIn" id="tag_{{$value->id}}" data-element="{{$value->id}}">{{$value->title}} <span class="glyphicon glyphicon-ok-sign tagsOk" aria-hidden="true"></span></button>
			@else	
				<button type="button" class="btn btn-default btn-xs tags" id="tag_{{$value->id}}" data-element="{{$value->id}}">{{$value->title}}</button>
			@endif
		@endforeach
		</button>
	</h4>
  </div>  
</div>