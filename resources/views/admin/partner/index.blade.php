@extends('admin.layouts.navs')
@section('page_heading', 'Partner')

@section('section')
	<div class="row m-b-20">
		<div class="col-sm-12">
			<div class="pull-right">
				<a href="{{ route('partner.create') }}" class="btn btn-primary btn-sm">
					Add New Partner
				</a>
			</div>
		</div>
	</div>
	@if(count($partners) < 1)
		<div class="alert alert-info">
			<div class="text-center">
				<h1>There is no partner, add one!</h1>
			</div>
		</div>
	@else
		<div class="row">
			<div class="col-sm-12">
				@component('admin.widgets.panel')
					@slot('panelTitle1', 'Partners List')
					@slot('panelBody')
						<div class="row">
							<div class="col-sm-12">
								<div class="table-responsive">
									<table class="table table-striped table-hover">
										<thead>
											<tr>
												<th class="text-center col-sm-3">Name</th>
												<th class="text-center col-sm-9">Link</th>
												<th class="text-center col">Edit</th>
												<th class="text-center col">Delete</th>
											</tr>
										</thead>
										<tbody>
											@foreach($partners as $partner)
												<tr>
													<td class="text-center">{{ $partner->name }}</td>
													<td class="text-center">{{ $partner->link }}</td>
													<td class="text-center">
														<a href="{{ route('partner.edit', ['partner' => $partner->id]) }}" class="btn btn-sm btn-info">
															<span>
																<i class="fa fa-edit"></i>
															</span>
														</a>
													</td>
													<td class="text-center">
														<form action="{{ route('partner.destroy', ['partner' => $partner->id]) }}" class="deleteForm" method="post">
															{{ csrf_field() }}
															{{ method_field('delete') }}
															<button class="btn btn-sm btn-danger" type="submit">
																<i class="fa fa-trash"></i>
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
	@endif
@endsection
@section('script')
	@include('admin.partner.script._index')
@endsection