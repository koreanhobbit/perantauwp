<div class="row {{ count($images) < 1 ? '' : 'hidden' }}">
	<div class="col-sm-12">
		<div class="alert alert-info">
			<div class="text-center">
				<h1>There is no image</h1>
			</div>
		</div>
	</div>
</div>
<div class="row {{ count($images) < 1 ? 'hidden' : '' }}">
	<div class="col-sm-12">
		<div class="loaderHookImage">
			
		</div>
		<div class="imageContainer">
			@foreach($images as $image)
				<div class="col-sm-2 col-xs-6">
					<div class="thumbnail">
						<a href="javascript:" class="imageLink" data-id="{{ $image->id }}" data-location="{{ asset($image->thumbnail->location) }}" data-name="{{ $image->name }}" data-dismiss="modal">
							<img src="{{ asset($image->thumbnail->location) }}" title="{{ $image->name }}" class="img-responsive">
						</a>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</div>