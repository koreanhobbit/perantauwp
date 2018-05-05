<div class="row">
  @foreach($pricings as $key => $pricing)
    <div class="col-sm-4 pricing-box"  {{ $key == 1 ? 'featured-price' : '' }}>
      <div class="wow bounceInUp" data-wow-delay="{{ $key == 0 ? '0.1s' : '' }} {{ $key == 1 ? '0.2s' : '' }} {{ $key == 2 ? '0.3s' : '' }}">
        <div class="pricing-content {{ $key == 0 || $key == 2 ? 'general' : ''}} {{ $key==1 ? 'featured' : '' }}">
          <h2>Paket {{ $pricing->name }}</h2>
          @if($pricing->fare->show_price == 0)
            <h3>{{ $pricing->fare->message }}</h3>
          @else
            <h3>{{ !empty($pricing->fare->currency) ? $pricing->fare->currency : $currencies->find($setting->currency_id)->symbol }}{{ !empty($pricing->fare->fee) ? number_format($pricing->fare->fee, 0 ,',', '.') : 'Not Available' }}<span>{{ !empty($pricing->fare->period) ? ' / ' . $pricing->fare->period : '' }}</span></h3>
          @endif
          <ul>
            @if($key == 1)
              @foreach($pricing->points->where('show', '=', 1)->take(5) as $point)
                <li>{{ $point->description }} <i class="fa fa-check icon-success"></i></li>
              @endforeach
            @else
              @foreach($pricing->points->where('show', '=', 1)->take(4) as $point)
                <li>{{ $point->description }} <i class="fa fa-check icon-success"></i></li>
              @endforeach
            @endif
          </ul>

          <div class="price-bottom">
            <a href="#" class="btn btn-skin btn-lg">Contact Us</a>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>