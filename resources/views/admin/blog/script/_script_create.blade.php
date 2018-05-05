{{-- tinymce javascript --}}
<script src="{{ asset('js/vendor/tinymce/jquery.tinymce.min.js') }}"></script>
<script src="{{ asset('js/vendor/tinymce/tinymce.min.js') }}"></script>
<script>
    Dropzone.autoDiscover = false;
</script>
<script>
	$(document).ready(function() {

        //set dropzone for uploading new image into database (featured image)
        $('.addFeaturedImageBtn a').click(function(event) {
            //initiate dropzone
            $('form#addNewFeaturedImageDz').dropzone({
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
                    $('#featuredImageTab').addClass('active in');
                    $('#featuredImageList').addClass('active');
                    $('#uploadFeaturedImageTab').removeClass('active in');
                    $('#uploadFeaturedImageList').removeClass('active');
                    this.removeAllFiles();
                    var url = $('form#addNewFeaturedImageDz').data('url');
                    $.ajax({
                        url: url,
                        data: {
                            '_token' : $('input[name=_token]').val(),
                            'title' : 'reloadFeaturedImageContainer',
                        },
                        beforeSend: function () {
                            $('.loaderHookFeaturedImage').addClass('loader');
                            $('.featuredImageContainer').fadeOut();    
                        },
                        success: function(data) {
                            $('#featuredImageTab').html(data);
                            $('.featuredImageContainer').fadeIn();
                            $('.loaderHookFeaturedImage').removeClass('loader');

                             //select featured image button
                            $('.featuredImageLink').click(function(event) {
                                var url = $(this).data('location');
                                var name = $(this).data('name');
                                var id = $(this).data('id');
                                $('#featuredImageModal').modal('hide');
                                $('.addFeaturedImageBtn').addClass('hidden');
                                $('.addFeaturedImageContainer').removeClass('hidden');
                                $('.addFeaturedImageContainer img').attr('src', url);
                                $('.addFeaturedImageContainer img').attr('title', name);
                                $('.addFeaturedImageContainer input').val(id);
                            });

                            //remove featured image button 
                            $('.removeFeaturedImageBtn').click(function() {
                                $('.addFeaturedImageBtn').removeClass('hidden');
                                $('.addFeaturedImageContainer').addClass('hidden');
                                $('.addFeaturedImageContainer img').attr('src', '');
                                $('.addFeaturedImageContainer img').attr('title', '');
                                $('.addFeaturedImageContainer input').val('');
                            });

                            if(!$('.infoContainer').hasClass('hidden')) {
                                $('.infoContainer').addClass('hidden');
                                $('.featuredImageDiv').removeClass('hidden');
                            }

                            //upload also image in image link for description
                            var urlImageLink = $('form#addNewImageDz').data('url');

                            $.ajax({
                                url: urlImageLink,
                                data: {
                                    '_token': $('input[name=_token]').val(),
                                    'title':'reloadImageLink',
                                },
                                success:function(data) {
                                    $('.imageLinkContainer').html(data);
                                    if(!$('.infoContainerLink').hasClass('hidden')) {
                                        $('.infoContainerLink').addClass('hidden');
                                        $('.imageContainer').removeClass('hidden');
                                    }
                                },
                            });
                        },
                        error:function(data) {
                            var errors = data.responseJSON.errors;
                            console.log(errors[data]);
                        }
                    });
                }
            });
        });


        //select featured image button
        $('.featuredImageLink').click(function(event) {
            var url = $(this).data('location');
            var name = $(this).data('name');
            var id = $(this).data('id');
            $('#featuredImageModal').modal('hide');
            $('.addFeaturedImageBtn').addClass('hidden');
            $('.addFeaturedImageContainer').removeClass('hidden');
            $('.addFeaturedImageContainer img').attr('src', url);
            $('.addFeaturedImageContainer img').attr('title', name);
            $('.addFeaturedImageContainer input').val(id);
        });


        //remove featured image button 
        $('.removeFeaturedImageBtn').click(function() {
            $('.addFeaturedImageBtn').removeClass('hidden');
            $('.addFeaturedImageContainer').addClass('hidden');
            $('.addFeaturedImageContainer img').attr('src', '');
            $('.addFeaturedImageContainer img').attr('title', '');
            $('.addFeaturedImageContainer input').val('');
        });


        //add new image for image in tinymce
        $('.addNewImageBtn').on('click', function() {
            // initiate dropzone
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
                    $('#addNewImage').modal('hide');
                    this.removeAllFiles();
                    var url = $('form#addNewImageDz').data('url');
                    $.ajax({
                        url: url,
                        data: {
                            '_token' : $('input[name=_token]').val(),
                            'title' : 'reloadImageLink',
                        },
                        beforeSend: function () {
                            $('.loaderHook').addClass('loader');
                            $('.imageLinkContainer').fadeOut();    
                        },
                        success: function(data) {
                            $('.imageLinkContainer').html(data);
                            $('.imageLinkContainer').fadeIn();
                            $('.loaderHook').removeClass('loader');
                            if(!$('.infoContainerLink').hasClass('hidden')) {
                                $('.infoContainerLink').addClass('hidden');
                                $('.imageContainer').removeClass('hidden');
                            }

                            //update also images list in featured image
                            var urlFeaturedImage = $('form#addNewFeaturedImageDz').data('url');
                            $.ajax({
                                url: urlFeaturedImage,
                                data: {
                                    '_token': $('input[name=_token]').val(),
                                    'title' : 'reloadFeaturedImageContainer', 
                                },
                                success:function(data) {
                                    $('#featuredImageTab').html(data);
                                    if(!$('.infoContainer').hasClass('hidden')) {
                                        $('.infoContainer').addClass('hidden');
                                        $('.featuredImageDiv').removeClass('hidden');
                                    }

                                    //select featured image button
                                    $('.featuredImageLink').click(function(event) {
                                        var url = $(this).data('location');
                                        var name = $(this).data('name');
                                        var id = $(this).data('id');
                                        $('#featuredImageModal').modal('hide');
                                        $('.addFeaturedImageBtn').addClass('hidden');
                                        $('.addFeaturedImageContainer').removeClass('hidden');
                                        $('.addFeaturedImageContainer img').attr('src', url);
                                        $('.addFeaturedImageContainer img').attr('title', name);
                                        $('.addFeaturedImageContainer input').val(id);
                                    });

                                    //remove featured image button 
                                    $('.removeFeaturedImageBtn').click(function() {
                                        $('.addFeaturedImageBtn').removeClass('hidden');
                                        $('.addFeaturedImageContainer').addClass('hidden');
                                        $('.addFeaturedImageContainer img').attr('src', '');
                                        $('.addFeaturedImageContainer img').attr('title', '');
                                        $('.addFeaturedImageContainer input').val('');
                                    });
                                }
                            });
                        },
                        error:function(data) {
                            var errors = data.responseJSON.errors;
                            console.log(errors[data]);
                        }
                    });
                }
            });
        });


        // initiate tinymce
        tinymce.init({ 
            selector:'textarea',
            plugins: 'autosave image link lists preview',
            branding: false,
            min_height: 300,
            menubar:false,
            custom_ui_selector: '.imageReferencesBtn',
            mobile: {
                theme: 'mobile',
                plugins: [ 'autosave', 'image', 'link', 'lists', 'preview' ],
                menubar: false
                },
        });


		//open the images links reference
		$('.imageReferencesBtn').click(function() {
			$('.imageReferences').toggleClass('hidden');
		});


		//pagination for image link
		$(function() {
            $('body').on('click', '.pagination a', function(e) {
                e.preventDefault();
                var url =$(this).attr('href');
                if(url.search("imagelink") > -1) {
                    paginationImageLink(url);    
                }

                if(url.search('featuredimagepage') > -1) {
                    paginationFeaturedImage(url);
                }
                window.history.pushState("", "", url);
            });
        });


        //function for blog pagination
        function paginationImageLink(url) {
            $.ajax({
                url: url,
                data:{
                	'title': 'imagelink',
                },
                beforeSend: function () {
                    $('.loaderHook').addClass('loader');
                    $('.imageLinkContainer').fadeOut();    
                },
                success: function(data) {
                    $('.imageLinkContainer').html(data);
                    $('.imageLinkContainer').fadeIn();
                    $('.loaderHook').removeClass('loader');
                },
            });
        }

        //function for pagination featured image
        function paginationFeaturedImage(url) {
            $.ajax({
                url: url,
                data:{
                    'title': 'featuredimagepage',
                },
                beforeSend: function () {
                    $('.loaderHookFeaturedImage').addClass('loader');
                    $('.featuredImageContainer').fadeOut();    
                },
                success: function(data) {
                    $('#featuredImageTab').html(data);
                    $('.featuredImageContainer').fadeIn();
                    $('.loaderHookFeaturedImage').removeClass('loader');

                    //select featured image button
                    $('.featuredImageLink').click(function(event) {
                        var url = $(this).data('location');
                        var name = $(this).data('name');
                        var id = $(this).data('id');
                        $('#featuredImageModal').modal('hide');
                        $('.addFeaturedImageBtn').addClass('hidden');
                        $('.addFeaturedImageContainer').removeClass('hidden');
                        $('.addFeaturedImageContainer img').attr('src', url);
                        $('.addFeaturedImageContainer img').attr('title', name);
                        $('.addFeaturedImageContainer input').val(id);
                    });


                    //remove featured image button 
                    $('.removeFeaturedImageBtn').click(function() {
                        $('.addFeaturedImageBtn').removeClass('hidden');
                        $('.addFeaturedImageContainer').addClass('hidden');
                        $('.addFeaturedImageContainer img').attr('src', '');
                        $('.addFeaturedImageContainer img').attr('title', '');
                        $('.addFeaturedImageContainer input').val('');
                    });
                },
            });
        }


        //function to remove tag
        function removeTag(tags) {
            $('.removeTagBtn').click(function() {
                val = $(this).data('val');
                $(this).parents('li').remove();
                tags.splice(tags.indexOf(val),1);
                return tags;
            });
        }


        //filter the input for tag so there is no duplicate entry
        function unique(data){
            return $.grep(data, function(el, index) {
                return index === $.inArray(el, data);
            });
        }

        var tags = [];

        $('.addTagBtn').click(function() {
            $('.tagContainer ul').empty();
            
            var data = $('.tagInput input').val();
            $('.tagInput input').val('');
            tag = $.map(data.split(','), $.trim);
            tags = tags.concat(tag);
            tags = unique(tags);

            $.each(tags, function(key, val) {
                if(val !== "" && val.length > 1) {
                    //set the input value
                    $('.tagContainer ul').append("<li class=''><span><input type='hidden' name='tag[" + val + "]' value='" + val + "'><a href='javascript:' class='removeTagBtn' data-tags='" + val + "'><i class='fa fa-close'></i></a></span>&nbsp;" + val + "</li>");
                }
            });
            removeTag(tags);
        });

        //automatically populate slug from title
        $('#title').on('keyup blur', function () {
            var val = $(this).val();
            val = $.trim(val);
            val = val.replace(/\s+/g, '-').toLowerCase();
            $('#slug').val(val);
        });

	});
</script>