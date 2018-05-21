@extends('admin_customer.layouts.nav')

@section('page_heading', 'Testimony')

@section('section')
	<div class="col-sm-12">
		<div class="row">
			<div class="col-sm-12">
				@component('admin.widgets.panel')
					@slot('panelTitle', 'Create Testimony')
					@slot('panelBody')
						<div class="row">
							<div class="col-sm-12">
								<div class="table-responsive">
									<table class="table table-striped table-hover table-danger">
										<thead>
											<tr>
												<th class="text-center col">No</th>
												<th class="text-center col-sm-2">Date</th>
												<th class="text-center col-sm-10">Testimony</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="text-center">1</td>
												<td class="text-center">21-9-2018</td>
												<td class="text-center">This is awesome</td>
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
	</div>
@endsection