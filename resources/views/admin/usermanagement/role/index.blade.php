@extends('admin.layouts.navs')

@section('page_heading', 'Role')

@section('section')
	<div class="col-sm-12">
		<div class="row m-b-20">
			<div class="col-sm-12">
				<div class="pull-right">
					<a href="{{ route('role.create') }}" class="btn btn-primary btn-sm">
						<i class="fa fa-user-secret"></i>
						&nbsp;Add New Role
					</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				@component('admin.widgets.panel')
					@slot('page_title','Roles List')
					@slot('panelBody')
						<div class="row">
							<div class="col-sm-12">
								<div class="table-responsive">
									<table class="table table-hover table-striped">
										<thead>
											<tr>
												<th class="text-center">Name</th>
												<th class="text-center">Display Name</th>
												<th class="text-center">Description</th>
												<th class="text-center">Created at</th>
												<th class="text-center">Edit</th>
												<th class="text-center">Delete</th>
											</tr>
										</thead>
										<tbody>
											@foreach($roles as $role)
												<tr>
													<td class="text-center">{{ $role->name }}</td>
													<td class="text-center">{{ $role->display_name }}</td>
													<td class="text-center">{{ $role->description }}</td>
													<td class="text-center">{{ $role->created_at }}</td>
													<td class="text-center">
														<a class="btn btn-sm btn-info" href="{{ route('role.edit', ['role' => $role->id]) }}"> 
															<i class="fa fa-edit"></i>
														</a>
													</td>
													<td class="text-center">
														<button class="btn btn-sm btn-danger"> 
															<i class="fa fa-trash-o"></i>
														</button>
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
					{{ $roles->links() }}
				</div>
			</div>
		</div>
	</div>
@endsection