<script>
	$(document).ready(function() {
		$('#userRole').change(function() {
			var url = $(this).data('url');
			var role = $(this).val();
 			if($(this).val() != '') {
				$.ajax({
					url: url,
					data:{
						'_token': $('input[name=_token]').val(),
						'title': 'reloadUsers',
						'role': role,
					},
					beforeSend: function() {
						$('.loaderHook').addClass('loader');
						$('.testimonyDetailsContainer').fadeOut();
					},
					success: function(data) {
						$('.userDetails').html(data);
						$('.loaderHook').removeClass('loader');
						$('.testimonyDetailsContainer').fadeIn();	
					},
				});
			}
		});
	});
</script>