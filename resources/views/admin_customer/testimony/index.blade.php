@extends('admin_customer.layouts.nav')

@section('page_heading', 'Testimony')

@section('section')
	<div class="col-sm-12">
		<div class="row">
			<div class="col-sm-12">
				@if(empty($testimonies->first()))
					<div class="alert alert-info">
						<div class="text-center">
							<h1>There is no testimonial yet, Please create your testimony</h1>
						</div>
					</div>
				@else
					@component('admin.widgets.panel')
						@slot('class', 'primary')
						@slot('panelTitle', 'Testimonies History')
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
												@if(!empty($testimonies->first()))
													@foreach($testimonies as $key => $testimony)
														<tr>
															<td class="text-center">{{ $key + 1 }}</td>
															<td class="text-center">{{ $testimony->created_at->diffForHumans() }}</td>
															<td class="text-center">{{ $testimony->testimony }}</td>
														</tr>
													@endforeach
												@endif
											</tbody>
										</table>
									</div>
								</div>
							</div>
						@endslot
					@endcomponent
				@endif
			</div>
		</div>
	</div>
@endsection