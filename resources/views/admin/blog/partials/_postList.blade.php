@foreach($posts as $post)
	<tr>
		<td class="text-center">{{ ucfirst($post->title) }}</td>
		<td class="text-center">{{ $post->summary }}</td>
		<td class="text-center">
			<div class="checkbox">
				<label for="checkbox">
					<input type="checkbox" name="checkbox" {{ $post->is_published == 1 ? 'checked' : '' }} data-url="{{ route('blog.publish', ['blog' => $post->slug]) }}">
				</label>
			</div>
		</td>
		<td class="text-center">
			
			<a href="{{ route('blog.edit', ['blog' => $post->slug]) }}" class="btn btn-sm btn-info">
				<i class="fa fa-edit"></i>
			</a>
		</td>
		<td class="text-center">
			<form action="{{ route('blog.destroy', ['blog' => $post->slug]) }}" method="post" class="deleteForm">
				{{ csrf_field() }}
				{{ method_field('delete') }}
				<button type="submit" class="btn btn-sm btn-danger">
					<i class="fa fa-trash-o"></i>
				</button>
			</form>
		</td>
	</tr>
@endforeach
