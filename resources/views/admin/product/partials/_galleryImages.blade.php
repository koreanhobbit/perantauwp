@component('admin.widgets.panel')
	@slot('panelTitle1', 'Choose Gallery Images')
	@slot('panelBody')
		<div class="row infoGalleryContainer {{ !count($images_gi) < 1 ? 'hidden' : ''}}">
			<div class="col-sm-12">
				<div class="alert alert-info">
					<div class="text-center">
						<h1>There is no image</h1>
					</div>
				</div>
			</div>
		</div>
		<div class="row m-r-10 m-b-20 {{ count($images_gi) < 1 ? 'hidden' : '' }}">
			<div class="col-sm-12">
				<div class="pull-right">
					<div>
						<a href="javascript:" class="btn btn-info btn-sm addGalleryBtn">
							Add Gallery Images
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="galleryImagesDiv {{ count($images_gi) < 1 ? 'hidden' : '' }}" style="display: relative">

					<div class="loaderHookGalleryImages">
						
					</div>
					<div class="galleryImagesContainer">
						@foreach($images_gi as $image)
							<div class="col-sm-2 col-xs-6">
								<div class="thumbnail">
									<a href="javascript:" class="galleryImagesLink" data-id="{{ $image->id }}" data-location="{{ asset($image->thumbnail->location) }}" data-name="{{ $image->name }}">
										<img src="{{ asset($image->thumbnail->location) }}" title="{{ $image->name }}" class="img-responsive">
									</a>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="text-center">
					{{ $images_gi->links() }}
				</div>
			</div>
		</div>
	@endslot
@endcomponent