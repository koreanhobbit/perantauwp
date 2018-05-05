<div class="row">
  <div class="col-sm-6">
    <div class="wow fadeInUp" data-wow-delay="0.2s">
      <img src="{{ asset('frontend/medicio/img/dummy/img-1.png') }}" class="img-responsive" alt="" />
    </div>
  </div>
  <div class="col-sm-6">
    <div class="row">
      @foreach($services as $service)
        <div class="col-sm-6 col-md-6">
          <div class="wow fadeInRight" data-wow-delay="0.1s">
            <div class="service-box">
              <div class="row">
                <div class="col-sm-3">
                  <div class="service-icon">
                    <span class="fa fa-{{ $service->icon }} fa-3x"></span>
                  </div>  
                </div>
                <div class="col-xs-9">
                  <div class="service-desc">
                    <h5 class="h-light">{{ $service->name }}</h5>
                    <p>{{ $service->short_desc }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>