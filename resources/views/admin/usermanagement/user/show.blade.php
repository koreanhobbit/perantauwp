@extends('admin.layouts.navs')

@section('page_heading', 'User Profile')

@section('section')
	<div class="col-sm-12">
		<div class="row">
			<div class="col-sm-3">
				@component('admin.widgets.panel')
				@slot('panelBody')
					<div class="img-thumbnail">
						<img src="" alt="" class="img-responsive">
					</div>
				@endslot
			@endcomponent
			</div>
			<div class="col-sm-9">
				@component('admin.widgets.panel')
					@slot('panelBody')
						<div class="table-responsive">
							<table class="table table-hover table-inverse">
								<tbody>
									<tr>
										<td>
											Name
										</td>
										<td>
											:
										</td>
										<td>
											{{ $user->name }}
										</td>
									</tr>
									<tr>
										<td>
											Email Address
										</td>
										<td>
											:
										</td>
										<td>
											{{ $user->email }}
										</td>
									</tr>
									<tr>
										<td>
											Role
										</td>
										<td>
											:
										</td>
										<td>
											@foreach($user->roles as $role)
												{{ $role->display_name }}
											@endforeach
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					@endslot
				@endcomponent
			</div>
		</div>
	</div>
@endsection