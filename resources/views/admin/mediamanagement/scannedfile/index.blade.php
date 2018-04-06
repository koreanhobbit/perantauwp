@extends('admin.layouts.navs')

@section('page_heading', 'Scanned Files')

@section('section')
	<div class="col-sm-12">
		<div class="row m-b-20">
			<div class="col-sm-12">
				<div class="pull-right">
					<a href="{{ route('scannedfile.create') }}" class="btn btn-primary btn-sm">
						<i class="fa fa-file-image-o"></i>
						&nbsp;Upload Scanned Files
					</a>
				</div>
			</div>
		</div>
		@if(count($files) < 1)
			<div class="row">
				<div class="col-sm-12">
					<div class="alert alert-info">
						<div class="text-center">
							<h1>There is no file, please add one</h1>
						</div>
					</div>
				</div>
			</div>
		@else
		<div class="row">
			<div class="col-sm-12">
				@component('admin.widgets.panel')
					@slot('panelTitle1', 'Scanned Files List')
					@slot('panelBody')
						<div class="row">
							<div class="col-sm-12">
								<div class="row">
									<div class="table-responsive">
										<table class="table table-hover table-striped">
											<thead>
												<tr>
													<th class="text-center">Name</th>
													<th class="text-center">Type</th>
													<th class="text-center">Size</th>
													<th class="text-center">Uploaded By</th>
													<th class="text-center">Uploaded On</th>
													<th class="text-center">Delete</th>
												</tr>
											</thead>
											<tbody>
												@foreach($files as $file)
													<tr>
														<td class="text-center">
															<a href="{{ route('scannedfile.show', ['scannedfile' => $file->id]) }}" target="_blank">
																{{ $file->name }}
															</a>
														</td>
														<td class="text-center">{{ $file->type }}</td>
														<td class="text-center">{{ $file->size }}</td>
														<td class="text-center">{{ $file->author->name }}</td>
														<td class="text-center">{{ $file->created_at }}</td>
														<td class="text-center">
															<form action="{{ route('scannedfile.destroy',['scannedfile' => $file->id]) }}" method="post" class="deleteForm">
																{{ csrf_field() }}
																{{ method_field('delete') }}
																<button class="btn btn-danger btn-sm">
																	<i class="fa fa-trash-o"></i>
																</button>
															</form>
														</td>
													</tr>
												@endforeach
											</tbody>
										</table>
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
				<div class="text-center">
					{{ $files->links() }}
				</div>
			</div>
		</div>
		@endif
	</div>
@endsection
@section('script')
	@include('admin.mediamanagement.scannedfile.script._script_index')
@endsection