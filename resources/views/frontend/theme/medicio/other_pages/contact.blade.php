@extends('frontend.theme.medicio.layouts.frame_other')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
@endsection

@section('otherpage_title', 'contact')

@section('section')
    <form action="{{ route('contact.store') }}" method="post">
        {{ csrf_field() }}
        <section class="home-section paddingbot-60" id="other">
            <div class="container marginbot-60">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="container-other">
                            <div class="row m-b-30">
                                <div class="col-sm-12">
                                    <h2 class="text-center wow fadeInDown" data-wow-delay="0.2s" style="overflow-wrap: break-word;">Please Fill the Form</h2>
                                    <br>
                                    <br>
                                    <br>
                                    
                                    <div class="progress progress-striped active wow fadeInUp" data-wow-delay="0.1s">
                                        <div class="progress-bar" id="msformbar" style="width:45%"></div>    
                                    </div>
                                                                
                                    <div class="text-justify msform wow lightSpeedIn" data-wow-delay="0.1s">
                                        <br>
                                        <div class="tab required-form" data-pos="">
                                            <fieldset>
                                                <legend>Personal Data</legend>
                                                <div class="form-group {{ $errors->has('msformname') ? 'has-error' : '' }}">
                                                    <label for="msformname">Name</label>
                                                    <input type="text" class="form-control" name="msformname" id ="msformname" value="{{ old('msformname') }}">
                                                    <div class="help-block {{ $errors->has('msformname') ? '' : 'hidden' }}">
                                                        <span>
                                                            <strong>
                                                                {{ $errors->has('msformname') ? $errors->first('msformname') : '' }}
                                                            </strong>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="form-group {{ $errors->has('msformemail') ? 'has-error' : '' }}">
                                                    <label for="msformemail">Email Address</label>
                                                    <input type="email" name="msformemail" id="msformemail" class="form-control" value="{{ old('msformemail') }}">
                                                    <div class="help-block {{ $errors->has('msformemail') ? '' : 'hidden' }}">
                                                        <span>
                                                            <strong>
                                                                {{ $errors->has('msformemail') ? $errors->first('msformemail') : '' }}
                                                            </strong>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="form-group {{ $errors->has('msformphone') ? 'has-error' : '' }}">
                                                    <label for="msformphone">Phone Number/Whatsapp</label>
                                                    <input type="tel" name="msformphone" id="msformphone" class="form-control" value="{{ old('msformphone') }}">
                                                    <div class="help-block {{ $errors->has('msformphone') ? '' : 'hidden' }}">
                                                        <span>
                                                            <strong>
                                                                {{ $errors->has('msformphone') ? $errors->first('msformphone') : '' }}
                                                            </strong>
                                                        </span>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <div class="help-block">
                                                <span>
                                                    <small>
                                                        * All personal data form inputs are required, please fill them
                                                    </small>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="tab hidden required-form" data-pos="">
                                            <fieldset>
                                                <legend>Category</legend>
                                                <div class="form-group {{ $errors->has('msformservice') ? 'has-error' : '' }}">
                                                    <label for="msformservice">Choose Service</label>
                                                    <select name="msformservice" id="msformservice" class="form-control">
                                                        <option value="">
                                                            Choose Service
                                                        </option>
                                                        @foreach($services as $service)
                                                            <option value="{{ $service->id }}" {{ $service->id == old('msformservice') ? 'selected' : '' }}>{{ ucfirst($service->name) }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('msformservice'))
                                                        <div class="help-block">
                                                            <span>
                                                                <strong>{{ $errors->first('msformservice') }}</strong>
                                                            </span>
                                                        </div>
                                                    @endif
                                                </div>
                                            </fieldset>
                                            <div class="help-block">
                                                <span>
                                                    <small>
                                                        * Service input is required. Please choose one.
                                                    </small>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="tab hidden required-form" data-pos="">
                                            <fieldset>
                                                <legend>Destination Country</legend>
                                                <div class="form-group {{ $errors->has('msformcountry') ? 'has-error' : '' }}">
                                                    <label for="msformcountry">Choose Country</label>
                                                    <select name="msformcountry" id="msformcountry" class="form-control">
                                                        <option value="">
                                                            Choose Country
                                                        </option>
                                                        @foreach($countries as $country)
                                                            <option value="{{ $country->id }}" {{ $country->id == old('msformcountry') ? 'selected' : '' }}>{{ ucfirst($country->name) }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('msformcountry'))
                                                        <div class="help-block">
                                                            <span>
                                                                <strong>{{ $errors->first('msformcountry') }}</strong>
                                                            </span>
                                                        </div>
                                                    @endif
                                                </div>
                                            </fieldset>
                                            <div class="help-block">
                                                <span>
                                                    <small>
                                                        * Country input is required. Please choose one.
                                                    </small>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="tab hidden" data-pos="">
                                            <fieldset>
                                                <legend>Visit Date</legend>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group {{ $errors->has('msformarrival') ? 'has-error' : '' }}">
                                                            <label for="msformarrival">Arrival</label>
                                                            <div class="input-group">
                                                                <input type="text" name="msformarrival" id="msformarrival" class="form-control input-md" value="{{ old('msformarrival') }}">
                                                                <div class="input-group-addon">
                                                                    <span><i class="fa fa-calendar"></i></span>
                                                                </div>
                                                            </div>
                                                            @if($errors->has('msformarrival'))
                                                                <div class="help-block">
                                                                    <span>
                                                                        <strong>
                                                                            {{ $errors->first('msformarrival') }}
                                                                        </strong>
                                                                    </span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group {{ $errors->has('msformreturn') ? 'has-error' : '' }}">
                                                            <label for="msformreturn">Return</label></label>
                                                            <div class="input-group">
                                                                <input type="text" name="msformreturn" id="msformreturn" class="form-control input-md" value="{{ old('msformreturn') }}">
                                                                <div class="input-group-addon">
                                                                    <span><i class="fa fa-calendar"></i></span>
                                                                </div>
                                                            </div>
                                                            @if($errors->has('msformreturn'))
                                                                <div class="help-block">
                                                                    <span>
                                                                        <strong>
                                                                            {{ $errors->first('msformreturn') }}
                                                                        </strong>
                                                                    </span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <div class="help-block">
                                                <span>
                                                    <small>
                                                        * Fill the date inputs for guide service or press next to skip
                                                    </small>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="tab hidden required-form" data-pos="">
                                            <fieldset>
                                                <legend>Extra Information</legend>
                                                <div class="form-group {{ $errors->has('msformmessage') ? 'has-error' : '' }}">
                                                    <label for="msformmessage">Message</label>
                                                    <textarea name="msformmessage" id="msformmessage" class="form-control" rows="6">{{ old('msformmessage') }}</textarea>
                                                    @if($errors->has('msformmessage'))
                                                        <div class="help-block">
                                                            <span>
                                                                <strong>{{ $errors->first('msformmessage') }}</strong>
                                                            </span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-group {{ $errors->has('g-recaptcha-response' ? 'has-error' : '') }}">
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
                                            </fieldset>
                                            <div class="help-block">
                                                <span>
                                                    <small>
                                                        * Message is required.
                                                    </small>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row wow fadeInUp" data-wow-delay="0.1s">
                                <div class="col-sm-12">
                                    <div class="pull-left">
                                        <a class="btn btn-info hidden prevBtn">Prev</a>
                                    </div>
                                    <div class="pull-right">
                                        <a class="btn btn-info nextBtn">Next</a>
                                        <button class="btn btn-primary hidden submitBtn" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div> 
                            <div class="row m-t-20">
                                <div class="col-sm-12">
                                    <div class="form-group {{ count($errors->all()) > 0 ? 'has-error' : '' }}">
                                        @if(count($errors->all()) > 0)
                                            <div class="help-block">
                                                <span>
                                                    <strong>Please recheck your form!</strong>
                                                </span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="success-message hidden">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="text-center">
                                            <h1>{{ session()->get('message') }}</h1>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <a href="{{ route('mainpage.index') }}" class="btn btn-info form-control">Back to Main Page</a>
                                    </div>
                                </div>
                            </div>
                        </div>                             
                    </div>
                </div>
            </div>
        </section>
    </form>
@endsection
@section('script')
    @include('frontend.theme.medicio.other_pages.script._contact')
@endsection




