@extends('admin.layouts.navs')

@section('page_heading', 'Country')

@section('section')
	<div class="col-sm-12">
		<div class="row m-b-20">
			<div class="col-sm-12">
				<div class="pull-right">
					<a href="{{ route('country.create') }}" class="btn btn-sm btn-primary">
						<i class="fa fa-plus"></i>&nbsp;
						Add Country
					</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				@component('admin.widgets.panel')
					@slot('panelTitle1', 'Country')
					@slot('panelBody')
						<div class="row">
							<div class="col-sm-12">
								<div class="table-responsive">
									<table class="table table-hover table-striped">
										<thead>
											<tr>
												<th class="col-sm-6">Country</th>
												<th class="text-center">Total Area</th>
												<th class="text-center">Edit</th>
												<th class="text-center">Delete</th>
											</tr>
										</thead>
										<tbody>
											@foreach($countries as $country)
												<tr>
													<td>
														<a href="">
															{{ $country->name }}
														</a>
													</td>
													<td class="text-center">{{ $country->areas->count() }} Areas</td>
													<td class="text-center">
														<a href="{{ route('country.edit', ['country' => $country->id]) }}" class="btn btn-sm btn-info"><span><i class="fa fa-edit"></i></span></a>
													</td>

													<td class="text-center">
														<form action="{{ route('country.destroy', ['country' => $country->id ]) }}" method="post" class="countryDeleteForm">
															{{ csrf_field() }}
															{{ method_field('delete') }}
															<button type="submit" class="btn btn-sm btn-danger">
																<span>
																	<i class="fa fa-trash-o"></i>
																</span>
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
	</div>
@endsection

@section('script')
	@include('admin.country.script._index');
@endsection