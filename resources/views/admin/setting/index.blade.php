@extends('admin.layouts.navs')

@section('page_heading', 'General Settings')

@section('section')
<form action="{{ route('setting.update', ['setting' => $setting->id]) }}" method="post">
	{{ csrf_field() }}
	{{ method_field('put') }}
	<div class="col-sm-12">
		<div class="row m-b-20">
			<div class="col-sm-12">
				<div class="pull-right">
					<button type="submit" class="btn btn-primary btn-sm">
				 		<i class="fa fa-save"></i>
				 		&nbsp;Save New Setting Profile
				 	</button>
				 </div>
			</div>
		</div>	
		<div class="row">
			<div class="col-sm-12">
				<ul class="nav nav-tabs">
					<li class="{{ count($errors->all()) < 1 ? 'active' : '' }} {{ $errors->has('name') || $errors->has('tagline') || $errors->has('about') || $errors->has('privacypolicy') ? 'active' : '' }}">
						<a href="#generalsetting" data-toggle="tab">General Setting</a>
					</li>
					<li class="{{ $errors->has('phone') || $errors->has('email') || $errors->has('address') ? 'active' : '' }}">
						<a href="#contactsetting" data-toggle="tab">Contact Setting</a>
					</li>
					<li><a href="#themesetting" data-toggle="tab">Theme Setting</a></li>
				</ul>
				<div class="tab-content">
					{{-- Content for general setting --}}
					<div class="tab-pane fade {{ count($errors->all()) < 1 ? 'active in' : '' }} {{ $errors->has('name') || $errors->has('tagline') || $errors->has('about') || $errors->has('privacypolicy') ? 'active in' : '' }}" id="generalsetting">
						<div class="row">
							<div class="col-sm-8">
								@component('admin.widgets.panel')
									@slot('panelTitle1', 'General Setting')
									@slot('panelBody')
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
													<label for="name">Name of The Company</label>
													<input type="text" class="form-control" name="name" id="name" value="{{ $setting->name }}" required>
													@if($errors->has('name'))
														<div class="help-block">
															<span>
																<strong>{{ $errors->first('name') }}</strong>
															</span>
														</div>
													@endif 
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group {{ $errors->has('tagline') ? 'has-error' : '' }}">
													<label for="tagline">Tagline</label>
													<input type="text" class="form-control" name="tagline" id="tagline" value="{{ $setting->tagline }}" required>
													@if($errors->has('tagline'))
														<div class="help-block">
															<span>
																<strong>{{ $errors->first('tagline') }}</strong>
															</span>
														</div>
													@endif 
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group">
													<label for="currency">Currency</label>
													<select class="form-control" name="currency" id="currency">
														@foreach($currencies as $currency)
											        		<option value="{{ $currency->id }}" {{ $setting->currency_id == $currency->id ? 'selected' : ''}}>{{ ucfirst($currency->name) }}</option>
											        	@endforeach
												    </select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group {{ $errors->has('about') ? 'has-error' : '' }}">
													<label for="about">About The Company</label>
													<textarea name="about" id="about" class="form-control" rows="10">{{ $setting->about }}</textarea>
													@if($errors->has('about'))
														<div class="help-block">
															<span>
																<strong>{{ $errors->first('about') }}</strong>
															</span>
														</div>
													@endif
												</div> 
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group {{ $errors->has('privacypolicy') ? 'has-error' : '' }}">
													<label for="privacypolicy">Privacy Policy</label>
													<textarea name="privacypolicy" id="privacypolicy" class="form-control" rows="10">{{ $setting->privacy_policy }}</textarea>
													@if($errors->has('privacypolicy'))
														<div class="help-block">
															<span>
																<strong>{{ $errors->first('privacypolicy') }}</strong>
															</span>
														</div>
													@endif 
												</div>
											</div>
										</div>
										
									@endslot
								@endcomponent
							</div>
							<div class="col-sm-4">
								@component('admin.widgets.panel')
									@slot('panelTitle1', 'Logo')
									@slot('panelBody')
										<div class="row">
											<div class="col-sm-12">
												<div class="thumbnail">
													<a href="javascript:" data-toggle="modal" data-target="#logoModal" class="changeLogoBtn">
														<img src="{{ $logoMark ? asset($thumbnailLogo->location) : asset('images/astrologothumbnail.png') }}" title="{{ $logoMark ? asset($logo->name) : asset('images/astrologothumbnail.png') }}" class="img-responsive">
														<input type="hidden" name="logo" id="logo" value="{{ $logoMark ? $logo->id : '' }}">
													</a>
												</div>
											</div>
										</div>
									@endslot
								@endcomponent
							</div>
							<div class="col-sm-4">
								@component('admin.widgets.panel')
									@slot('panelTitle1', 'Icon')
									@slot('panelBody')
										<div class="row">
											<div class="col-sm-12">
												<div class="thumbnail">
													<a href="javascript:" data-toggle="modal" data-target="#iconModal" class="changeIconBtn">
														<img src="{{ $iconMark ? asset($thumbnailIcon->location) : asset('images/astrologothumbnail.png') }}" title="{{ $iconMark ? asset($icon->name) : asset('images/astrologothumbnail.png') }}" class="img-responsive">
														<input type="hidden" name="icon" id="icon" value="{{ $iconMark ? $icon->id : '' }}">
													</a>
												</div>
											</div>
										</div>
									@endslot
								@endcomponent
							</div>							
						</div>
					</div>
					<div class="tab-pane fade {{ $errors->has('phone') || $errors->has('email') || $errors->has('address') ? 'active in' : '' }}" id="contactsetting">
						<div class="row">
							<div class="col-sm-12">
								@component('admin.widgets.panel')
									@slot('panelTitle1', 'Website Contact & Social Media')
									@slot('panelBody')
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
													<label for="phone">Phone Number</label>
													<input type="text" class="form-control" id="phone" name="phone" value="{{ $setting->phone }}" required>
													@if($errors->has('phone'))
														<div class="help-block">
															<span>
																<strong>{{ $errors->first('phone') }}</strong>
															</span>
														</div>
													@endif 
												</div>
												<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
													<label for="email">Email Address</label>
													<input type="email" class="form-control" id="email" name="email" value="{{ $setting->email }}" required>
													@if($errors->has('email'))
														<div class="help-block">
															<span>
																<strong>{{ $errors->first('email') }}</strong>
															</span>
														</div>
													@endif 
												</div>
												@foreach($setting->contacts as $contact)
													<div class="form-group">
														<label for="{{ $contact->slug }}">{{ $contact->name }}</label>
														<input type="text" class="form-control" name="{{ $contact->slug }}" id="{{ $contact->slug }}" value="{{ $contact->value }}">
														<small><span><i class="fa fa-info-circle"></i></span>&nbsp;Put just the name of the account or user</small>
													</div>
												@endforeach
											</div>
										</div>
									@endslot
								@endcomponent
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								@component('admin.widgets.panel')
									@slot('panelTitle1', 'Address')
									@slot('panelBody')
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
													<textarea name="address" id="address" class="form-control">{{ $setting->address }}</textarea>
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
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="themesetting">
						<div class="row">
							<div class="col-sm-8">
								@component('admin.widgets.panel')
									@slot('panelTitle1', 'Background & Color')
									@slot('panelBody')
										<div class="form-group">
											<label for="name">Theme Name</label>
											<input type="text" value="Medicio" class="form-control" name="themesetting" id="themesetting" disabled>
										</div>
										<div class="form-group">
											<label for="background">Background</label>
											<select name="background" id="background" class="form-control">
												@if(count($setting->themesetting->first()->backgrounds))
													@foreach($setting->themesetting->first()->backgrounds as $background)
														<option value="{{ $background->id }}" {{ !empty($setting->background_id) && $setting->background_id == $background->id ? 'selected' : '' }}>{{ $background->name }}</option>
													@endforeach
												@endif
											</select>
										</div>
										<div class="form-group">
											<label for="color">Background Color</label>
											<select name="color" id="color" class="form-control">
												@if(count($setting->themesetting->first()->colors))
													@foreach($setting->themesetting->first()->colors as $color)
														<option value="{{ $color->id }}" {{ !empty($setting->color_id) && $setting->color_id == $color->id ? 'selected' : '' }}>{{ $color->name }}</option>
													@endforeach
												@endif
											</select>
										</div>
									@endslot
								@endcomponent
							</div>
							<div class="col-sm-4">
								<div class="row">
									<div class="col-sm-12">
										@component('admin.widgets.panel')
											@slot('panelTitle1', 'Main Background Image')
											@slot('panelBody')
												<div class="row">
													<div class="col-sm-12">
														<div class="thumbnail">
															<a href="javascript:" data-toggle="modal" data-target="#bgImage1Modal" class="bgImage1Btn">
																<img src="{{ $bgImage1Mark ? asset($thumbnailBgImage1->location) : asset('frontend/medicio/img/bg/bg1.jpg') }}" title="{{ $bgImage1Mark ? asset($bgImage1->name) : asset('images/astrologothumbnail.png') }}" class="img-responsive">
																<input type="hidden" name="bgImage1" id="bgImage1" value="{{ $bgImage1Mark ? $bgImage1->id : '' }}">
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
											@slot('panelTitle1', 'Second Background Image')
											@slot('panelBody')
												<div class="row">
													<div class="col-sm-12">
														<div class="thumbnail">
															<a href="javascript:" data-toggle="modal" data-target="#bgImage2Modal" class="bgImage2Btn">
																<img src="{{ $bgImage2Mark ? asset($thumbnailBgImage2->location) : asset('frontend/medicio/img/bg/bg2.jpg') }}" title="{{ $bgImage2Mark ? asset($bgImage2->name) : asset('images/astrologothumbnail.png') }}" class="img-responsive">
																<input type="hidden" name="bgImage2" id="bgImage2" value="{{ $bgImage2Mark ? $bgImage2->id : '' }}">
															</a>
														</div>
													</div>
												</div>
											@endslot
										@endcomponent
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>
</form>

