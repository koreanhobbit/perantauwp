@extends('admin.layouts.navs')

@section('page_heading', 'Details of Image')

@section('section')
	<div class="col-sm-12">
		<div class="row m-b-20">
			<div class="col-sm-12">
				<div class="pull-right">
					<a class="btn btn-primary btn-sm" href="{{ route('image.index') }}">
						<i class="fa fa-arrow-left">
						</i>
						&nbsp; back to images list 
					</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-7">
				@component('admin.widgets.panel')
					@slot('panelBody')
						<img src="{{ asset($image->location) }}" title="{{ $image->name }}" class="img-responsive" style="margin-left: auto;margin-right: auto;display: block;">
					@endslot
					@slot('panelFooter')
						<div class="text-center">
							<form action="{{ route('image.destroy',['image' => $image->id]) }}" method="post" class="deleteForm">
								{{ csrf_field() }}
								{{ method_field('delete') }}
								<button class="btn btn-warning" type="submit">
									delete permanently
								</button>
							</form>
						</div>
					@endslot
				@endcomponent
			</div>
			<div class="col-sm-5">
				@component('admin.widgets.panel')
					@slot('panelBody')
						<div class="table-responsive">
							<table class="table table-striped table-hover">
								<tbody>
									<tr>
										<td>File Name</td>
										<td>:</td>
										<td>{{ $image->name }}</td>
									</tr>
									<tr>
										<td>File Type</td>
										<td>:</td>
										<td>{{ $image->type }}</td>
									</tr>
									<tr>
										<td>File Size</td>
										<td>:</td>
										<td>{{ $image->size }}</td>
									</tr>
									<tr>
										<td>File Size</td>
										<td>:</td>
										<td>{{ $image->size }}</td>
									</tr>
									<tr>
										<td>Uploaded by</td>
										<td>:</td>
										<td>{{ $image->author->name }}</td>
									</tr>
									<tr>
										<td>Uploaded on</td>
										<td>:</td>
										<td>{{ $image->created_at }}</td>
									</tr>
								</tbody>
							</table>
						</div>
					@endslot
				@endcomponent				
			</div>
		</div>
	</div>
@endsection
@section('script')
	@include('admin.mediamanagement.image.script._script_show')
@endsection