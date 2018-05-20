{{-- modal for profile image --}}
	<div class="modal fade-in full-modal" id="profileImageModal">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title">Add Profile Image</h4>
	      </div>
	      <div class="modal-body">
				@component('admin.widgets.panel')
				@slot('class', 'default')
				@slot('panelTitle', 'Choose Profile Image')
				@slot('panelBody')
					<ul class="nav nav-tabs" style="margin-bottom: 20px;">
						<li class="" id="profileImageList"><a href="#profileImageTab" data-toggle="tab">Image List</a></li>
						<li class="active" id="uploadProfileImageList"><a href="#uploadProfileImageTab" data-toggle="tab">Upload Profile Image</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade" id="profileImageTab">
							@include('admin_customer.profile.partial._profile_image')
						</div>
						<div class="tab-pane fade active in" id="uploadProfileImageTab">
							<div class="row">
								<div class="col-sm-12">
									<form action="{{ route('image.store') }}" class="dropzone" id="addNewProfileImageDz" data-url="{{ route('customer.profile.index', ['user' => Auth::user()->id, 'name' => Auth::user()->name]) }}">
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
							<div class="row">
								<div class="col-sm-12">
									<div class="help-block">
										<span>
											<strong>
												Max File size is 3 Mb
											</strong>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endslot
			@endcomponent
	      </div>
	    </div>
	  </div>
	</div>