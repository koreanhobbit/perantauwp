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
	@if(count($forms) < 1) 
		<div class="alert alert-info">
			<div class="text-center">
				<h1>There is no form yet!</h1>
			</div>
		</div>
	@else
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
												<th class="text-center col-sm-3">Created at</th>
												<th class="text-center col-sm-1">Edit</th>
												<th class="text-center col-sm-1">Delete Form</th>
											</tr>
										</thead>
										<tbody>
											@foreach($forms as $form)
												<tr>
													<td class="text-center">{{ ucfirst($form->name) }}</td>
													<td class="text-center">{{ $form->created_at->diffForHumans() }}</td>
													<td class="text-center">
														<a href="{{ route('form.edit', ['form' => $form->id]) }}" class="btn btn-sm btn-info"><span><i class="fa fa-edit"></i></span></a>
													</td>
													<td class="text-center">
														<form action="{{ route('form.destroy', ['form' => $form->id]) }}" method="post" class="deleteForm">
															{{ csrf_field() }}
															{{ method_field('delete') }}
																<button type="submit" class="btn btn-sm btn-danger"><span><i class="fa fa-trash"></i></span></button>
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
					{{ $forms->links() }}
				</div>
			</div>
		</div>
	@endif
@endsection
@section('script')
	@include('admin.form.script._index')
@endsection