<script>
	$(document).ready(function() {
		$('.delete-form').submit(function() {
			return confirm('are you sure want to delete this user?');
		});
	});
</script>