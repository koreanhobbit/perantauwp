@extends('admin.layouts.navs')

@section('page_heading', 'Edit User')

@section('section')
	<form action="{{ route('user.update', ['user' => $user->id]) }}" method="post">
		{{ csrf_field() }}
		{{ method_field('put') }}
		<div class="col-sm-12">
			<div class="row">
				<div class="col-sm-9">
					@component('admin.widgets.panel')
						@slot('panelTitle1', 'Fill the form')
						@slot('panelBody')
							<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
								<label for="name">
									Name
								</label>
								<input type="text" id="name" name="name" class="form-control" placeholder="Input user name" value="{{ $user->name }}" required>
								@if($errors->has('name'))
									<span class="help-block">
										<strong>
											{{ $errors->first('name') }}
										</strong>
									</span>
								@endif
							</div>

							<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
								<label for="email">
									Email
								</label>
								<input type="email" id="email" name="email" class="form-control" placeholder="Input user email" value="{{ $user->email }}" required>
								@if($errors->has('email'))
									<span class="help-block">
										<strong>
											{{ $errors->first('email') }}
										</strong>
									</span>
								@endif
							</div>

							<div class="form-group {{ $errors->has('current_password') ? 'has-error' : '' }}">
								<label for="current_password">
									Current Password
								</label>
								<input type="password" id="current_password" name="current_password" class="form-control" placeholder="Input user current password" required>
								@if($errors->has('current_password'))
									<span class="help-block">
										<strong>
											{{ $errors->first('current_password') }}
										</strong>
									</span>
								@endif
							</div>

							<div class="change-password">
					        	<label>
					        		<input type="checkbox"> Change Password
					        	</label>
					        	<input type="hidden" value="false" class="inputchangepassword" name="inputchangepassword">
					        </div>
							
							<fieldset class="new-password hidden">
								<legend>New Password</legend>
								<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
									<label for="password">
										Password
									</label>
									<input type="password" id="password" name="password" class="form-control" placeholder="Input user new password">
									@if($errors->has('password'))
										<span class="help-block">
											<strong>
												{{ $errors->first('password') }}
											</strong>
										</span>
									@endif
								</div>

								<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
									<label for="password_confirmation">
										Password Confirmation
									</label>
									<input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm user password">
									@if($errors->has('password_confirmation'))
										<span class="help-block">
											<strong>
												{{ $errors->first('password_confirmation') }}
											</strong>
										</span>
									@endif
								</div>
							</fieldset>
						@endslot
					@endcomponent
				</div>
				<div class="col-sm-3">
					<div class="row">
						@component('admin.widgets.panel')
							@slot('panelTitle1', 'Role')
							@slot('panelBody')
								<div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
									<select class="form-control select-role">
										<option value="" selected="selected">Choose Role</option>
										@foreach($roles as $role)
											<option value="{{ $role->id }}">
												{{ $role->display_name }}
											</option>
										@endforeach
									</select>
									<input type="hidden" name="role" id="role" @foreach($user->roles as $role) value="{{ $role->id }}" @endforeach>
									@if($errors->has('role'))
										<span class="help-block">
											<strong>
												{{ $errors->first('role') }}
											</strong>
										</span>
									@endif
								</div>
							@endslot
						@endcomponent
					</div>
					<div class="row">
						@component('admin.widgets.panel')
							@slot('panelTitle1' , 'Submit')
							@slot('panelBody')
								<button class="btn btn-sm btn-primary form-control" type="submit">
									Edit User
								</button>
							@endslot
						@endcomponent
						<div class="text-center">
							<a href="{{ route('user.index') }}">
								<span>
									<i class="fa fa-arrow-left">
									</i>
								</span>
								&nbsp;Cancel &amp; Back to Users List
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
@endsection

@section('script')
	@include('admin.usermanagement.user.script._script_edit')
@endsection