@if(count($areas) > 0)
	@foreach($areas as $area)
		<option value="{{ $area->id }}">{{ $area->name }}</option>
	@endforeach
@endif
