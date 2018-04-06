@extends('admin.layouts.navs')

@section('page_heading', 'Products List')

@section('section')
	<div class="col-sm-12">
		<div class="row m-b-20">
			<div class="col-sm-12">
				<div class="pull-right">
					<a href="{{ route('product.create') }}" class="btn btn-primary btn-sm">
						<i class="fa fa-shopping-bag"></i>
						&nbsp;Add New Product
					</a>
				</div>
			</div>
		</div>
		@if(count($products) < 1)
			<div class="alert alert-info">
				<div class="text-center">
					<h1>There is no product</h1>
				</div>
			</div>
		@else
			<div class="row">
				<div class="col-sm-12">
					@component('admin.widgets.panel')
						@slot('panelTitle1', 'Products List')
						@slot('panelBody')
							<div class="table-responsive">
								<table class="table table-striped table-hover">
									<thead>
										<tr>
											<th class="text-center">Image</th>
											<th class="text-center">Name</th>
											<th class="text-center">Summary</th>
											<th class="text-center">Price</th>
											<th class="text-center">Sale</th>
											<th class="text-center">Published</th>
											<th class="text-center">Edit</th>
											<th class="text-center">Delete</th>
										</tr>
									</thead>
									<tbody class="productListContainer" style="display: relative">
										<div class="loaderHook"></div>
										@include('admin.product.partials._productList')
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
						{{ $products->links() }}
					</div>
				</div>
			</div>
		@endif
	</div>
@endsection

@section('script')
	@include('admin.product.script._index')
@endsection