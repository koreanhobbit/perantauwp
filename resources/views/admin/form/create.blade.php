@extends('admin.layouts.navs')

@section('page_heading', 'Create Form')

@section('section')
	<form action="{{ route('form.store') }}" method="post">
		{{ csrf_field() }}
		<div class="row m-b-20">
			<div class="col-sm-12">
				<div class="pull-right">
					<button class="btn btn-sm btn-primary" type="submit">Create Form</button>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				@component('admin.widgets.panel')
					@slot('panelTitle1', 'Construct Form')
					@slot('panelBody')
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
									<label for="name">Form's Name</label>
									<input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control">
									<div class="help-block">
										<span>
											<strong>
												{{ $errors->first('name') }}
											</strong>
										</span>
									</div>
								</div>
							</div>
						</div>
					@endslot
				@endcomponent
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="pull-right">
					<a href="{{ route('form.index') }}">
						<span><i class="fa fa-arrow-left"></i></span>
						&nbsp;Back to List
					</a>
				</div>
			</div>
		</div>
	</form>
@endsection


					