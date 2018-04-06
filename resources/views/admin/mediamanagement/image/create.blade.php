@extends('admin.layouts.navs')

@section('page_heading', 'Images')

@section('section')
	<div class="col-sm-12">
		<div class="row m-b-20">
			<div class="col-sm-12">
				<div class="pull-right">
					<a href="{{ route('image.index') }}" class="btn btn-primary btn-sm">
						<i class="fa fa-arrow-left"></i>
						&nbsp; back to images list
					</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">	
				<form action="{{ route('image.store') }}" class="dropzone" id="addImage">
					{{ csrf_field() }}
					<div class="fallback">
						<input type="file" name="image" multiple>
					</div>
					<div class="dz-message">
						<h3 class="text-center">
							Drop your images inside the box or click to add images 
						</h3>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection

@section('script')
	@include('admin.mediamanagement.image.script._script_create')
@endsection