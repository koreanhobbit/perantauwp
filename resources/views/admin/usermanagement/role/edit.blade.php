@extends('admin.layouts.navs')

@section('page_heading', 'Edit Role')

@section('section')
	<div class="col-sm-12">
		<div class="row">
			<div class="col-sm-8">
				<div class="row">
					<div class="col-sm-12">
						@component('admin.widgets.panel')
							@slot('panelTitle1', 'Complete the form')
							@slot('panelBody')
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group {{ $errors->has('name')? "has-error" : "" }}">
											<label for="name">Name:</label>
											<input type="text" name="name" id="name" class="form-control" value="{{ $role->name }}">
											@if($errors->has('name'))
												<span class="help-block">
													<strong>
														{{ $errors->first('name') }}
													</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('displayName')? "has-error" : "" }}">
											<label for="displayName">Display Name:</label>
											<input type="text" name="displayName" id="displayName" class="form-control" value="{{ $role->display_name }}">
											@if($errors->has('displayName'))
												<span class="help-block">
													<strong>
														{{ $errors->first('displayName') }}
													</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('description')? "has-error" : "" }}">
											<label for="description">Description:</label>
											<textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $role->description }}</textarea>
											@if($errors->has('description'))
												<span class="help-block">
													<strong>
														{{ $errors->first('description') }}
													</strong>
												</span>
											@endif
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
							@slot('panelTitle1', 'Submit')
							@slot('panelBody')
								<div class="row">
									<div class="col-sm-12">
										<button class="btn btn-primary btn-sm form-control">
											Edit
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
							<a href="{{ route('role.index') }}">
								<span>
									<i class="fa fa-arrow-left"></i>
								</span>
								&nbsp;back to roles list
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection