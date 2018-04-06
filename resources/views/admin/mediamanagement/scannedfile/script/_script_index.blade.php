<script>
	$(document).ready(function() {
		$('.deleteForm').submit(function() {
			return confirm('are you sure want to delete this file?');
		});
	});
</script>