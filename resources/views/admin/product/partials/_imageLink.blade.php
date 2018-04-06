<div class="row">
	@foreach($images->load('thumbnail') as $image)
		<div class="col-md-2 col-xs-6 imageReference">
			<div class="thumbnail">
				<img src="{{ asset($image->thumbnail->location) }}" class="img-responsive" title="{{ $image->thumbnail->name }}">
			</div>
			<div class="text-center m-b-20">
				<a class="showLinkBtn btn btn-sm btn-success" data-toggle="modal" data-target="#{{ $image->id }}">Show Link</a>
			</div>
		</div>
		<div class="modal fade-in" id="{{ $image->id }}">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title">Image Link</h4>
		      </div>
		      <div class="modal-body">
		        <p class="text-center" style="word-wrap: break-word;">{{ asset($image->location) }}</p>
		      </div>
		    </div>
		  </div>
		</div>
	@endforeach
</div>
<div class="row">
	<div class="text-center">
		{{ $images->links() }}
	</div>
</div>
	
