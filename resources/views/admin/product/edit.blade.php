@extends('admin.layouts.navs')

@section('styles')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
@endsection

@section('page_heading', 'Edit Product')

@section('section')
	<div class="col-sm-12">
		<div class="row">
			<form action="{{ route('product.update', ['product' => $product->slug]) }}" method="post">
				{{ csrf_field() }}
				{{ method_field('put') }}
				<div class="col-sm-8">
					<div class="row">
						<div class="col-sm-12">
							@component('admin.widgets.panel')
								@slot('panelTitle1', 'Fill the form')
								@slot('panelBody')
									<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
										<label for="title">Name</label>
										<input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
										@if($errors->has('name'))
											<div class="help-block">
												<span>
													<strong>{{ $errors->first('name') }}</strong>
												</span>
											</div>
										@endif
									</div>
									<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
										<label for="slug">Slug</label>
										<input type="text" name="slug" id="slug" class="form-control" value="{{ $product->slug }}" required>
										@if($errors->has('slug'))
											<div class="help-block">
												<span>
													<strong>{{ $errors->first('slug') }}</strong>
												</span>
											</div>
										@endif
									</div>
									<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
										<label for="source">Price</label>
										<input type="text" name="price" id="price" class="form-control" value="{{ $product->price }}">
										@if($errors->has('price'))
											<div class="help-block">
												<span>
													<strong>{{ $errors->first('price') }}</strong>
												</span>
											</div>
										@endif
									</div>
									<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
										<label for="description">Description</label>
										<textarea name="description" id="description">
											{{ $product->description }}
										</textarea>							
										@if($errors->has('description'))
											<div class="help-block">
												<span>
													<strong>{{ $errors->first('description') }}</strong>
												</span>
											</div>
										@endif
									</div>
									<a class="btn btn-info btn-sm imageReferencesBtn m-b-20">
										<i class="fa fa-question"></i>
										<span>
											&nbsp;Database Images Links
										</span>
									</a>
									<div class="imageReferences hidden" style="position:relative">
										<div class="row m-b-10">
											<div class="col-sm-12">
												<div class="pull-right">
													<a class="btn btn-sm btn-info addNewImageBtn" data-toggle="modal" data-target="#addNewImage">
														<i class="fa fa-image"></i>
														&nbsp;Add new image
													</a>
												</div>
											</div>
										</div>
										<div class="infoContainerLink alert alert-info {{ count($images) < 1 ? '' : 'hidden' }}">
											<h2 class="text-center">There is no image in database</h2>
										</div>
										<div class="row imageContainer {{ count($images) < 1 ? 'hidden' : '' }}">
											<div class="col-sm-12">
												<fieldset>
													<legend>Pick the link images for description</legend>
													<div class="loaderHook"></div>
													<div class="imageLinkContainer">	
														@include('admin.product.partials._imageLink')
													</div>	
												</fieldset>
											</div>
										</div>
									</div>									
								@endslot
							@endcomponent
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="row">
						<div class="col-sm-12">
							@component('admin.widgets.panel')
								@slot('panelTitle1', 'Category')
								@slot('panelBody')
									<div class="row">
										<div class="col-sm-12">
											@foreach($categories as $key => $cat)
												 <div class="radio">
										         	<label>
										          		<input name="category" value="{{ $cat->id }}" type="radio" {{ $cat->id == $product->category->id ? 'checked' : '' }}>
										          		{{ $cat->name }}
										         	</label>
										    	</div>
											@endforeach
										</div>
									</div>
								@endslot
							@endcomponent
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							@component('admin.widgets.panel')
								@slot('panelTitle1', 'Featured Image')
								@slot('panelBody')
									<div class="row addFeaturedImageBtn {{ $featuredImageMark ? 'hidden' : '' }}">
										<div class="col-sm-12">
											<a class="btn btn-sm btn-info" data-toggle="modal" data-target="#featuredImageModal">
												<i class="fa fa-image"></i>
												&nbsp;Add Featured Image
											</a>
										</div>
									</div>
									<div class="addFeaturedImageContainer {{ $featuredImageMark ? '' : 'hidden' }}">
											<a class="close btn-warning removeFeaturedImageBtn">
												<i class="fa fa-close"></i>
											</a>
											<div class="thumbnail">
												<img src="{{ $featuredImageMark ? asset($thumbnailFi->location) : '' }}" title="{{ $featuredImageMark ? $thumbnailFi->name : '' }}" class="img-responsive">
											</div>
											<input type="hidden" name="featuredImage" id="featuredImageInput" value="{{ $featuredImageMark ? $featuredImage->id : '' }}">
											
									</div>
								@endslot
							@endcomponent
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							@component('admin.widgets.panel')
								@slot('panelTitle1', 'Gallery Image')
								@slot('panelBody')
									<div class="row">
										<div class="col-sm-12">
											<div class="addGalleryImageContainer row {{ $galleryImageMark ? '' : 'hidden' }}">
												@if($galleryImageMark)
													@foreach($galleryImages as $key => $image)
														<div class="col-xs-6">
															<div class="thumbnail imageHolder">
																<img src="{{ $galleryImageMark ? asset($thumbnailGis[$key]->location) : '' }}" title="{{ $galleryImageMark ? $thumbnailGis[$key]->name : '' }}" data-id="{{ $image->id }}" class="img-responsive galleryImageReps">
																<a class="btn-sm btn-default removeGalleryImageBtn removeBtn">
																	<i class="fa fa-close"></i>
																</a>
															</div>
															<input type="hidden" name="{{ 'galleryimage[' . $image->id . ']' }}" class="galleryImageInput" value="{{ $image->id }}">
														</div>
													@endforeach
												@endif
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="row addGalleryImageBtn">
												<div class="col-sm-12">
													<a class="btn btn-sm btn-info" data-toggle="modal" data-target="#galleryImageModal">
														<i class="fa fa-image"></i>
														&nbsp;Add Gallery Image
													</a>
												</div>
											</div>
										</div>
									</div>
								@endslot
							@endcomponent
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							@component('admin.widgets.panel')
								@slot('panelTitle1', 'Sale')
								@slot('panelBody')
									<div class="row">
										<div class="col-sm-12">
											<div class="checkbox">
												<label for="sale">
													<input type="checkbox" name="sale_checkbox" id="sale_checkbox">
													<input type="hidden" name="is_sale" id="is_sale">
													Sale
												</label>
											</div>
										</div>
									</div>
									<div class="saleContainer hidden">
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group {{ $errors->has('sale_price') ? 'has-error' : '' }}">
													<label for="source">Price</label>
													<input type="text" name="sale_price" id="sale_price" class="form-control" value="{{ old('sale_price') }}">
													@if($errors->has('sale_price'))
														<div class="help-block">
															<span>
																<strong>{{ $errors->first('sale_price') }}</strong>
															</span>
														</div>
													@endif
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-6">
												<div class="form-group">
													<label for="startDate">Start Date:</label>
													<div class="input-group date">
													    <input type="text" class="form-control" id="startDate" name="startdate">
													    <div class="input-group-addon">
													        <span><i class="fa fa-calendar"></i></span>
													    </div>
													</div>
												</div>
											</div>
											<div class="col-xs-6">
												<div class="form-group">
													<label for="endDate">End Date:</label>
													<div class="input-group date">
													    <input type="text" class="form-control" id="endDate" name="enddate">
													    <div class="input-group-addon">
													        <span><i class="fa fa-calendar"></i></span>
													    </div>
													</div>
												</div>
											</div>
										</div>
									</div>
								@endslot
							@endcomponent
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							@component('admin.widgets.panel')
								@slot('panelTitle1', 'Submit')
								@slot('panelBody')
									<div class="row">
										<div class="col-sm-12">
											<button type="submit" class="btn btn-primary form-control">
												Update
											</button>
										</div>
									</div>			
								@endslot	
							@endcomponent
						</div>
					</div>
					<div class="row">
						 <div class="col-sm-12">
						 	<div class="text-center">
						 		<a href="{{ route('product.index') }}">
						 			<i class="fa fa-arrow-left"></i>
						 			&nbsp;
						 			<span>go back to product list</span>
						 		</a>
						 	</div>
						 </div>
					</div>
				</div>
			</form>
		</div>
	</div>

	{{-- modal for add new image for links --}}
	<div class="modal fade-in" id="addNewImage">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title">Add New Image</h4>
	      </div>
	      <div class="modal-body">
	        <form action="{{ route('image.store') }}" class="dropzone" id="addNewImageDz" data-url="{{ route('product.create') }}">
				{{ csrf_field() }}
				<div class="fallback">
					<input type="file" name="image" multiple>
				</div>
				<div class="dz-message">
					<h3 class="text-center">
						Drop your images inside the box or click to add images 
					</h3>
				</div>
			</form>
	      </div>
	    </div>
	  </div>
	</div>


	{{-- modal for featured image --}}
	<div class="modal fade-in full-modal" id="featuredImageModal">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title">Add Featured Image</h4>
	      </div>
	      <div class="modal-body">
				@component('admin.widgets.panel')
				@slot('class', 'default')
				@slot('panelTitle1', 'Choose Featured Image')
				@slot('panelBody')
					<ul class="nav nav-tabs" style="margin-bottom: 20px;">
						<li class="active" id="featuredImageList"><a href="#featuredImageTab" data-toggle="tab">Featured Image</a></li>
						<li class="" id="uploadFeaturedImageList"><a href="#uploadFeaturedImageTab" data-toggle="tab">Upload Featured Image</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade active in" id="featuredImageTab">
							@include('admin.product.partials._featuredImage')
						</div>
						<div class="tab-pane fade" id="uploadFeaturedImageTab">
							@component('admin.widgets.panel')
								@slot('panelBody')
									<form action="{{ route('image.store') }}" class="dropzone" id="addNewFeaturedImageDz" data-url="{{ route('product.create') }}">
										{{ csrf_field() }}
										<div class="fallback">
											<input type="file" name="image" multiple>
										</div>
										<div class="dz-message">
											<h3 class="text-center">
												Drop your images inside the box or click to add images 
											</h3>
										</div>
									</form>
								@endslot
							@endcomponent
						</div>
					</div>
				@endslot
			@endcomponent
	      </div>
	    </div>
	  </div>
	</div>

	{{-- modal for gallery image --}}
	<div class="modal fade-in full-modal" id="galleryImageModal">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title">Add Gallery Images</h4>
	      </div>
	      <div class="modal-body">
				@component('admin.widgets.panel')
				@slot('class', 'default')
				@slot('panelTitle1', 'Choose Gallery Images')
				@slot('panelBody')
					<ul class="nav nav-tabs" style="margin-bottom: 20px;">
						<li class="active" id="galleryImagesList"><a href="#galleryImagesTab" data-toggle="tab">Gallery Images</a></li>
						<li class="" id="uploadGalleryImagesList"><a href="#uploadGalleryImagesTab" data-toggle="tab">Upload Gallery Images</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade active in" id="galleryImagesTab">
							@include('admin.product.partials._galleryImages')
						</div>
						<div class="tab-pane fade" id="uploadGalleryImagesTab">
							@component('admin.widgets.panel')
								@slot('panelBody')
									<form action="{{ route('image.store') }}" class="dropzone" id="addNewGalleryImageDz" data-url="{{ route('product.create') }}">
										{{ csrf_field() }}
										<div class="fallback">
											<input type="file" name="image" multiple>
										</div>
										<div class="dz-message">
											<h3 class="text-center">
												Drop your images inside the box or click to add images 
											</h3>
										</div>
									</form>
								@endslot
							@endcomponent
						</div>
					</div>
				@endslot
			@endcomponent
	      </div>
	    </div>
	  </div>
	</div>
@endsection

@section('script')
	@include('admin.product.script._edit')
@endsection