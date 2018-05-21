@extends('admin.layouts.navs')

@section('page_heading', 'Create Blog')

@section('section')
	<div class="col-sm-12">
		<div class="row">
			<form action="{{ route('blog.store') }}" method="post">
				{{ csrf_field() }}
				<div class="col-sm-8">
					<div class="row">
						<div class="col-sm-12">
							@component('admin.widgets.panel')
								@slot('panelTitle1', 'Fill the form')
								@slot('panelBody')
									<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
										<label for="title">Title</label>
										<input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
										@if($errors->has('title'))
											<div class="help-block">
												<span>
													<strong>{{ $errors->first('title') }}</strong>
												</span>
											</div>
										@endif
									</div>
									<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
										<label for="slug">Slug</label>
										<input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') }}" required>
										@if($errors->has('slug'))
											<div class="help-block">
												<span>
													<strong>{{ $errors->first('slug') }}</strong>
												</span>
											</div>
										@endif
									</div>
									<div class="form-group {{ $errors->has('source') ? 'has-error' : '' }}">
										<label for="source">Source&nbsp;<span>
											<small>
												(* http://www.example.com)
											</small></span>
										</label>
										<input type="text" name="source" id="source" class="form-control" value="{{ old('source') }}">
										@if($errors->has('source'))
											<div class="help-block">
												<span>
													<strong>{{ $errors->first('source') }}</strong>
												</span>
											</div>
										@endif
									</div>
									<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
										<label for="description">Description</label>
										<textarea name="description" id="description">
											{{ old('description') }}
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
														@include('admin.blog.partials._imageLink')
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
								@slot('panelTitle1', 'Featured Image')
								@slot('panelBody')
									<div class="row addFeaturedImageBtn">
										<div class="col-sm-12">
											<a class="btn btn-sm btn-info" data-toggle="modal" data-target="#featuredImageModal">
												<i class="fa fa-image"></i>
												&nbsp;Add Featured Image
											</a>
										</div>
									</div>
									<div class="addFeaturedImageContainer hidden">
										<a class="close btn-warning removeFeaturedImageBtn">
											<i class="fa fa-close"></i>
										</a>
										<div class="thumbnail">
											<img src="" alt="" class="img-responsive">
										</div>
										<input type="hidden" name="featuredImage" id="featuredImageInput">
									</div>
								@endslot
							@endcomponent
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							@component('admin.widgets.panel')
								@slot('panelTitle1', 'Tags')
								@slot('panelBody')
									<div class="row">
										<div class="col-sm-8">
											<div class="form-group tagInput">
												<input type="text" class="form-control">
												<div class="help-block">
													<small>Seperate tags with commas (,)</small>
												</div>
											</div>	
										</div>
										<div class="col-sm-4">
											<a class="btn btn-primary addTagBtn">
												Add Tag		
											</a>
										</div>	
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="tagContainer">
												<ul class="list-inline"></ul>
											</div>
										</div>
									</div>

									@if(count($errors->has('tag.*')))
										@foreach($errors->get('tag.*') as $errorList)
											@foreach($errorList as $error)
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-error">
															<div class="help-block">
																<span>
																	<strong>{{ $error }}</strong>
																</span>
															</div>
														</div>
													</div>
												</div>
											@endforeach
										@endforeach
									@endif
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
												Submit
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
						 		<a href="{{ route('blog.index') }}">
						 			<i class="fa fa-arrow-left"></i>
						 			&nbsp;
						 			<span>go back to blog list</span>
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
	        <form action="{{ route('image.store') }}" class="dropzone" id="addNewImageDz" data-url="{{ route('blog.create') }}">
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
							@include('admin.blog.partials._featuredImage')
						</div>
						<div class="tab-pane fade" id="uploadFeaturedImageTab">
							
							<form action="{{ route('image.store') }}" class="dropzone" id="addNewFeaturedImageDz" data-url="{{ route('blog.create') }}">
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
				@endslot
			@endcomponent
	      </div>
	    </div>
	  </div>
	</div>
@endsection

@section('script')
	@include('admin.blog.script._script_create')
@endsection