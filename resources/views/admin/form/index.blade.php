@extends('admin.layouts.navs')

@section('page_heading', 'Forms')

@section('section')
	<div class="row m-b-20">
		<div class="col-sm-12">
			<div class="pull-right">
				<a href="{{ route('form.create') }}" class="btn btn-sm btn-primary">Add Form</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			@component('admin.widgets.panel')
				@slot('panelTitle1', 'Forms List')
				@slot('panelBody')
					<div class="row">
						<div class="col-sm-12">
							<div class="table-responsive">
								<table class="table table-hover table-striped">
									<thead>
										<tr>
											<th class="text-center col-sm-4">Name</th>
											<th class="text-center col-sm-3">Source</th>
											<th class="text-center col-sm-1">Edit</th>
											<th class="text-center col-sm-1">Delete Form</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="text-center">Service 1</td>
											<td class="text-center">Service</td>
											<td class="text-center">
												<a href="" class="btn btn-sm btn-info"><span><i class="fa fa-edit"></i></span></a>
											</td>
											<td class="text-center">
												<a href="" class="btn btn-sm btn-danger"><span><i class="fa fa-trash"></i></span></a>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				@endslot
			@endcomponent
		</div>
	</div>
@endsection