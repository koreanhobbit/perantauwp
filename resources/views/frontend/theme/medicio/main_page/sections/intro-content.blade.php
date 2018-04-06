{{ csrf_field() }}
<div class="row">
  <div class="col-lg-6">
    <div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
      <h2 class="h-ultra">{{ $setting->name }}</h2>
    </div>
    <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
      <h4 class="h-light color">{{ $setting->tagline }}</span> for you</h4>
    </div>
    <div class="well well-trans">
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

        <div class="panel panel-skin">
          <div class="panel-heading">
            <h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> Rencanakan kunjungan anda </h3>
          </div>
          <div class="panel-body">
            <div id="sendmessage">Pesan anda telah terkirim kami akan menghubungi anda segera. Terimakasih!</div>
            <div id="errormessage"></div>

            <form action="" method="post" role="form" class="bookingForm lead">
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label>Nama</label>
                    <input type="text" name="name" id="name" class="form-control input-md" required>
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
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label>Email</label>
                    <input type="email" name="email" id="email" class="form-control input-md" required>
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
                </div>
              </div>

              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                    <label>Nomor Telepon</label>
                    <input type="tel" name="phone" id="phone" class="form-control input-md" required>
                    @if($errors->has('email'))
                      <div class="help-block">
                        <span>
                          <strong>
                            {{ $errors->first('phone') }}
                          </strong>
                        </span>
                      </div>
                    @endif
                  </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group {{ $errors->has('whatsapp') ? 'has-error' : '' }}">
                    <label>Nomor Whatsapp</label>
                    <input type="tel" name="whatsapp" id="whatsapp" class="form-control input-md" required>
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
                </div>
              </div>

              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                    <label>Negara</label>
                    <select name="country" id="country" class="form-control" data-url="{{route('mainpage.index') }}">
                      <option value="">Pilih Negara</option>
                      @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ ucfirst($country->name) }}</option>
                      @endforeach
                    </select>
                    @if($errors->has('email'))
                      <div class="help-block">
                        <span>
                          <strong>
                            {{ $errors->first('phone') }}
                          </strong>
                        </span>
                      </div>
                    @endif
                  </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group {{ $errors->has('whatsapp') ? 'has-error' : '' }}">
                    <label>Daerah</label>
                    <select name="area" id="area" class="form-control" disabled>
                      <option value="">Pilih Daerah</option>
                    </select>
                    @if($errors->has('area'))
                      <div class="help-block">
                        <span>
                          <strong>
                            {{ $errors->first('area') }}
                          </strong>
                        </span>
                      </div>
                    @endif
                  </div>
                </div>
              </div>

               <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group {{ $errors->has('arrivaldate') ? 'has-error' : '' }}">
                    <label>Tanggal Datang</label>
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
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group {{ $errors->has('returndate') ? 'has-error' : '' }}">
                    <label>Tanggal Kembali</label>
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

              <input type="submit" value="Submit" class="btn btn-skin btn-block btn-lg">

              <p class="lead-footer">* We'll contact you by phone & email later</p>

            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>