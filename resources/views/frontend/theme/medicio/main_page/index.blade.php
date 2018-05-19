@extends('frontend.theme.medicio.layouts.frame')

@section('style')

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">

  @if(!empty($setting->themesetting->bgImage1()))
    <style>
      .intro-content{
        background: url({{ asset($setting->themesetting->bgImage1()->location) }}) no-repeat center center fixed;
        background-size:cover;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
      }
    </style>
  @endif

  @if(!empty($setting->themesetting->bgImage2()))
    <style>
      #testimonial{
        background: url({{ asset($setting->themesetting->bgImage2()->location) }}) no-repeat center center fixed;
        background-size:cover;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
      }
    </style>
  @endif
@endsection

@section('section')
	<!-- Section: intro -->
    <section id="intro" class="intro">
      <div class="intro-content">
        <div class="container">
          @include('frontend.theme.medicio.main_page.sections.intro-content')
        </div>
      </div>
    </section>

    <!-- /Section: intro -->

    <!-- Section: boxes -->
    <section id="procedure" class="home-section paddingtop-80">

      <div class="container">
        @include('frontend.theme.medicio.main_page.sections.boxes')
      </div>

    </section>
    <!-- /Section: boxes -->


    <section id="callaction" class="home-section paddingtop-40">
      <div class="container">
        @include('frontend.theme.medicio.main_page.sections.callaction')
      </div>
    </section>


    <!-- Section: services -->
    <section id="service" class="home-section nopadding paddingtop-60">

      <div class="container">
		    @include('frontend.theme.medicio.main_page.sections.service')
      </div>
    </section>
    <!-- /Section: services -->


    <!-- Section: team -->
    {{-- <section id="doctor" class="home-section bg-gray paddingbot-60">
      <div class="container marginbot-50">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="section-heading text-center">
                <h2 class="h-bold">Guide</h2>
                <p>Ea melius ceteros oportere quo, pri habeo viderer facilisi ei</p>
              </div>
            </div>
            <div class="divider-short"></div>
          </div>
        </div>
      </div>

      <div class="container">
        @include('frontend.theme.medicio.main_page.sections.team')
      </div>

    </section> --}}
    <!-- /Section: team -->



    <!-- Section: works -->
    {{-- <section id="tour" class="home-section bg-gray paddingbot-60">
      <div class="container marginbot-50">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="section-heading text-center">
                <h2 class="h-bold">Tour</h2>
                <p>Ea melius ceteros oportere quo, pri habeo viderer facilisi ei</p>
              </div>
            </div>
            <div class="divider-short"></div>
          </div>
        </div>
      </div>

      <div class="container">
        @include('frontend.theme.medicio.main_page.sections.works')
      </div>
    </section> --}}
    <!-- /Section: works -->


    <!-- Section: testimonial -->
    <section id="testimonial" class="home-section paddingbot-60 parallax" data-stellar-background-ratio="0.5">

      <div class="carousel-reviews broun-block">
        <div class="container">
          @include('frontend.theme.medicio.main_page.sections.testimony')
        </div>
      </div>
    </section>
    <!-- /Section: testimonial -->


    <!-- Section: pricing -->
    <section id="pricing" class="home-section bg-gray paddingbot-60">
      <div class="container marginbot-50">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="wow lightSpeedIn" data-wow-delay="0.1s">
              <div class="section-heading text-center">
                <h2 class="h-bold">Pricing</h2>
                <p>Pilih jasa service yang anda inginkan dari beberapa paket service yang ditawarkan</p>
              </div>
            </div>
            <div class="divider-short"></div>
          </div>
        </div>
      </div>

      <div class="container">
		    @include('frontend.theme.medicio.main_page.sections.pricing')
      </div>
    </section>
    <!-- /Section: pricing -->

    <section id="partner" class="home-section paddingbot-60">
      <div class="container marginbot-50">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="wow lightSpeedIn" data-wow-delay="0.1s">
              <div class="section-heading text-center">
                <h2 class="h-bold">Our partner</h2>
                <p>Take charge of your health today with our specially designed health packages</p>
              </div>
            </div>
            <div class="divider-short"></div>
          </div>
        </div>
      </div>

      <div class="container">
        @include('frontend.theme.medicio.main_page.sections.partners')
      </div>
    </section>
@endsection

@section('modals')
  <div>
    @include('frontend.theme.medicio.main_page.modals.auth.login')
  </div>
  <div>
    @include('frontend.theme.medicio.main_page.modals.auth.signup')
  </div>
@endsection

@section('script')
  @include('frontend.theme.medicio.main_page.script._main_page')
@endsection