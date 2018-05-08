<script>
	Dropzone.autoDiscover = false;
</script>
<script>
	$(document).ready(function() {
		$('.imageLink').click(function() {
			var link = $(this).data('location');
			var id = $(this).data('id');
			var title = $(this).data('name');
			$('.imgPlace').find('img').prop('src', link);
			$('.imgPlace').find('img').prop('title', title);
			$('.addImageBtn').addClass('hidden');
			$('.imgPlace').removeClass('hidden');
			$('#image').val(id);
		});

		$('.closeImgBtn').click(function() {
			$('.imgPlace').addClass('hidden');
			$('.imgPlace').find('img').prop('src', '');
			$('.imgPlace').find('img').prop('title', '');
			$('.addImageBtn').removeClass('hidden');
			$('#image').val('');
		});

		//initiate dropzone
        $('form#addNewImageDz').dropzone({
            paramName: "image",
            acceptedFiles: "image/*",
            maxFilesize:3,
            init: function () {
                thisDropzone = this;
                this.on("error", function (file, responseText) {
                    $.each(responseText, function (index, value) {
                        $('.dz-error-message').text(value);
                    });
                });
            },
            uploadMultiple: true,
            successmultiple: function(file,response) {
                $('#imageTab').addClass('active in');
                $('#imageList').addClass('active');
                $('#uploadImageTab').removeClass('active in');
                $('#uploadImageList').removeClass('active');
                this.removeAllFiles();
                var url = $('form#addNewImageDz').data('url');
                $.ajax({
                    url: url,
                    type: 'get',
                    data: {
                        '_token' : $('input[name=_token]').val(),
                        'title' : 'reloadImage',
                    },
                    beforeSend: function () {
                        $('.loaderHookImage').addClass('loader');
                        $('.imageContainer').fadeOut();    
                    },
                    success: function(data) {
                        $('#imageTab').html(data);
                        $('.imageContainer').fadeIn();
                        $('.loaderHookImage').removeClass('loader');

                         //select featured image button
                        $('.imageLink').click(function() {
							var link = $(this).data('location');
							var id = $(this).data('id');
							var title = $(this).data('name');
							$('.imgPlace').find('img').prop('src', link);
							$('.imgPlace').find('img').prop('title', title);
							$('.addImageBtn').addClass('hidden');
							$('.imgPlace').removeClass('hidden');
							$('#image').val(id);
						});

                        //remove featured image button 
                        // $('.removeFeaturedImageBtn').click(function() {
                        //     $('.addFeaturedImageBtn').removeClass('hidden');
                        //     $('.addFeaturedImageContainer').addClass('hidden');
                        //     $('.addFeaturedImageContainer img').attr('src', '');
                        //     $('.addFeaturedImageContainer img').attr('title', '');
                        //     $('.addFeaturedImageContainer input').val('');
                        // });

                        // if(!$('.infoContainer').hasClass('hidden')) {
                        //     $('.infoContainer').addClass('hidden');
                        //     $('.featuredImageDiv').removeClass('hidden');
                        // }
                    },
                    error:function(data) {
                        var errors = data.responseJSON.errors;
                        console.log(errors[data]);
                    }
                });
            }
        });

	});
</script>