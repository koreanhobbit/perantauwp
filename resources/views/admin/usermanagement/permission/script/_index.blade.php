<script>
	$(document).ready(function() {
		$('.formDelete').submit(function() {
			return confirm('Are you sure want to delete this permission?');
		});
	});
</script>