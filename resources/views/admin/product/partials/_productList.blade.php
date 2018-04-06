@foreach($products as $product)
	<tr>
		<td class="text-center">
			<div class="thumbnail">
				<img src="{{ count($product->images) > 0 ? asset($product->thumbnail()->location) : asset($product->noImageThumb()->location) }}" title="{{ count($product->images) > 0 ? $product->thumbnail()->name : $product->noImageThumb()->name }}" class="img-responsive">
			</div>
		</td>
		<td class="text-center">{{ ucfirst($product->name) }}</td>
		<td class="text-center">{{ $product->summary }}</td>
		<td class="text-center">{{ $product->price }}</td>
		<td class="text-center">
			<div class="checkbox">
				<label for="checkboxSale">
					<input type="checkbox" name="checkboxSale" {{ $product->is_sale == 1 ? 'checked' : '' }}>
				</label>
			</div>
		</td>
		<td class="text-center">
			<div class="checkbox">
				<label for="checkbox">
					<input type="checkbox" name="checkbox" {{ $product->is_published == 1 ? 'checked' : '' }} data-url="{{-- {{ route('blog.publish', ['blog' => $post->slug]) }} --}}">
				</label>
			</div>
		</td>
		<td class="text-center">
			
			<a href="{{ route('product.edit', ['product' => $product->slug]) }}" class="btn btn-sm btn-info">
				<i class="fa fa-edit"></i>
			</a>
		</td>
		<td class="text-center">
			<form action="{{ route('product.destroy', ['product' => $product->slug]) }}" method="post" class="deleteForm">
				{{ csrf_field() }}
				{{ method_field('delete') }}
				<button type="submit" class="btn btn-sm btn-danger">
					<i class="fa fa-trash-o"></i>
				</button>
			</form>
		</td>
	</tr>
@endforeach