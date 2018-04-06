{{-- tinymce javascript --}}
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script>
    Dropzone.autoDiscover = false;
</script>
<script>
	$(document).ready(function() {
		//automatically populate slug from title
        $('#name').on('keyup blur', function () {
            var val = $(this).val();
            val = $.trim(val);
            val = val.replace(/\s+/g, '-').toLowerCase();
            $('#slug').val(val);
        });

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
                        },
                        error:function(data) {
                            var errors = data.responseJSON.errors;
                            console.log(errors[data]);
                        }
                    });

                    //reload also image in image link for description
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

                    //reload also image in gallery image
                    var urlGalleryImageLink = $('form#addNewGalleryImageDz').data('url');

                    $.ajax({
                        url: urlGalleryImageLink,
                        data: {
                            '_token' : $('input[name=_token]').val(),
                            'title' : 'reloadGalleryImageContainer',
                        },
                        success: function(data) {
                            $('#galleryImagesTab').html(data);
                            $('.galleryImagesContainer').fadeIn();
                            $('.loaderHookGalleryImages').removeClass('loader');

                            //add capability to choose gallery image
                            chooseGalleryImages();
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


        //set dropzone for uploading new image into database (gallery image)
        $('.addGalleryImageBtn a').click(function(event) {
            //initiate dropzone
            $('form#addNewGalleryImageDz').dropzone({
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
                    $('#galleryImagesTab').addClass('active in');
                    $('#galleryImagesList').addClass('active');
                    $('#uploadGalleryImagesTab').removeClass('active in');
                    $('#uploadGalleryImagesList').removeClass('active');
                    this.removeAllFiles();
                    var url = $('form#addNewGalleryImageDz').data('url');
                    $.ajax({
                        url: url,
                        data: {
                            '_token' : $('input[name=_token]').val(),
                            'title' : 'reloadGalleryImageContainer',
                        },
                        beforeSend: function () {
                            $('.loaderHookGalleryImages').addClass('loader');
                            $('.galleryImagesContainer').fadeOut();    
                        },
                        success: function(data) {
                            $('#galleryImagesTab').html(data);
                            $('.galleryImagesContainer').fadeIn();
                            $('.loaderHookGalleryImages').removeClass('loader');

                            //add capability to choose gallery image
                            chooseGalleryImages();
                        },
                        error:function(data) {
                            var errors = data.responseJSON.errors;
                            console.log(errors[data]);
                        }
                    });

                    //reload also image in featured image
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

                    //reload also image in image link for description
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
                }
            });
        });
        
        //call choose gallery images function
        chooseGalleryImages();

        function chooseGalleryImages() {
            //select gallery image button
            $('.galleryImagesLink').click(function(event) {
                $(this).parent().toggleClass('pickedImage');
            });

            //add gallery button
            $('.addGalleryBtn').click(function() {
                $('#galleryImageModal').modal('hide');

                if($('.galleryImageReps').length && $('.addGalleryImageContainer').hasClass('hidden')) {
                    $('.addGalleryImageContainer').removeClass('hidden');
                }

                if(!$('.galleryImageReps').length) {
                    $('.addGalleryImageContainer').removeClass('hidden');
                }
                
                //loop each pick image gallery
                $('.pickedImage').each(function() {
                    var id = $(this).children('a').data('id');
                    var location = $(this).children('a').data('location');
                    var name = $(this).children('a').data('name');
                    var picked = $(this);

                    if($('.galleryImageReps').length) {
                        $('.galleryImageReps').each(function() {
                            if($(this).data('id') == id ) {
                               picked.addClass('doubleData');
                            }
                        });
                    } 
                   
                    if(!$('.galleryImageReps').length || !$(this).hasClass('doubleData')) {
                        $('.addGalleryImageContainer').append('<div class="col-xs-6"><div class="thumbnail imageHolder"><img src="' + location + '" title="' + name + '" class="img-responsive galleryImageReps" data-id="' + id + '"><a class="btn-sm btn-default removeGalleryImageBtn removeBtn"><i class="fa fa-close"></i></a></div><input type="hidden" name="galleryimage[' + id + ']" class="galleryImageInput" value="' + id +'"></div>');
                    }

                    //remove the pickedImage class
                    $(this).removeClass('pickedImage');

                });

                //add remove gallery image function
                removeGalleryImage();

            });
        }

        function removeGalleryImage() {
            //remove gallery image
            $('.removeGalleryImageBtn').click(function() {
                $(this).parents('.col-xs-6').remove();
            });
        }

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
                plugins: [ 'autosave', 'image', 'link', 'lists preview' ],
                menubar: false
                },
        });

        //open the images links reference
		$('.imageReferencesBtn').click(function() {
			$('.imageReferences').toggleClass('hidden');
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
                        },
                        error:function(data) {
                            var errors = data.responseJSON.errors;
                            console.log(errors[data]);
                        }
                    });

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

                    //reload also image in gallery image
                    var urlGalleryImageLink = $('form#addNewGalleryImageDz').data('url');

                    $.ajax({
                        url: urlGalleryImageLink,
                        data: {
                            '_token' : $('input[name=_token]').val(),
                            'title' : 'reloadGalleryImageContainer',
                        },
                        success: function(data) {
                            $('#galleryImagesTab').html(data);
                            $('.galleryImagesContainer').fadeIn();
                            $('.loaderHookGalleryImages').removeClass('loader');

                            //add capability to choose gallery image
                            chooseGalleryImages();
                        }
                    });
                }
            });
        });

		//pagination for image link
		$(function() {
            $('body').on('click', '.pagination a', function(e) {
                e.preventDefault();
                var url =$(this).attr('href');
                if(url.search("imagelinkpage") > -1) {
                    paginationImageLink(url);    
                }

                if(url.search('featuredimagepage') > -1) {
                    paginationFeaturedImage(url);
                }

                if(url.search('galleryimagepage') > -1) {
                    paginationGalleryImage(url);
                }
                window.history.pushState("", "", url);
            });
        });


        //function for featuredimage pagination
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

        //function for featuredimage pagination
        function paginationGalleryImage(url) {
            $.ajax({
                url: url,
                data:{
                    'title': 'galleryimagepage',
                },
                beforeSend: function () {
                    $('.loaderHookGalleryImages').addClass('loader');
                    $('.galleryImagesContainer').fadeOut();    
                },
                success: function(data) {
                    $('#galleryImagesTab').html(data);
                    $('.galleryImagesContainer').fadeIn();
                    $('.loaderHookGalleryImages').removeClass('loader');

                    //choose gallery image
                    chooseGalleryImages();
                },
            });
        }

        //function for imagelink pagination
        function paginationImageLink(url) {
            $.ajax({
                url: url,
                data:{
                	'title': 'imagelinkpage',
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

		//if there is change in sale
        $('#sale_checkbox').change(function() {
            $('.saleContainer').toggleClass('hidden');
            if($('.saleContainer').hasClass('hidden')) {
                $('#startDate').val('');
                $('#endDate').val('');
                $('#sale_price').val('');

                //remove required for the price
                $('#sale_price').prop('required', false);

                //set the is_sale value
                $('#is_sale').val('0');
            }

            if(!$('.saleContainer').hasClass('hidden')) {

                //add required for the price
                $('#sale_price').prop('required', true);

                //show startdate picker
                $('#startDate').datepicker({
                    autoclose: true,
                });

                //show enddate datepicker
                $('#endDate').datepicker({
                    autoclose: true,
                });

                //set the is_sale value 
                $('#is_sale').val('1');
            }
        });

        //check if sale has error
        if($('.saleContainer').find('.form-group').hasClass('has-error')) {
            $('.saleContainer').removeClass('hidden');
            $('#sale_checkbox').prop('checked', true);
        }

        //always make sure if the sale in appropriate condition
        if(!$('.saleContainer').hasClass('hidden')) {
            $('#sale_checkbox').prop('checked', true);

            $('#is_sale').val('1');
            //show startdate picker
            $('#startDate').datepicker({
                autoclose: true,
            });

            //show enddate datepicker
            $('#endDate').datepicker({
                autoclose: true,
            });
        }
        if($('.saleContainer').hasClass('hidden')) {
            $('#sale_checkbox').prop('checked', false);
            $('#is_sale').val('0');
            $('#startDate').val('');
            $('#endDate').val('');
            $('#sale_price').val('');
        }
	});
</script>