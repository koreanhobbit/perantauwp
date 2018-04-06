@component('admin.widgets.panel')
	@slot('panelTitle1', 'Choose Featured Image')
	@slot('panelBody')
		<div class="row infoContainer {{ !count($images_fi) < 1 ? 'hidden' : ''}}">
			<div class="col-sm-12">
				<div class="alert alert-info">
					<div class="text-center">
						<h1>There is no image</h1>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="featuredImageDiv {{ count($images_fi) < 1 ? 'hidden' : '' }}" style="display: relative">
					<div class="loaderHookFeaturedImage">
						
					</div>
					<div class="featuredImageContainer">
						@if(count($images_fi) > 0)
							@foreach($images_fi as $image)
								<div class="col-sm-2 col-xs-6">
									<div class="thumbnail">
										<a href="javascript:" class="featuredImageLink" data-id="{{ $image->id }}" data-location="{{ asset($image->thumbnail->location) }}" data-name="{{ $image->name }}">
											<img src="{{ asset($image->thumbnail->location) }}" title="{{ $image->name }}" class="img-responsive">
										</a>
									</div>
								</div>
							@endforeach
						@endif
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="text-center"> 
					 {{ $images_fi->links() }}
				</div>
			</div>
		</div>
	@endslot
@endcomponent