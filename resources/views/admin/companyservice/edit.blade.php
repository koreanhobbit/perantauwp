@extends('admin.layouts.navs')

@section('page_heading', 'Edit Service')

@section('section')
	<form action="{{ route('service.update', ['id' => $service->id]) }}" method="post">
	{{ csrf_field() }}
	{{ method_field('put') }}
		<div class="row">
			<div class="col-sm-9">
				@component('admin.widgets.panel')
					@slot('panelTitle1', 'Description')
					@slot('panelBody')
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
									<label for="name">Name</label>
									<input type="text" class="form-control" name="name" id="name" value="{{ $service->name }}" required>
									@if($errors->has('name'))
										<div class="help-block">
											<span>
												<strong>{{ $errors->first('name') }}</strong>
											</span>
										</div>
									@endif
								</div>
								<div class="form-group {{ $errors->has('icon') ? 'has-error' : '' }}">
									<label for="icon">Icon</label>
									<input type="text" class="form-control" name="icon" id="icon" value="{{ $service->icon }}" required>
									@if($errors->has('icon'))
										<div class="help-block">
											<span>
												<strong>{{ $errors->first('icon') }}</strong>
											</span>
										</div>
									@endif
								</div>
								<div class="form-group">
									<label for="type">Type</label>
									<select name="type" id="type" class="form-control" value="{{ $service->type }}">
										<option value="0">Regular</option>
										<option value="1">Special</option>
									</select>
								</div>
								<div class="form-group {{ $errors->has('shortdesc') ? 'has-error' : '' }}">
									<label for="shortdesc">Short Description</label>
									<textarea class="form-control" name="shortdesc" id="shortdesc">{{ $service->short_desc }}</textarea>
									@if($errors->has('shortdesc'))
										<div class="help-block">
											<span>
												<strong>{{ $errors->first('shortdesc') }}</strong>
											</span>
										</div>
									@endif
								</div>
								<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
									<label for="description">Description</label>
									<textarea class="form-control" name="description" id="description">{{ $service->description }}</textarea>
									@if($errors->has('description'))
										<div class="help-block">
											<span>
												<strong>{{ $errors->first('description') }}</strong>
											</span>
										</div>
									@endif
								</div>
							</div>
						</div>
					@endslot
				@endcomponent
			</div>
			<div class="col-sm-3">
				<div class="col-sm-12">
					@component('admin.widgets.panel')
						@slot('panelTitle1', 'Submit')
						@slot('panelBody')
							<div class="row">
								<div class="col-sm-12">
									<div class="text-center">
										<button type="submit" class="btn btn-primary btn-sm form-control">
											Edit
										</button>
									</div>
								</div>
							</div>
						@endslot
					@endcomponent
				</div>
			</div>
		</div>
	</form>
@endsection

@section('script')
	@include('admin.companyservice.script._create')
@endsection