@extends('admin.layouts.navs')

@section('page_heading', 'Create Partner')

@section('section')
	<form action="{{ route('partner.store') }}" method="post">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-sm-12 m-b-20">
				<div class="pull-right">
					<button class="btn btn-sm btn-primary" type="submit">Create Partner</button>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-8">
				@component('admin.widgets.panel')
					@slot('panelTitle1', 'Fill Form')
					@slot('panelBody')
						<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
							<label for="name">Name</label>
							<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
							@if($errors->has('name'))
								<div class="help-block">
									<span>
										<strong>
											{{ $errors->first('name') }}
										</strong>
									</span>
								</div>
							@endif
						</div>
						<div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
							<label for="link">Link</label>
							<input type="text" name="link" class="form-control" id="link" value="{{ old('link') }}">
							@if($errors->has('link'))
								<div class="help-block">
									<span>
										<strong>
											{{ $errors->first('link') }}
										</strong>
									</span>
								</div>
							@endif
						</div>
					@endslot
				@endcomponent
			</div>
			<div class="col-sm-4">
				@component('admin.widgets.panel')
					@slot('panelTitle1', 'Image')
					@slot('panelBody')
						<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
							<div class="imgPlace hidden">
								<a class="close btn-warning closeImgBtn">
									<i class="fa fa-close"></i>
								</a>
								<div class="thumbnail">
									<img src="" title="" class="img-responsive">
								</div>
								<input type="hidden" name="image" id="image" value="">
							</div>
							<a class="btn btn-info form-control addImageBtn" data-toggle="modal" data-target="#imageModal">
								<span><i class="fa fa-plus"></i></span>
								&nbsp;Add Image
							</a>
							@if($errors->has('image'))
								<div class="help-block">
									<span>
										<strong>
											{{ $errors->first('image') }}
										</strong>
									</span>
								</div>
							@endif
						</div>
					@endslot
				@endcomponent
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="pull-right">
					<a href="{{ route('partner.index') }}"><span><i class="fa fa-arrow-left"></i></span>&nbsp;Back To List</a>
				</div>
			</div>
		</div>
	</form>
	
	{{-- modal --}}
	{{-- modal for add new image --}}
	<div class="modal fade-in full-modal" id="imageModal">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title">Add Image</h4>
	      </div>
	      <div class="modal-body">
				@component('admin.widgets.panel')
				@slot('class', 'default')
				@slot('panelTitle1', 'Choose Image')
				@slot('panelBody')
					<ul class="nav nav-tabs" style="margin-bottom: 20px;">
						<li class="active" id="imageList"><a href="#imageTab" data-toggle="tab">Image</a></li>
						<li class="" id="uploadImageList"><a href="#uploadImageTab" data-toggle="tab">Upload Image</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade active in" id="imageTab">
							@include('admin.partner.partials._image')
						</div>
						<div class="tab-pane fade" id="uploadImageTab">
							@component('admin.widgets.panel')
								@slot('panelBody')
									<form action="{{ route('image.store') }}" class="dropzone" id="addNewImageDz" data-url="{{ route('partner.create') }}">
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
	@include('admin.partner.script._create')
@endsection