@extends('admin.layouts.navs')

@section('page_heading', 'Files')

@section('section')
	<div class="col-sm-12">
		<div class="row m-b-20">
			<div class="col-sm-12">
				<div class="pull-right">	
					<a class="btn btn-primary btn-sm" href="{{ route('file.create') }}">
						<i class="fa fa-file-archive-o"></i>
						&nbsp; Upload New Files
					</a>
				</div>
			</div>
		</div>
		@if(count($files) < 1)
			<div class="alert alert-info">
				<div class="text-center">
					<h1>There is no file added, please add 1</h1>
				</div>
			</div>
		@else
		<div class="row">
			<div class="col-sm-12">
				@component('admin.widgets.panel')
					@slot('panelTitle1', 'Files List')
					@slot('panelBody')
						<div class="row">
							<div class="col-sm-12">
								<div class="table-responsive">
									<table class="table table-hover table-striped">
										<thead>
											<tr>
												<th class="text-center">Name</th>
												<th class="text-center">Type</th>
												<th class="text-center">Size</th>
												<th class="text-center">Uploaded by</th>
												<th class="text-center">Uploaded on</th>
												<th class="text-center">Delete</th>
											</tr>
										</thead>
										<tbody>
											@foreach($files as $file)
												<tr>
													<td class="text-center">
														<a href="{{ route('file.show', ['file' => $file->id]) }}" target="_blank">
															{{ $file->name }}
														</a>
													</td>
													<td class="text-center">{{ $file->type }}</td>
													<td class="text-center">{{ $file->size }}</td>
													<td class="text-center">{{ $file->author->name }}</td>
													<td class="text-center">{{ $file->created_at }}</td>
													<td class="text-center">
														<form action="{{ route('file.destroy', ['file' => $file->id]) }}" method="post" class="deleteForm">
															{{ csrf_field() }}
															{{ method_field('delete') }}
															<button class="btn btn-danger btn-sm" type="submit">
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
	@include('admin.mediamanagement.file.script._script_index')
@endsection