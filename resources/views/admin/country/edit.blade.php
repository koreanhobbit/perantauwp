@extends('admin.layouts.navs')

@section('page_heading', 'Edit Country')

@section('section')
	<form action="{{ route('country.update', ['country' => $country->id]) }}" method="post">
		{{ csrf_field() }}
		{{ method_field('put') }}
		<div class="col-sm-12">
			<div class="row m-b-20">
				<div class="col-sm-12">
					<div class="pull-right">
						<button class="btn btn-primary btn-sm" type="submit">
							Edit Country
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
										<input type="text" name="countryName" id="countryName" class="form-control" value="{{ $country->name }}">
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
										<input type="text" name="countrySlug" id="countrySlug" class="form-control" value="{{ $country->slug }}">
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
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label for="countryType">Type</label>
										<select name="" id="" class="form-control" disabled="">
											<option value="0" {{ $country->type == 0 ? 'selected' : '' }}>Origin Country</option>
											<option value="1" {{ $country->type == 1 ? 'selected' : '' }}>Destination Country</option>
										</select>
										<input type="hidden" name="countryType" id="countryType" value="{{ $country->type }}">
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
								<div class="row hidden areaRowOne">
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
								@if(count($country->areas) > 0 || $country->type == 1)
									@foreach($country->areas as $area)
										<div class="row">
											<div class="col-sm-5">		
												<div class="form-group">
													<label for="areaName1">Area Name</label>
													<input type="text" name="areaName[{{ $area->id }}]" id="areaName[{{ $area->id }}]" class="form-control areaName" value="{{ $area->name }}">
												</div>
											</div>
											<div class="col-sm-5">		
												<div class="form-group">
													<label for="areaSlug1">Area Slug</label>
													<input type="text" name="areaSlug[{{ $area->id }}]" id="areaSlug[{{ $area->id }}]" class="form-control areaSlug" value="{{ $area->slug }}">
												</div>
											</div>
											<div class="col-sm-2 text-center">
												<label for="deleteAreaBtn">Delete</label>
												<a class="btn btn-sm btn-danger deleteAreaBtn"><span><i class="fa fa-trash-o"></i></span></a>
											</div>
										</div>
									@endforeach
								@else
									<div class="row">
										<div class="col-sm-12">
											<div class="alert alert-info">
												<h5>No need area info</h5>
											</div>
										</div>
									</div>
								@endif
								@if($errors->has('areaName'))
									<div class="help-block">
										<span>
											<strong>
												@foreach($errors as $error)
													{{ $error }}	
												@endforeach
												{{ $errors->first('areaName') }}
											</strong>
										</span>
									</div>
								@endif
							</div>
							@if($country->type == 1)
								<div class="row">
									<div class="col-sm-12">
										<a class="btn btn-info btn-sm addAreaInput">Add More Area</a>
									</div>
								</div>
							@endif
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
	@include('admin.country.script._edit')
@endsection