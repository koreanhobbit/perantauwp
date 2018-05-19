@extends('admin.layouts.navs')

@section('page_heading', 'New Role')

@section('section')
	<div class="col-sm-12">
		<form action="{{ route('role.store') }}" method="post">
			{{ csrf_field() }}
			<div class="row m-b-20">
				<div class="col-sm-12">
					<div class="pull-right">
						<button class="btn btn-sm btn-primary" type="submit">
							Create
						</button>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-12">
							@component('admin.widgets.panel')
								@slot('panelTitle', 'Complete the form')
								@slot('panelBody')
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group {{ $errors->has('name')? "has-error" : "" }}">
												<label for="name">Name:</label>
												<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
												@if($errors->has('name'))
													<span class="help-block">
														<strong>
															{{ $errors->first('name') }}
														</strong>
													</span>
												@endif
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group {{ $errors->has('displayName')? "has-error" : "" }}">
												<label for="displayName">Display Name:</label>
												<input type="text" name="displayName" id="displayName" class="form-control" value="{{ old('displayName') }}">
												@if($errors->has('displayName'))
													<span class="help-block">
														<strong>
															{{ $errors->first('displayName') }}
														</strong>
													</span>
												@endif
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group {{ $errors->has('description')? "has-error" : "" }}">
												<label for="description">Description:</label>
												<input type="text" name="description" id="description" value="{{ old('description') }}" class="form-control">
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
			</div>
			<div class="row">
				<div class="col-sm-12">
					 @component('admin.widgets.panel')
						@slot('panelTitle', 'Permissions')
						@slot('panelBody')
							<div class="row">
								@foreach($permissions as $permission)
									<div class="col-sm-3">
										<label for="checkbox">
											<input type="checkbox" name="{{ 'permission[' . $permission->id . ']' }}" id="{{ 'permission[' . $permission->id . ']' }}" value="{{ $permission->id }}">
											{{ $permission->display_name }}
										</label>
									</div>
								@endforeach
							</div>
						@endslot
					 @endcomponent
				</div>
			</div>
		</form>
		<div class="row">
			<div class="col-sm-12">
				<div class="pull-right">
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
@endsection