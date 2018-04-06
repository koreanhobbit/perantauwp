<script>
	$(document).ready(function() {
		$('.deleteForm').submit(function(event) {
			return confirm('are you sure want to delete this image?');
		});
	});
</script>