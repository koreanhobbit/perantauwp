<script>
	$(document).ready(function() {
		updateStatusPublish();

		function updateStatusPublish() {
			//ajax publish post 
			$('.checkbox input').on('change', function() {
				var url = $(this).data('url');
				$.ajax({
					type:'PUT',
					url: url,
					data: {
						'_token': $('input[name=_token]').val(),
						'is_published': $('input[name=checkbox]').val(),
					},
					beforeSend:function() {
						$('.loaderHook').addClass('loader');
						$('.postListContainer').fadeOut();
					},
					success:function(data) {
						$('.loaderHook').removeClass('loader');
						$('.postListContainer').fadeIn();
						window.location.reload();
					},
					error:function(data) {
						// var errors = data.responseJSON.errors;
	    				// console.log(errors[data]);
					}
				});
			});

			//confirm before deleting the post
			$('.deleteForm').submit(function() {
				return confirm('are you sure want to delete this post?');
			});
		}
	});
</script>