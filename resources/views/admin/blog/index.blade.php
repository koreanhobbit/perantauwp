@extends('admin.layouts.navs')

@section('page_heading', 'Blog')

@section('section')
	<div class="col-sm-12">
		<div class="row m-b-20">
			<div class="col-sm-12">
				<div class="pull-right">
					<a href="{{ route('blog.create') }}" class="btn btn-primary btn-sm">
						<i class="fa fa-newspaper-o"></i>
						&nbsp;Create New Blog
					</a>
				</div>
			</div>
		</div>
		@if(count($posts) < 1)
			<div class="alert alert-info">
				<div class="text-center">
					<h1>There is no blog post</h1>
				</div>
			</div>
		@else
			<div class="row">
				<div class="col-sm-12">
					@component('admin.widgets.panel')
						@slot('panelTitle1', 'Blogs List')
						@slot('panelBody')
							<div class="table-responsive">
								<table class="table table-striped table-hover">
									<thead>
										<tr>
											<th class="text-center">Title</th>
											<th class="text-center">Summary</th>
											<th class="text-center">Published</th>
											<th class="text-center">Edit</th>
											<th class="text-center">Delete</th>
										</tr>
									</thead>
									<tbody class="postListContainer" style="display: relative">
										<div class="loaderHook"></div>
										@include('admin.blog.partials._postList')
									</tbody>
								</table>
							</div>
						@endslot
					@endcomponent
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="text-center">
						{{ $posts->links() }}
					</div>
				</div>
			</div>
		@endif
	</div>
@endsection

@section('script')
	@include('admin.blog.script._script_index')
@endsection