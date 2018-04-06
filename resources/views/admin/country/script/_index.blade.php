<script>
	$(document).ready(function() {
		$('.countryDeleteForm').submit(function() {
			return confirm('are you sure want to delete this country?');
		});
	});
</script>