{{-- modal for logo --}}
<div class="modal fade-in full-modal" id="logoModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Add Logo</h4>
      </div>
      <div class="modal-body">
			@component('admin.widgets.panel')
			@slot('class', 'default')
			@slot('panelTitle1', 'Choose Logo')
			@slot('panelBody')
				<ul class="nav nav-tabs" style="margin-bottom: 20px;">
					<li class="active" id="logoList"><a href="#logoTab" data-toggle="tab">Logo Image</a></li>
					<li class="" id="uploadLogoList"><a href="#uploadLogoTab" data-toggle="tab">Upload Logo</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade active in" id="logoTab">
						@include('admin.setting.partials._logo')
					</div>
					<div class="tab-pane fade" id="uploadLogoTab">
						@component('admin.widgets.panel')
							@slot('panelBody')
								<form action="{{ route('image.store') }}" class="dropzone" id="addNewLogoDz" data-url="{{ route('setting.index', ['setting' => 1]) }}">
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

{{-- modal for icon --}}
<div class="modal fade-in full-modal" id="iconModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Add Icon</h4>
      </div>
      <div class="modal-body">
			@component('admin.widgets.panel')
			@slot('class', 'default')
			@slot('panelTitle1', 'Choose Icon')
			@slot('panelBody')
				<ul class="nav nav-tabs" style="margin-bottom: 20px;">
					<li class="active" id="iconList"><a href="#iconTab" data-toggle="tab">Icon Image</a></li>
					<li class="" id="uploadIconList"><a href="#uploadIconTab" data-toggle="tab">Upload Icon</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade active in" id="iconTab">
						@include('admin.setting.partials._icon')
					</div>
					<div class="tab-pane fade" id="uploadIconTab">
						@component('admin.widgets.panel')
							@slot('panelBody')
								<form action="{{ route('image.store') }}" class="dropzone" id="addNewIconDz" data-url="{{ route('setting.index', ['setting' => 1]) }}">
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
{{-- modal for background image 1 --}}
<div class="modal fade-in full-modal" id="bgImage1Modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Add Background Image</h4>
      </div>
      <div class="modal-body">
			@component('admin.widgets.panel')
			@slot('class', 'default')
			@slot('panelTitle1', 'Choose Image')
			@slot('panelBody')
				<ul class="nav nav-tabs" style="margin-bottom: 20px;">
					<li class="active" id="bgImage1List"><a href="#bgImage1Tab" data-toggle="tab">Background Image</a></li>
					<li class="" id="uploadBgImage1List"><a href="#uploadBgImage1Tab" data-toggle="tab">Upload Image</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade active in" id="bgImage1Tab">
						@include('admin.setting.partials._bgImage1')
					</div>
					<div class="tab-pane fade" id="uploadBgImage1Tab">
						@component('admin.widgets.panel')
							@slot('panelBody')
								<form action="{{ route('image.store') }}" class="dropzone" id="addNewBgImage1Dz" data-url="{{ route('setting.index', ['setting' => 1]) }}">
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

{{-- modal for background image 2 --}}
<div class="modal fade-in full-modal" id="bgImage2Modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Add Background Image</h4>
      </div>
      <div class="modal-body">
			@component('admin.widgets.panel')
			@slot('class', 'default')
			@slot('panelTitle1', 'Choose Image')
			@slot('panelBody')
				<ul class="nav nav-tabs" style="margin-bottom: 20px;">
					<li class="active" id="bgImage2List"><a href="#bgImage2Tab" data-toggle="tab">Background Image</a></li>
					<li class="" id="uploadBgImage2List"><a href="#uploadBgImage2Tab" data-toggle="tab">Upload Image</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade active in" id="bgImage2Tab">
						@include('admin.setting.partials._bgImage2')
					</div>
					<div class="tab-pane fade" id="uploadBgImage2Tab">
						@component('admin.widgets.panel')
							@slot('panelBody')
								<form action="{{ route('image.store') }}" class="dropzone" id="addNewBgImage2Dz" data-url="{{ route('setting.index', ['setting' => 1]) }}">
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

@section('script')
	@include('admin.setting.script._index')
@endsection