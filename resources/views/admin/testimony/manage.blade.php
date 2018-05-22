@extends('admin.layouts.navs')

@section('page_heading', 'Testimony Management')

@section('section')
	<div class="col-sm-12">
		<div class="row">
			<div class="col-sm-4">
				@component('admin.widgets.panel')
					@slot('class', 'primary')
					@slot('panelTitle', 'Search')
					@slot('panelBody')
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="userRole">User Type</label>
									<select name="userRole" id="userRole" class="form-control">
										<option value="" data-url="{{ route('testimony.manage') }}">Choose User Type</option>
										@foreach($roles as $role)
											<option value="{{ $role->id }}">{{ $role->display_name }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
					@endslot
				@endcomponent
			</div>
			<div class="col-sm-8">
				<div class="loaderHook"></div>
				<div class="testimonyDetailsContainer">
					@component('admin.widgets.panel')
						@slot('class', 'info')
						@slot('panelTitle', 'Select Details')
						@slot('panelBody')
							<div class="row">
								<div class="col-sm-12">
									<div class="userDetails">
										<div class="alert alert-info">
											<div class="text-center">
												<h1>Please choose role</h1>
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
@endsection

@section('script')
	@include('admin.testimony.script._manage')
@endsection