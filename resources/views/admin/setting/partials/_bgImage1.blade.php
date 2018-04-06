@component('admin.widgets.panel')
	@slot('panelTitle1', 'Choose Image')
	@slot('panelBody')
		<div class="row infoContainer {{ count($bgImages1) > 0 ? 'hidden' : ''}}">
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
				<div class="bgImage1Div {{ count($bgImages1) > 0 ? '' : 'hidden' }}" style="display: relative">
					<div class="loaderHookBgImage1">
						
					</div>
					<div class="bgImage1Container">
						@if(count($bgImages1) > 0)
							@foreach($bgImages1 as $image)
								<div class="col-sm-2 col-xs-6">
									<div class="thumbnail">
										<a href="javascript:" class="bgImage1Link" data-id="{{ $image->id }}" data-location="{{ asset($image->thumbnail->location) }}" data-name="{{ $image->name }}">
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
	@endslot
@endcomponent
<div class="row">
	<div class="col-sm-12">
		<div class="text-center">
			{{ $bgImages1->links() }}
		</div>
	</div>
</div>