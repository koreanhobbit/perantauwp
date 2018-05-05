@extends('admin.layouts.navs')

@section('page_heading', 'Create Partner')

@section('section')
	<div class="row">
		<div class="col-sm-12 m-b-20">
			<div class="pull-right">
				<button class="btn btn-sm btn-primary">Create Partner</button>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-8">
			@component('admin.widgets.panel')
				@slot('panelTitle1', 'Fill Form')
				@slot('panelBody')
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="name" id="name" class="form-control">
					</div>
					<div class="form-group">
						<label for="link">Link</label>
						<input type="text" name="link" class="form-control" id="link">
					</div>
				@endslot
			@endcomponent
		</div>
		<div class="col-sm-4">
			@component('admin.widgets.panel')
				@slot('panelTitle1', 'Image')
				@slot('panelBody')
					<a class="btn btn-info form-control" data-toggle="modal" data-target="#imageModal">
						<span><i class="fa fa-plus"></i></span>
						&nbsp;Add Image
					</a>
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
							
						</div>
						<div class="tab-pane fade" id="uploadImageTab">
							@component('admin.widgets.panel')
								@slot('panelBody')
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