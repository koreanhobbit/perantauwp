{{ csrf_field() }}
<div class="row">
  <div class="col-lg-6">
    <div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
      <h2 class="h-ultra" style="color:white;">{{ $setting->name }}</h2>
    </div>
    <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
      <h4 class="h-light color">{{ $setting->tagline }}</h4>
    </div>
    <div class="well well-trans left-box">
      <div class="wow fadeInRight" data-wow-delay="0.1s">

        <ul class="lead-list">
          <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Service yang profesional</strong><br />Kami 24 jam melayani anda</span></li>
          <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Staff berpengalaman</strong><br />Guide dan pendamping fasih berbahasa lokal</span></li>
          <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Menyediakan segala kebutuhan</strong><br />Mulai dari simcard hingga rental mobil</span></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="form-wrapper">
      <div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">

        <div class="panel panel-skin" style="opacity:0.9;">
          <div class="panel-heading">
            <h3 class="panel-title"><span class="fa fa-pencil-square-o"></span>Plan your visit</h3>
          </div>
          <div class="panel-body">
            <div id="sendmessage">Pesan anda telah terkirim kami akan menghubungi anda segera. Terimakasih!</div>
            <div id="errormessage"></div>

            <form action="" method="post" role="form" class="bookingForm lead">
              {{-- <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group {{ $errors->has('intro-name') ? 'has-error' : '' }}">
                    <label>Nama</label>
                    <input type="text" name="intro-name" id="intro-name" class="form-control input-md" required>
                    @if($errors->has('intro-name'))
                      <div class="help-block">
                        <span>
                          <strong>
                            {{ $errors->first('intro-name') }}
                          </strong>
                        </span>
                      </div>
                    @endif
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group {{ $errors->has('intro-email') ? 'has-error' : '' }}">
                    <label>Email</label>
                    <input type="email" name="intro-email" id="intro-email" class="form-control input-md" required>
                    @if($errors->has('intro-email'))
                      <div class="help-block">
                        <span>
                          <strong>
                            {{ $errors->first('intro-email') }}
                          </strong>
                        </span>
                      </div>
                    @endif
                  </div>
                </div>
              </div> --}}

              {{-- <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group {{ $errors->has('intro-phone') ? 'has-error' : '' }}">
                    <label>Nomor Telepon</label>
                    <input type="tel" name="intro-phone" id="intro-phone" class="form-control input-md" required>
                    @if($errors->has('intro-phone'))
                      <div class="help-block">
                        <span>
                          <strong>
                            {{ $errors->first('intro-phone') }}
                          </strong>
                        </span>
                      </div>
                    @endif
                  </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group {{ $errors->has('intro-whatsapp') ? 'has-error' : '' }}">
                    <label>Nomor Whatsapp</label>
                    <input type="tel" name="intro-whatsapp" id="intro-whatsapp" class="form-control input-md" required>
                    @if($errors->has('intro-whatsapp'))
                      <div class="help-block">
                        <span>
                          <strong>
                            {{ $errors->first('intro-whatsapp') }}
                          </strong>
                        </span>
                      </div>
                    @endif
                  </div>
                </div>
              </div> --}}

              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group {{ $errors->has('intro-origin-country') ? 'has-error' : '' }}">
                    <label>Origin Country</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-globe"></i>
                      </div>
                      <select name="intro-origin-country" id="intro-origin-country" class="form-control" disabled="">
                        @foreach($oriCountries as $country)
                          <option value="{{ $country->id }}">{{ ucfirst($country->name) }}</option>
                        @endforeach
                      </select>
                    </div>
                    @if($errors->has('intro-origin-country'))
                      <div class="help-block">
                        <span>
                          <strong>
                            {{ $errors->first('intro-origin-country') }}
                          </strong>
                        </span>
                      </div>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 col-md-6">
                  <div class="form-group {{ $errors->has('intro-country') ? 'has-error' : '' }}">
                    <label>Destination Country</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-globe"></i>
                        </div>
                        <select name="intro-country" id="intro-country" class="form-control" data-url="{{route('mainpage.index') }}">
                          <option value="">Choose Country</option>
                          @foreach($countries as $country)
                            <option value="{{ $country->id }}">{{ ucfirst($country->name) }}</option>
                          @endforeach
                        </select>
                      </div>
                    @if($errors->has('intro-country'))
                      <div class="help-block">
                        <span>
                          <strong>
                            {{ $errors->first('intro-country') }}
                          </strong>
                        </span>
                      </div>
                    @endif
                  </div>
                </div>

                <div class="col-sm-6 col-md-6">
                  <div class="form-group {{ $errors->has('intro-area') ? 'has-error' : '' }}">
                    <label>Area</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-map-marker"></i>
                      </div>
                      <select name="intro-area" id="intro-area" class="form-control" disabled>
                        <option value="">Choose Area</option>
                      </select>
                    </div>
                    @if($errors->has('intro-area'))
                      <div class="help-block">
                        <span>
                          <strong>
                            {{ $errors->first('intro-area') }}
                          </strong>
                        </span>
                      </div>
                    @endif
                  </div>
                </div>
              </div>


               <div class="row">
                <div class="col-sm-6 col-md-6">
                  <div class="form-group {{ $errors->has('arrivaldate') ? 'has-error' : '' }}">
                    <label>Arrival Date</label>
                    <div class="input-group">
                      <input type="text" name="arrivaldate" id="arrivaldate" class="form-control input-md" required>
                      <div class="input-group-addon">
                        <span><i class="fa fa-calendar"></i></span>
                      </div>
                    </div>
                    @if($errors->has('arrivaldate'))
                      <div class="help-block">
                        <span>
                          <strong>
                            {{ $errors->first('arrivaldate') }}
                          </strong>
                        </span>
                      </div>
                    @endif
                  </div>
                </div>
                <div class="col-sm-6 col-md-6">
                  <div class="form-group {{ $errors->has('returndate') ? 'has-error' : '' }}">
                    <label>Return Date</label>
                    <div class="input-group">
                      <input type="text" name="returndate" id="returndate" class="form-control input-md" required>
                      <div class="input-group-addon">
                        <span><i class="fa fa-calendar"></i></span>
                      </div>
                    </div>
                    @if($errors->has('returndate'))
                      <div class="help-block">
                        <span>
                          <strong>
                            {{ $errors->first('returndate') }}
                          </strong>
                        </span>
                      </div>
                    @endif
                  </div>
                </div>
              </div>

              <input type="submit" value="Submit" class="btn btn-skin btn-block btn-lg" id="intro-submit">

              <p class="lead-footer">* We will contact you through email & whatsapp</p>

            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>