@extends('admin.layouts.navs')

@section('page_heading', 'Create New Country')

@section('section')
	<form action="{{ route('country.store') }}" method="post">
		{{ csrf_field() }}
		<div class="col-sm-12">
			<div class="row m-b-20">
				<div class="col-sm-12">
					<div class="pull-right">
						<button class="btn btn-primary btn-sm" type="submit">
							Create Country
						</button>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					@component('admin.widgets.panel')
						@slot('panelTitle1', 'Country')
						@slot('panelBody')
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group {{ $errors->has('countryName') ? 'has-error' : '' }}">
										<label for="countryName">Country Name</label>
										<input type="text" name="countryName" id="countryName" class="form-control" value="{{ old('countryName') }}">
										@if($errors->has('countryName'))
											<div class="help-block">
												<span>
													<strong>
														{{ $errors->first('countryName') }}
													</strong>
												</span>
											</div>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group {{ $errors->has('countrySlug') ? 'has-error' : '' }}">
										<label for="countrySlug">Country Slug</label>
										<input type="text" name="countrySlug" id="countrySlug" class="form-control" value="{{ old('countrySlug') }}">
										@if($errors->has('countrySlug'))
											<div class="help-block">
												<span>
													<strong>
														{{ $errors->first('countrySlug') }}
													</strong>
												</span>
											</div>
										@endif
									</div>
								</div>
							</div>
						@endslot
					@endcomponent
				</div>
				<div class="col-sm-6">
					@component('admin.widgets.panel')
						@slot('panelTitle1', 'Area')
						@slot('panelBody')
							<div class="formAreaInputContainer form-group {{ $errors->has('areaName') ? 'has-error' : '' }}">
								<div class="row">
									<div class="col-sm-5">		
										<div class="form-group">
											<label for="areaName1">Area Name</label>
											<input type="text" name="areaName1" id="areaName1" class="form-control areaName">
										</div>
									</div>
									<div class="col-sm-5">		
										<div class="form-group">
											<label for="areaSlug1">Area Slug</label>
											<input type="text" name="areaSlug1" id="areaSlug1" class="form-control areaSlug">
										</div>
									</div>
								</div>
								@if($errors->has('areaName'))
									<div class="help-block">
										<span>
											<strong>
												{{-- @foreach($errors as $error)
													{{ $error->areaName }}	
												@endforeach --}}
												{{ $errors->first('areaName') }}
											</strong>
										</span>
									</div>
								@endif
							</div>
							<div class="row">
								<div class="col-sm-12">
									<a class="btn btn-info btn-sm addAreaInput">Add More Area</a>
								</div>
							</div>
						@endslot
					@endcomponent
				</div>	
			</div>
			<div class="row m-b-20">
				<div class="col-sm-12">
					<div class="pull-right">
						<a href="{{ route('country.index') }}">
							<span><i class="fa fa-arrow-left"></i>&nbsp;Back to Country Setting</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</form>
@endsection

@section('script')
	@include('admin.country.script._create')
@endsection