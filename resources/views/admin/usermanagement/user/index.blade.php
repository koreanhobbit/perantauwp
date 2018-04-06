@extends('admin.layouts.navs')

@section('page_heading', 'Users')

@section('section')
	<div class="col-sm-12">
		<div class="row m-b-20">
			<div class="col-sm-12">
				<div class="pull-right">
					 <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">
					 	<span>
					 		<i class="fa fa-user-plus"></i>
					 	</span>
					 	&nbsp;Create New User
					 </a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				@component('admin.widgets.panel')
					@slot('panelTitle', 'Users List')
					@slot('panelBody')
						<div class="row">
							<div class="col-sm-12">
								<div class="table-responsive">
									<table class="table-striped table-hover table">
										<thead>
											<tr>
												<th class="col-md-3 text-center">
													Image
												</th>
												<th class="col-md-3 text-center">
													Name
												</th>
												<th class="col-md-3 text-center">
													Email
												</th>
												<th class="col-md-2 text-center">
													Role
												</th>
												<th class="col text-center">
													Edit
												</th>
												<th class="col text-center">
													Delete
												</th>
											</tr>
										</thead>
										<tbody>
											@foreach($users as $user)
												<tr>
													<td class="text-center">
														Image 1
													</td>
													<td class="text-center">
														<a href="{{ route('user.show', ['user' => $user->id]) }}">
															{{ ucfirst($user->name) }}
														</a>
													</td>
													<td class="text-center">
														{{ $user->email }}
													</td>
													<td class="text-center">
														{{ $user->roles->first()->display_name }}
													</td>
													<td class="text-center">
														<a href="{{ route('user.edit', ['user' => $user->id]) }}" class="btn btn-primary btn-sm">
															<i class="fa fa-edit"></i>
														</a>
													</td>
													<td class="text-center">
														<form action="{{ route('user.destroy', ['user' => $user->id]) }}" method="post" class="delete-form">
															{{ csrf_field() }}
															{{ method_field('delete') }}
															<button type="submit" class="btn btn-danger btn-sm delete-btn">
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
			<div class="text-center">
				{{ $users->links() }}
			</div>
		</div>
	</div>
@endsection

@section('script')
	@include('admin.usermanagement.user.script._script_index')
@endsection