@extends('admin_customer.layouts.nav')

@section('style')
	{{-- datepicker --}}
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
	  {{-- dropzone css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/min/dropzone.min.css">
@endsection

@section('page_heading', 'Profile')

@section('section')
	<form action="{{ route('customer.profile.update', ['user' => $user->id, 'name' => $user->name]) }}" method="post">
		{{ csrf_field() }}
		{{ method_field('put') }}
		<div class="col-sm-12">
			<div class="row m-b-20">
				<div class="col-sm-12">
					<div class="pull-right">
						<button class="btn btn-sm btn-primary">
							Save Profile
						</button>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					@component('admin.widgets.panel')
						@slot('class', 'info')
						@slot('panelTitle', 'Profile Picture')
						@slot('panelBody')
							<div class="row">
								<div class="col-sm-12">
									<div class="thumbnail">
										<a href="javascript:" data-toggle="modal" data-target="#profileImageModal" class="profileImageBtn">
											<img src="{{ asset('images/noimg_thumbnail.png') }}" alt="" class="img-responsive form-control">
											<input type="hidden" value="" class="profileImageId">
										</a>	
									</div>
								</div>
							</div>
						@endslot
					@endcomponent
					@component('admin.widgets.panel')
						@slot('class', 'warning')
						@slot('panelTitle', 'Extra Information')
						@slot('panelBody')
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group {{ $errors->has('birthday') ? 'has-error' : '' }}">
										<label for="birthday">Birthday</label>
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</span>
											<input type="text" name="birthday" id="birthday" class="form-control" required>
										</div>
										@if($errors->has('birthday'))
											<div class="help-block">
												<span>
													<strong>
														{{ $errors->first('birthday') }}
													</strong>
												</span>
											</div>
										@endif
									</div>

									<div class="form-group {{ $errors->has('whatsapp') ? 'has-error' : '' }}">
										<label for="whatsapp">Phone/Whatsapp</label>
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-whatsapp"></i>
											</span>
											<input type="tel" name="whatsapp" id="whatsapp" class="form-control" required>
										</div>
										@if($errors->has('whatsapp'))
											<div class="help-block">
												<span>
													<strong>
														{{ $errors->first('whatsapp') }}
													</strong>
												</span>
											</div>
										@endif
									</div>
									@foreach($messengers as $messenger)
										<div class="form-group {{ $errors->has('messenger'.$messenger->slug) ? 'has-error' : '' }}">
											<label for="{{ $messenger->slug }}">{{ $messenger->name }}</label>
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-comments-o"></i>
												</span>
												<input type="text" name="{{ 'messenger[' . $messenger->slug . ']' }}" id="{{ 'messenger[' . $messenger->slug . ']' }}" class="form-control">
											</div>
											@if($errors->has('messenger.' . $messenger->slug))
												<div class="help-block">
													<span>
														<strong>
															{{ $errors->first('messenger.' . $messenger->slug) }}
														</strong>
													</span>
												</div>
											@endif
										</div>
									@endforeach
								</div>
							</div>
						@endslot
					@endcomponent
				</div>
				<div class="col-sm-8">
					@component('admin.widgets.panel')
						@slot('class', 'primary')
						@slot('panelTitle', 'General Information')
						@slot('panelBody')
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
										<label for="name">Name</label>
										<div class="input-group">
											<input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
											<span class="input-group-addon">
												<i class="fa fa-user"></i>
											</span>
										</div>
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
									<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
										<label for="name">Email</label>
										<div class="input-group">
											<input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
											<span class="input-group-addon" required>
												<i class="fa fa-envelope"></i>
											</span>
										</div>
										@if($errors->has('email'))
											<div class="help-block">
												<span>
													<strong>
														{{ $errors->first('email') }}
													</strong>
												</span>
											</div>
										@endif
									</div>
									<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
										<label for="address">Address</label>
										<div class="input-group">
											<textarea name="address" id="address" rows="4" class="form-control"></textarea>
											<span class="input-group-addon">
												<i class="fa fa-address-card-o"></i>
											</span>
										</div>
										@if($errors->has('address'))
											<div class="help-block">
												<span>
													<strong>
														{{ $errors->first('address') }}
													</strong>
												</span>
											</div>
										@endif
									</div>
								</div>
							</div>
						@endslot
					@endcomponent
					@component('admin.widgets.panel')
						@slot('class', 'success')
						@slot('panelTitle', 'Social Media')
						@slot('panelBody')
							<div class="row">
								<div class="col-sm-12">
									@foreach($socialmedias as $socialmedia)
										<div class="form-group {{ $errors->has('socialmedia.'.$socialmedia->slug) ? 'has-error' : '' }}">
											<label for="{{ $socialmedia->slug }}">{{ ucfirst($socialmedia->name) }}</label>
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa {{ $socialmedia->icon }}"></i>
												</span>
												<input type="text" name="{{ 'socialmedia[' . $socialmedia->slug . ']' }}" id="{{ 'socialmedia[' . $socialmedia->slug . ']' }}" class="form-control">
											</div>
											@if($errors->has($socialmedia->slug))
												<div class="help-block">
													<span>
														<strong>
															{{ $errors->first('socialmedia.'.$socialmedia->slug) }}
														</strong>
													</span>
												</div>
											@endif
										</div>
									@endforeach
								</div>
							</div>
						@endslot
					@endcomponent
				</div>
			</div>
		</div>
	</form>

{{-- modals area --}}

	{{-- modals for profile image --}}
	@include('admin_customer.profile.modal._profile_image')
@endsection

@section('script')
	<script src="{{ asset("js/vendor/dropzone.js") }}"></script>
	@include('admin_customer.profile.script._index')
@endsection
