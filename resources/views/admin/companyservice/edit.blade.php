@extends('admin.layouts.navs')

@section('page_heading', 'Edit Service')

@section('section')
	<form action="{{ route('service.update', ['id' => $service->id]) }}" method="post">
	{{ csrf_field() }}
	{{ method_field('put') }}
		<div class="row m-b-20">
			<div class="col-sm-12">
				<div class="pull-right">
					<button type="submit" class="btn btn-primary btn-sm">
						<span>
							<i class="fa fa-hand-o-right"></i>
						</span>&nbsp;
						Edit Service
					</button>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-7">
				<div class="row">
					<div class="col-sm-12">
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
											<textarea class="form-control" name="shortdesc" id="shortdesc" rows="6">{{ $service->short_desc }}</textarea>
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
											<textarea class="form-control" name="description" id="description" rows="6">{{ $service->description }}</textarea>
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
				</div>
			</div>
			<div class="col-sm-5">
				<div class="row">
					<div class="col-sm-12">
						@component('admin.widgets.panel')
							@slot('panelTitle1', 'Service Points')
							@slot('panelBody')
								<div class="row">
									<div class="col-sm-12">
										<div class="pointContainer form-group">
											@foreach($service->points as $point)
												<div class="row">
													<div class="col-xs-8">
														<div class="form-group">
															<label for="pointdesc">Description</label>
															<input type="text" name="pointdesc[{{ $point->slug }}]" id="pointdesc[{{ $point->slug }}]" class="form-control pointdesc" value="{{ $point->description }}">
														</div>
													</div>
													<div class="col-xs-2">
														<div class="form-group">
															<label for="pointshow"></label>
															<label class="checkbox">
																<input type="checkbox" name="pointshow[{{ $point->slug }}]" id="pointshow[{{ $point->slug }}]" class="pointshow" {{ $point->show == 1 ? 'checked' : '' }}>Show
															</label>
														</div>
													</div>
													<div class="col-xs-2">
														<label for="deletePointRowBtn">Del</label>
														<a class="btn btn-sm btn-danger deletePointRowBtn">
															<span>
																<i class="fa fa-trash"></i>
															</span>
														</a>
													</div>
													<input type="hidden" name="pointslug[{{ $point->slug }}]" id="pointslug[{{ $point->slug }}]" class="pointslug" value="{{ $point->slug }}"> 
												</div>
											@endforeach
											@if($errors->has('pointname'))
												<span>
													<strong>
														{{ $errors->first('pointname') }}
													</strong>
												</span>
											@endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="pull-left">
											<a class="btn btn-info btn-sm addPointBtn">
												Add Point
											</a>
										</div>
									</div>
								</div>
							@endslot
						@endcomponent
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						@component('admin.widgets.panel')
							@slot('panelTitle1', 'Service Fare')
							@slot('panelBody')
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label for="farecurrency">Currency</label>
											<select name="farecurrency" id="farecurrency" class="form-control">
												<option value="">Default</option>
												@foreach($currencies as $item)
													<option value="{{ $item->symbol }}" {{ !empty($service->fare) && $service->fare->currency === $item->symbol ? 'selected' : '' }}>{{ ucfirst($item->name) }}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group {{ $errors->has('fareperiod') ? 'has-error' : '' }}">
											<label for="fareperiod">Period</label>
											<input type="text" name="fareperiod" id="fareperiod" class="form-control" value="{{ !empty($service->fare) ? $service->fare->period : '' }}">
											@if($errors->has('fareperiod'))
												<div class="help-block">
													<span>
														<strong>
															{{ $errors->first('fareperiod') }}
														</strong>
													</span>
												</div>
											@endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group {{ $errors->has('fareamount') ? 'has-error' : '' }}">
											<label for="fareamount">Amount</label>
											<input type="text" name="fareamount" id="fareamount" class="form-control" value="{{ !empty($service->fare) ? $service->fare->fee : '' }}">
											@if($errors->has('fareamount'))
												<div class="help-block">
													<span>
														<strong>
															{{ $errors->first('fareamount') }}
														</strong>
													</span>
												</div>
											@endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group {{ $errors->has('faremessage') ? 'has-error' : '' }}">
											<label for="faremessage">Message</label>
											<input type="text" name="faremessage" id="faremessage" class="form-control" value="{{ !empty($service->fare) ? $service->fare->message : '' }}">
											@if($errors->has('faremessage'))
												<div class="help-block">
													<span>
														<strong>
															{{ $errors->first('faremessage') }}
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
											<label for="fareshow">Show Fare</label>
											<select name="fareshow" id="fareshow" class="form-control">
												<option value="0" {{ !empty($service->fare) && $service->fare->show_price == 0 ? 'selected' : '' }}>No</option>
												<option value="1" {{ !empty($service->fare) && $service->fare->show_price == 1 ? 'selected' : '' }}>Yes</option>
											</select>
										</div>
									</div>
								</div>
							@endslot
						@endcomponent
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						@component('admin.widgets.panel')
							@slot('panelTitle1', 'Highlight')
							@slot('panelBody')
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label for="highlight">Show as Highlight</label>
											<select name="highlight" id="highlight" class="form-control">
												<option value="0" {{ !empty($service->fare) && $service->highlight == 0 ? 'selected' : '' }}>No</option>
												<option value="1" {{ !empty($service->fare) && $service->highlight == 1 ? 'selected' : '' }}>Yes</option>
											</select>
										</div>
									</div>
								</div>
							@endslot
						@endcomponent
					</div>
				</div>
			</div>
		</div>
	</form>
@endsection

@section('script')
	@include('admin.companyservice.script._edit')
@endsection