@extends('admin.layouts.navs')

@section('page_heading', 'Permission')

@section('section')
	<div class="col-sm-12">
		<div class="row m-b-20">
			<div class="col-sm-12">
				<div class="pull-right">
					<a href="{{ route('permission.create') }}" class="btn btn-primary btn-sm">
						<i class="fa fa-user-secret"></i>
						&nbsp;Add New Permission
					</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				@component('admin.widgets.panel')
					@slot('page_title','Permissions List')
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
											@foreach($permissions as $permission)
												<tr>
													<td class="text-center">{{ $permission->name }}</td>
													<td class="text-center">{{ $permission->display_name }}</td>
													<td class="text-center">{{ $permission->description }}</td>
													<td class="text-center">{{ $permission->created_at }}</td>
													<td class="text-center">
														<a class="btn btn-sm btn-info" href="{{ route('permission.edit', ['permission' => $permission->id]) }}"> 
															<i class="fa fa-edit"></i>
														</a>
													</td>
													<td class="text-center">
														<form action="{{ route('permission.destroy', ['permission' => $permission->id]) }}" method="post" class="formDelete">
															{{ csrf_field() }}
															{{ method_field('delete') }}
															<button class="btn btn-sm btn-danger"> 
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
					{{ $permissions->links() }}
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
	@include('admin.usermanagement.permission.script._index')
@endsection