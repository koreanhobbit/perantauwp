@extends('admin.layouts.navs')
@section('page_heading', 'Upload Scanned Files')

@section('section')
	<div class="col-sm-12">
		 <div class="row m-b-20">
		 	<div class="col-sm-12">
		 		<div class="pull-right">
		 			<a href="{{ route('scannedfile.index') }}" class="btn btn-primary btn-sm">
		 				<i class="fa fa-arrow-left"></i>
		 				&nbsp;back to Scanned Files List
		 			</a>
		 		</div>
		 	</div>
		 </div>
		 <div class="row"> 
		 	<div class="col-sm-12">
		 		<form action="{{ route('scannedfile.store') }}" class="dropzone" id="scannedfileForm" name="file">
		 			{{ csrf_field() }}
					<div class="fallback">
						<input type="file" name="image" multiple>
					</div>
					<div class="dz-message">
						<h3 class="text-center">
							Drop your files inside the box or click to add files
						</h3>
					</div>
		 		</form>
		 	</div>
		 </div>
	</div>
@endsection
@section('script')
	@include('admin.mediamanagement.scannedfile.script._script_create')
@endsection