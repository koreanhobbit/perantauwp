<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script>
    Dropzone.autoDiscover = false;
</script>
<script>
	$(document).ready(function() {
		//control the change button
		$('.changeBtn').click(function() {
			if($(this).parents('div.input-group').children('input').prop('disabled') == false) {
				$(this).parents('div').children('input').prop('disabled', true);
			}
			else {
				$(this).parents('div').children('input').prop('disabled', false);
			}

			if($(this).parents('div.input-group').children('textarea').prop('disabled') == false) {
				$(this).parents('div').children('textarea').prop('disabled', true);
			}
			else {
				$(this).parents('div').children('textarea').prop('disabled', false);
			}
		});

		//SET THE BIRTHDAY DATEPICKER
		$('#birthday').datepicker({
			autoclose: true,
		});

		//profile image
        //select image profile
        $('.profileImageLink').click(function() {
            var link = $(this).data('location');
            var name = $(this).data('name');
            var id = $(this).data('id');
            $('.profileImageBtn').children('img').prop('src', link);
            $('.profileImageBtn').children('img').prop('title', name);
            $('.profileImageId').val(id);
        });

		$('.profileImageBtn').click(function(event) {
			//activate dropzone
			$('form#addNewProfileImageDz').dropzone({
				paramName: "image", 
				acceptedFiles: "image/*",
				maxFileSize: 3,
				init: function () {
                    thisDropzone = this;
                    this.on("error", function (file, responseText) {
                        $.each(responseText, function (index, value) {
                            $('.dz-error-message').text(value);
                        });
                    });
                },
                uploadMultiple: true,
                successmultiple: function(file, response) {
                	$('#profileImageTab').addClass('active in');
                    $('#profileImageList').addClass('active');
                    $('#uploadProfileImageTab').removeClass('active in');
                    $('#uploadProfileImageList').removeClass('active');
                    this.removeAllFiles();

                    //ajax for saving the image to database
                    var url = $('form#addNewProfileImageDz').data('url');
                    $.ajax({
                    	url: url,
                    	data: {
                    		'_token': $('input[name=_token]').val(),
                    		'title' : 'reloadImageListContainer',
                    	},
                    	beforeSend: function() {
                    		$('.loaderHookProfileImage').addClass('loader');
                    		$('.profileImageContainer').fadeOut();
                    	},
                    	success: function(data) {
                    		$('#profileImageTab').html(data);
                            $('.profileImageContainer').fadeIn();
                            $('.loaderHookProfileImage').removeClass('loader');

                            //select image profile
                            $('.profileImageLink').click(function() {
                                var link = $(this).data('location');
                                var name = $(this).data('name');
                                var id = $(this).data('id');
                                $('.profileImageBtn').children('img').prop('src', link);
                                $('.profileImageBtn').children('img').prop('title', name);
                                $('.profileImageId').val(id);
                            });
                    	},
                    });
                },
			});
		});
	});
</script>