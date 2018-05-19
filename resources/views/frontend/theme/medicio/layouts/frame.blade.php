@extends('frontend.theme.medicio.layouts.master')

@section('body')
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
      <div class="top-area">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-6">
              <p class="bold text-left">{{ Auth::check() ? 'Hi, ' . ucfirst(Auth::user()->name) : $setting->tagline }}</p>
            </div>
            <div class="col-sm-6 col-md-6">
              <p class="bold text-right">
                @if(!Auth::check())
                  <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#loginmodal">Log in</a>
                  <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#registermodal">Sign Up</a>
                @endif
                @if(Auth::check())
                  @if(Auth::user()->hasRole('superadministrator'))
                    {{-- <div class="pull-right"> --}}
                      <a href="{{ route('manage.index') }}" class="btn btn-sm btn-primary">Dashboard</a>  
                    {{-- </div> --}}
                  @elseif(Auth::user()->hasRole('customer'))
                    {{-- <div class="pull-right"> --}}
                      <a href="{{ route('dashboard.index', ['user' => Auth::user()->name, 'id' => Auth::user()->id]) }}" class="btn btn-sm btn-primary">Dashboard</a>  
                    {{-- </div> --}}
                  @else
                  <form action="{{ route('logout') }}" method="post">
                    {{ csrf_field() }}
                    {{-- <div class="pull-right"> --}}
                      <button type="submit" class="btn btn-sm btn-primary">Log out</button>
                    {{-- </div> --}}
                  </form>
                  @endif
                @endif
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="container navigation">

        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
          <a class="navbar-brand" href="{{ route('mainpage.index') }}">
                    <img src="{{ !empty($setting->logoImage()) ? asset($setting->logoImage()->location) : asset('images/astrologo.png') }}" title="{{ !empty($setting->logoImage()) ? $setting->logoImage()->name : 'Astro Logo' }}" width="150" height="40" />
                </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#intro">Home</a></li>
            <li><a href="#procedure">Procedure</a></li>
            <li><a href="#callaction">Service</a></li>
            {{-- <li><a href="#tour">Tour</a></li> --}}
            <li><a href="#pricing">Pricing</a></li>
            <li><a href="#partner">Partner</a></li>
            <li><a href="#about">About Us</a></li>
            {{-- <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="badge custom-badge red pull-right">Extra</span>More <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="index.html">Home CTA</a></li>
                <li><a href="index-form.html">Home Form</a></li>
                <li><a href="index-video.html">Home video</a></li>
              </ul>
            </li> --}}
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>

    @yield('section')

    <footer>
      <div class="container" id="about">
        <div class="row">
          <div class="col-sm-6 col-md-4">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="widget">
                <h5>About</h5>
                <p>
                  Lorem ipsum dolor sit amet, ne nam purto nihil impetus, an facilisi accommodare sea
                </p>
              </div>
            </div>
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="widget">
                <h5>Information</h5>
                <ul>
                  <li><a href="#">Daftar menjadi Local Guide/Provider</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                  <li><a href="#">Terms & conditions</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="widget">
                <h5>{{ $setting->name }} Contact</h5>
                <p>
                  Untuk info lebih lanjut, Hubungi akun representative kami.
                </p>
                <ul>
                  <li>
                    <span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-calendar-o fa-stack-1x fa-inverse"></i>
								</span> Setiap Hari, 24 jam!
                  </li>
                  <li>
                    <span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-phone fa-stack-1x fa-inverse"></i>
								</span> <a href="tel:{{ $setting->phone }}">{{ $setting->phone }}</a>
                  </li>
                  <li>
                    <span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i>
								</span>  <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="widget">
                <h5>Our location</h5>
                <p>{{ strip_tags($setting->address) }}</p>

              </div>
            </div>
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="widget">
                <h5>Follow us</h5>
                <ul class="company-social">
                  @foreach($setting->contacts as $contact)
                    @if(!empty($contact->value))
                      <li class=" social-{{ $contact->slug }}"><a href="{{ $contact->domain . $contact->value }}" target="_blank" title="{{ $contact->name }}"><i class="fa {{ $contact->icon }}"></i></a></li>
                    @endif
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="sub-footer">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
              <div class="wow fadeInLeft" data-wow-delay="0.1s">
                <div class="text-left">
                  <p>&copy;Copyright&nbsp; {{ date("Y") }} - {{ ucfirst($setting->name) }}. All rights reserved.</p>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
              <div class="wow fadeInRight" data-wow-delay="0.1s">
                <div class="text-right">
                  <div class="credits">
                    Powered by 
                    <a href="https://www.astrowebstudio.com" target="_blank">Astroweb Studio</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>

    {{-- INCLUDE MODALS --}}
    @yield('modals')
@endsection