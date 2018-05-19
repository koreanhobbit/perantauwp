@extends('frontend.theme.medicio.layouts.frame_other')

@section('otherpage_title', 'Reset Password')

@section('section')
	<section class="home-section paddingbot-60" id="other">
            <div class="container marginbot-60">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
						<form action="{{ route('password.request') }}" method="post">
				          {{ csrf_field() }}
				          <div class="row">
				            <div class="col-sm-12">
				            	<div class="text-center">
				            		<h1>Reset Password</h1>
				            	</div>
				            	<br>

					            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
					                <label for="email">Email Address</label>
					                <input type="email" name="email" id="email" class="form-control" value="{{ $email or old('email') }}" required autofocus>
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
								
								<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
					                <label for="password">Password</label>
					                <input type="password" name="password" id="password" class="form-control" required>
					                @if($errors->has('password'))
					                  <div class="help-block">
					                    <span>
					                      <strong>
					                        {{ $errors->first('password') }}
					                      </strong>
					                    </span>
					                  </div>
					                @endif
					            </div>

					            <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
					                <label for="password_confirmation">Password Confrimation</label>
					                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
					                @if($errors->has('password_confirmation'))
					                  <div class="help-block">
					                    <span>
					                      <strong>
					                        {{ $errors->first('password_confirmation') }}
					                      </strong>
					                    </span>
					                  </div>
					                @endif
					            </div>

				            </div>
				          </div>
				              
				          <div class="row m-t-30">
				            <div class="col-sm-12">
				              <div class="form-group text-center">
				                  <button type="submit" class="btn btn-primary">Reset Password</button>
				              </div>
				            </div>
				          </div>
				        </form>
                    </div>
                </div>
            </div>
    </section>
@endsection