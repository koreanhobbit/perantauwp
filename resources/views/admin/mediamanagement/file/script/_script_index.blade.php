<script>
	$(document).ready(function() {
		$('.deleteForm').submit(function(event) {
			return confirm('Are you sure want to delete this file?');
		});
	});
</script>