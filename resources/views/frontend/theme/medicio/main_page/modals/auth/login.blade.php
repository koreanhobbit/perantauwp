<div class="modal" id="loginmodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Login</h4>
      </div>
      <div class="modal-body">
        <form action="{{ route('login.attempt') }}" method="post">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
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
              <div class="form-group">
                <label for="checkbox">
                  <input type="checkbox" name="remember" value="{{ old('remember') ? 'checked' : '' }}">
                  Remember me
                </label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                  <button type="submit" class="btn btn-primary form-control">Log in</button>
              </div>
            </div>
          </div>
        </form>
        <div class="row">
          <div class="col-sm-12">
              <div class="text-center">
                  <a href="{{ route('password.request') }}">Forgot password?</a>
                </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-12">
            <div class="text-center">
              <p>Dont have an account?</p>
            </div>
            <div class="form-group">
              <a class="btn btn-warning form-control" data-dismiss="modal" data-toggle="modal" data-target="#registermodal">Register</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>