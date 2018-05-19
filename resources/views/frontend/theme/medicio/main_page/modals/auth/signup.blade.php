<div class="modal" id="registermodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Register</h4>
      </div>
      <div class="modal-body">
        <form action="{{ route('register.attempt') }}" method="POST">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group {{ $errors->has('register-name') ? 'has-error' : '' }}">
                <label for="register-name">Name</label>
                <input type="text" name="register-name" id="register-name" class="form-control" value="{{ old('register-name') }}">
                @if($errors->has('register-name'))
                  <div class="help-block">
                    <span>
                      <strong>
                        {{ $errors->first('register-name') }}
                      </strong>
                    </span>
                  </div>
                @endif
              </div>
              <div class="form-group {{ $errors->has('register-email') ? 'has-error' : '' }}">
                <label for="register-email">Email Address</label>
                <input type="email" name="register-email" id="register-email" class="form-control" value="{{ old('register-email') }}">
                @if($errors->has('register-email'))
                  <div class="help-block">
                    <span>
                      <strong>
                        {{ $errors->first('register-email') }}
                      </strong>
                    </span>
                  </div>
                @endif
              </div>
              <div class="form-group {{ $errors->has('registerpassword') ? 'has-error' : '' }}">
                <label for="registerpassword">Password</label>
                <input type="password" name="registerpassword" id="registerpassword" class="form-control">
                @if($errors->has('registerpassword'))
                  <div class="help-block">
                    <span>
                      <strong>
                        {{ $errors->first('registerpassword') }}
                      </strong>
                    </span>
                  </div>
                @endif
              </div>
              <div class="form-group {{ $errors->has('registerpassword_confirmation') ? 'has-error' : '' }}">
                <label for="registerpassword_confirmation">Confirm Password</label>
                <input type="password" name="registerpassword_confirmation" id="registerpassword_confirmation" class="form-control">
                @if($errors->has('registerpassword_confirmation'))
                  <div class="help-block">
                    <span>
                      <strong>
                        {{ $errors->first('registerpassword_confirmation') }}
                      </strong>
                    </span>
                  </div>
                @endif
              </div>
              <div class="form-group {{ $errors->has('registerrole') ? 'has-error' : '' }}">
                <label for="registerrole">Role</label>
                <select name="registerrole" id="registerrole" class="form-control">
                  <option value="7" selected>Customer</option>
                  <option value="6">Guide</option>
                  <option value="5">Provider</option>
                </select>
                @if($errors->has('registerrole'))
                  <div class="help-block">
                    <span>
                      <strong>{{ $errors->first('registerrole') }}</strong>
                    </span>
                  </div>
                @endif
              </div>
              <div class="form-group {{ $errors->has('g-recaptcha-response') ? 'has-error' : '' }}">
                <div class="pull-left">
                  {!! NoCaptcha::renderJs() !!}
                  {!! NoCaptcha::display() !!}
                  @if ($errors->has('g-recaptcha-response'))
                    <div class="help-block">
                      <span>
                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                      </span>
                    </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
          <div class="row m-t-20">
            <div class="col-sm-12">
              <div class="form-group">
                <button type="submit" class="btn btn-primary form-control">Register</button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-12">
            <div class="text-center">
              <p>Already have an account?</p>
            </div>
            <div class="form-group">
              <a class="btn btn-warning form-control" data-dismiss="modal" data-toggle="modal" data-target="#loginmodal">Log in</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>