@extends('admin.layouts.navs')
@section('page_heading', 'Images')
@section('section')
	<div class="col-sm-12">
		<div class="row m-b-20">
			<div class="col-sm-12">
				<div class="pull-right">
					<a href="{{ route('image.create') }}" class="btn btn-primary btn-sm">
						<span>
							<i class="fa fa-picture-o"></i>
						</span>
						Upload Images
					</a>
				</div>
			</div>
		</div>
		@if(count($images) < 1 )
			<div class="alert alert-info">
				<div class="text-center">
					<h1>No image please add one!</h1>
				</div>
			</div>
		@else
		<div class="row">
			@component('admin.widgets.panel')
				@slot('panelTitle1', 'Images List')
				@slot('panelBody')	
					@foreach($images->load('thumbnail') as $image)
						<div class="col-md-2 col-sm-6">
							 <div class="thumbnail">
							 	<a href="{{ route('image.show', ['image' => $image->id]) }}">
							 		<img src="{{ asset($image->thumbnail->location) }}" title="{{ $image->thumbnail->name }}">
							 	</a>
							 </div>
						</div>
					@endforeach
					<div class="modal fade" id="" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
					        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					        		<h4 class="modal-title"></h4>
					      		</div>
					      		<div class="modal-body">
					        		
					      		</div>
					      		<div class="modal-footer">
					        		
					      		</div>
							</div>
						</div>
					</div>
				@endslot
			@endcomponent
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="text-center">
					{{ $images->links() }}
				</div>
			</div>
		</div>
		@endif
	</div>
@endsection