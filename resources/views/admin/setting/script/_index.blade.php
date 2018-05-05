{{-- tinymce javascript --}}
<script src="{{ asset('js/vendor/tinymce/jquery.tinymce.min.js') }}"></script>
<script src="{{ asset('js/vendor/tinymce/tinymce.min.js') }}"></script>

<script>
    Dropzone.autoDiscover = false;
</script>
<script>
	$(document).ready(function() {
		// initiate tinymce
        tinymce.init({ 
            selector:'textarea',
            plugins: 'autosave link lists preview',
            branding: false,
            min_height: 300,
            menubar:false,
            mobile: {
                theme: 'mobile',
                plugins: [ 'autosave', 'link', 'lists', 'preview' ],
                menubar: false
            },
        });

        //click logo image
        $('.changeLogoBtn').click(function() {
        	//initiate dropzone
        	$('form#addNewLogoDz').dropzone({
        		paramName: 'image',
        		acceptedFiles: 'image/*',
        		maxFilesize:3,
        		init: function() {
        			thisDropzone = this;
        			this.on('error', function(file, responseText) {
        				$.each(responseText, function(index, value) {
        					$('.dz-error-message').text(value);
        				});
        			});
        		},
        		uploadMultiple: true,
        		successmultiple: function(file, response) {
        			$('#logoTab').addClass('active in');
                    $('#logoList').addClass('active');
                    $('#uploadLogoTab').removeClass('active in');
                    $('#uploadLogoList').removeClass('active');
                    this.removeAllFiles();

                    var url = $('form#addNewLogoDz').data('url');
                    $.ajax({
                        url: url,
                        data: {
                            '_token' : $('input[name=_token]').val(),
                            'title' : 'logoImagePage',
                        },
                        beforeSend: function () {
                            $('.loaderHookLogo').addClass('loader');
                            $('.logoContainer').fadeOut();    
                        },
                        success: function(data) {
                            $('#logoTab').html(data);
                            $('.logoContainer').fadeIn();
                            $('.loaderHookLogo').removeClass('loader');

                             //select featured image button
                            $('.logoLink').click(function(event) {
                                var url = $(this).data('location');
                                var name = $(this).data('name');
                                var id = $(this).data('id');
                                $('#logoModal').modal('hide');
                                $('.changeLogoBtn img').attr('src', url);
                                $('.changeLogoBtn img').attr('title', name);
                                $('.changeLogoBtn input').val(id);
                            });
                        },
                        error:function(data) {
                            var errors = data.responseJSON.errors;
                            console.log(errors[data]);
                        }
                    });

                    //also reload for icon images
                    var urlIcon = $('form#addNewIconDz').data('url');
                    $.ajax({
                        url: urlIcon,
                        data: {
                            '_token' : $('input[name=_token]').val(),
                            'title' : 'iconImagePage',
                        },
                        beforeSend: function () {
                            $('.loaderHookIcon').addClass('loader');
                            $('.iconContainer').fadeOut();    
                        },
                        success: function(data) {
                            $('#iconTab').html(data);
                            $('.iconContainer').fadeIn();
                            $('.loaderHookIcon').removeClass('loader');

                             //select featured image button
                            $('.iconLink').click(function(event) {
                                var url = $(this).data('location');
                                var name = $(this).data('name');
                                var id = $(this).data('id');
                                $('#iconModal').modal('hide');
                                $('.changeIconBtn img').attr('src', url);
                                $('.changeIconBtn img').attr('title', name);
                                $('.changeIconBtn input').val(id);
                            });
                        },
                        error:function(data) {
                            var errors = data.responseJSON.errors;
                            console.log(errors[data]);
                        }
                    });


                    //also reload for background image 1
                    var urlBgImage1 = $('form#addNewBgImage1Dz').data('url');
                    $.ajax({
                        url: urlBgImage1,
                        data: {
                            '_token' : $('input[name=_token]').val(),
                            'title' : 'bgImage1Page',
                        },
                        beforeSend: function () {
                            $('.loaderHookBgImage1').addClass('loader');
                            $('.bgImage1Container').fadeOut();    
                        },
                        success: function(data) {
                            $('#bgImage1Tab').html(data);
                            $('.bgImage1Container').fadeIn();
                            $('.loaderHookBgImage1').removeClass('loader');

                             //select background image 1 button
                            $('.bgImage1Link').click(function(event) {
                                var url = $(this).data('location');
                                var name = $(this).data('name');
                                var id = $(this).data('id');
                                $('#bgImage1Modal').modal('hide');
                                $('.bgImage1Btn img').attr('src', url);
                                $('.bgImage1Btn img').attr('title', name);
                                $('.bgImage1Btn input').val(id);
                            });
                        },
                        error:function(data) {
                            var errors = data.responseJSON.errors;
                            console.log(errors[data]);
                        }
                    });


                    //also reload for background image 2 images
                    var urlBgImage2 = $('form#addNewBgImage2Dz').data('url');
                    $.ajax({
                        url: urlBgImage2,
                        data: {
                            '_token' : $('input[name=_token]').val(),
                            'title' : 'bgImage2Page',
                        },
                        beforeSend: function () {
                            $('.loaderHookBgImage2').addClass('loader');
                            $('.bgImage2Container').fadeOut();    
                        },
                        success: function(data) {
                            $('#bgImage2Tab').html(data);
                            $('.bgImage2Container').fadeIn();
                            $('.loaderHookBgImage2').removeClass('loader');

                             //select background image 2 button
                            $('.bgImage2Link').click(function(event) {
                                var url = $(this).data('location');
                                var name = $(this).data('name');
                                var id = $(this).data('id');
                                $('#bgImage2Modal').modal('hide');
                                $('.bgImage2Btn img').attr('src', url);
                                $('.bgImage2Btn img').attr('title', name);
                                $('.bgImage2Btn input').val(id);
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
	    $('.logoLink').click(function(event) {
	        var url = $(this).data('location');
	        var name = $(this).data('name');
	        var id = $(this).data('id');
	        $('#logoModal').modal('hide');
	        $('.changeLogoBtn img').attr('src', url);
	        $('.changeLogoBtn img').attr('title', name);
	        $('.changeLogoBtn input').val(id);
	    });

	    //click icon image
        $('.changeIconBtn').click(function() {
        	//initiate dropzone
        	$('form#addNewIconDz').dropzone({
        		paramName: 'image',
        		acceptedFiles: 'image/*',
        		maxFilesize:3,
        		init: function() {
        			thisDropzone = this;
        			this.on('error', function(file, responseText) {
        				$.each(responseText, function(index, value) {
        					$('.dz-error-message').text(value);
        				});
        			});
        		},
        		uploadMultiple: true,
        		successmultiple: function(file, response) {
        			$('#iconTab').addClass('active in');
                    $('#iconList').addClass('active');
                    $('#uploadIconTab').removeClass('active in');
                    $('#uploadIconList').removeClass('active');
                    this.removeAllFiles();

                    var url = $('form#addNewIconDz').data('url');
                    $.ajax({
                        url: url,
                        data: {
                            '_token' : $('input[name=_token]').val(),
                            'title' : 'iconImagePage',
                        },
                        beforeSend: function () {
                            $('.loaderHookIcon').addClass('loader');
                            $('.iconContainer').fadeOut();    
                        },
                        success: function(data) {
                            $('#iconTab').html(data);
                            $('.iconContainer').fadeIn();
                            $('.loaderHookIcon').removeClass('loader');

                             //select icon image button
                            $('.iconLink').click(function(event) {
                                var url = $(this).data('location');
                                var name = $(this).data('name');
                                var id = $(this).data('id');
                                $('#iconModal').modal('hide');
                                $('.changeIconBtn img').attr('src', url);
                                $('.changeIconBtn img').attr('title', name);
                                $('.changeIconBtn input').val(id);
                            });
                        },
                        error:function(data) {
                            var errors = data.responseJSON.errors;
                            console.log(errors[data]);
                        }
                    });

                    //also reload for logo images
                    var urlLogo = $('form#addNewLogoDz').data('url');
                    $.ajax({
                        url: urlLogo,
                        data: {
                            '_token' : $('input[name=_token]').val(),
                            'title' : 'logoImagePage',
                        },
                        beforeSend: function () {
                            $('.loaderHookLogo').addClass('loader');
                            $('.logoContainer').fadeOut();    
                        },
                        success: function(data) {
                            $('#logoTab').html(data);
                            $('.logoContainer').fadeIn();
                            $('.loaderHookLogo').removeClass('loader');

                             //select logo image button
                            $('.logoLink').click(function(event) {
                                var url = $(this).data('location');
                                var name = $(this).data('name');
                                var id = $(this).data('id');
                                $('#logoModal').modal('hide');
                                $('.changeLogoBtn img').attr('src', url);
                                $('.changeLogoBtn img').attr('title', name);
                                $('.changeLogoBtn input').val(id);
                            });
                        },
                        error:function(data) {
                            var errors = data.responseJSON.errors;
                            console.log(errors[data]);
                        }
                    });

                    //also reload for background image 1
                    var urlBgImage1 = $('form#addNewBgImage1Dz').data('url');
                    $.ajax({
                        url: urlBgImage1,
                        data: {
                            '_token' : $('input[name=_token]').val(),
                            'title' : 'bgImage1Page',
                        },
                        beforeSend: function () {
                            $('.loaderHookBgImage1').addClass('loader');
                            $('.bgImage1Container').fadeOut();    
                        },
                        success: function(data) {
                            $('#bgImage1Tab').html(data);
                            $('.bgImage1Container').fadeIn();
                            $('.loaderHookBgImage1').removeClass('loader');

                             //select background image 1 button
                            $('.bgImage1Link').click(function(event) {
                                var url = $(this).data('location');
                                var name = $(this).data('name');
                                var id = $(this).data('id');
                                $('#bgImage1Modal').modal('hide');
                                $('.bgImage1Btn img').attr('src', url);
                                $('.bgImage1Btn img').attr('title', name);
                                $('.bgImage1Btn input').val(id);
                            });
                        },
                        error:function(data) {
                            var errors = data.responseJSON.errors;
                            console.log(errors[data]);
                        }
                    });


                    //also reload for background image 2 images
                    var urlBgImage2 = $('form#addNewBgImage2Dz').data('url');
                    $.ajax({
                        url: urlBgImage2,
                        data: {
                            '_token' : $('input[name=_token]').val(),
                            'title' : 'bgImage2Page',
                        },
                        beforeSend: function () {
                            $('.loaderHookBgImage2').addClass('loader');
                            $('.bgImage2Container').fadeOut();    
                        },
                        success: function(data) {
                            $('#bgImage2Tab').html(data);
                            $('.bgImage2Container').fadeIn();
                            $('.loaderHookBgImage2').removeClass('loader');

                             //select background image 2 button
                            $('.bgImage2Link').click(function(event) {
                                var url = $(this).data('location');
                                var name = $(this).data('name');
                                var id = $(this).data('id');
                                $('#bgImage2Modal').modal('hide');
                                $('.bgImage2Btn img').attr('src', url);
                                $('.bgImage2Btn img').attr('title', name);
                                $('.bgImage2Btn input').val(id);
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

		//select icon image button
        $('.iconLink').click(function(event) {
            var url = $(this).data('location');
            var name = $(this).data('name');
            var id = $(this).data('id');
            $('#iconModal').modal('hide');
            $('.changeIconBtn img').attr('src', url);
            $('.changeIconBtn img').attr('title', name);
            $('.changeIconBtn input').val(id);
        });


        //select background image 1 button
        $('.bgImage1Link').click(function(event) {
            var url = $(this).data('location');
            var name = $(this).data('name');
            var id = $(this).data('id');
            $('#bgImage1Modal').modal('hide');
            $('.bgImage1Btn img').attr('src', url);
            $('.bgImage1Btn img').attr('title', name);
            $('.bgImage1Btn input').val(id);
        });

        //change background image 1
        $('.bgImage1Btn').click(function() {
            //initiate dropzone
            $('form#addNewBgImage1Dz').dropzone({
                paramName: 'image',
                acceptedFiles: 'image/*',
                maxFilesize:3,
                init: function() {
                    thisDropzone = this;
                    this.on('error', function(file, responseText) {
                        $.each(responseText, function(index, value) {
                            $('.dz-error-message').text(value);
                        });
                    });
                },
                uploadMultiple: true,
                successmultiple: function(file, response) {
                    $('#bgImage1Tab').addClass('active in');
                    $('#bgImage1List').addClass('active');
                    $('#uploadBgImage1Tab').removeClass('active in');
                    $('#uploadBgImage1List').removeClass('active');
                    this.removeAllFiles();

                    var url = $('form#addNewBgImage1Dz').data('url');
                    $.ajax({
                        url: url,
                        data: {
                            '_token' : $('input[name=_token]').val(),
                            'title' : 'bgImage1Page',
                        },
                        beforeSend: function () {
                            $('.loaderHookBgImage1').addClass('loader');
                            $('.bgImage1Container').fadeOut();    
                        },
                        success: function(data) {
                            $('#bgImage1Tab').html(data);
                            $('.bgImage1Container').fadeIn();
                            $('.loaderHookBgImage1').removeClass('loader');

                             //select background image 1 button
                            $('.bgImage1Link').click(function(event) {
                                var url = $(this).data('location');
                                var name = $(this).data('name');
                                var id = $(this).data('id');
                                $('#bgImage1Modal').modal('hide');
                                $('.bgImage1Btn img').attr('src', url);
                                $('.bgImage1Btn img').attr('title', name);
                                $('.bgImage1Btn input').val(id);
                            });
                        },
                        error:function(data) {
                            var errors = data.responseJSON.errors;
                            console.log(errors[data]);
                        }
                    });

                    //also reload for background image 2 images
                    var urlBgImage2 = $('form#addNewBgImage2Dz').data('url');
                    $.ajax({
                        url: urlBgImage2,
                        data: {
                            '_token' : $('input[name=_token]').val(),
                            'title' : 'bgImage2Page',
                        },
                        beforeSend: function () {
                            $('.loaderHookBgImage2').addClass('loader');
                            $('.bgImage2Container').fadeOut();    
                        },
                        success: function(data) {
                            $('#bgImage2Tab').html(data);
                            $('.bgImage2Container').fadeIn();
                            $('.loaderHookBgImage2').removeClass('loader');

                             //select background image 2 button
                            $('.bgImage2Link').click(function(event) {
                                var url = $(this).data('location');
                                var name = $(this).data('name');
                                var id = $(this).data('id');
                                $('#bgImage2Modal').modal('hide');
                                $('.bgImage2Btn img').attr('src', url);
                                $('.bgImage2Btn img').attr('title', name);
                                $('.bgImage2Btn input').val(id);
                            });
                        },
                        error:function(data) {
                            var errors = data.responseJSON.errors;
                            console.log(errors[data]);
                        }
                    });


                    //also reload for logo images
                    var urlLogo = $('form#addNewLogoDz').data('url');
                    $.ajax({
                        url: urlLogo,
                        data: {
                            '_token' : $('input[name=_token]').val(),
                            'title' : 'logoImagePage',
                        },
                        beforeSend: function () {
                            $('.loaderHookLogo').addClass('loader');
                            $('.logoContainer').fadeOut();    
                        },
                        success: function(data) {
                            $('#logoTab').html(data);
                            $('.logoContainer').fadeIn();
                            $('.loaderHookLogo').removeClass('loader');

                             //select logo image button
                            $('.logoLink').click(function(event) {
                                var url = $(this).data('location');
                                var name = $(this).data('name');
                                var id = $(this).data('id');
                                $('#logoModal').modal('hide');
                                $('.changeLogoBtn img').attr('src', url);
                                $('.changeLogoBtn img').attr('title', name);
                                $('.changeLogoBtn input').val(id);
                            });
                        },
                        error:function(data) {
                            var errors = data.responseJSON.errors;
                            console.log(errors[data]);
                        }
                    });

                    //also reload for icon images
                    var urlIcon = $('form#addNewIconDz').data('url');
                    $.ajax({
                        url: urlIcon,
                        data: {
                            '_token' : $('input[name=_token]').val(),
                            'title' : 'iconImagePage',
                        },
                        beforeSend: function () {
                            $('.loaderHookIcon').addClass('loader');
                            $('.iconContainer').fadeOut();    
                        },
                        success: function(data) {
                            $('#iconTab').html(data);
                            $('.iconContainer').fadeIn();
                            $('.loaderHookIcon').removeClass('loader');

                             //select featured image button
                            $('.iconLink').click(function(event) {
                                var url = $(this).data('location');
                                var name = $(this).data('name');
                                var id = $(this).data('id');
                                $('#iconModal').modal('hide');
                                $('.changeIconBtn img').attr('src', url);
                                $('.changeIconBtn img').attr('title', name);
                                $('.changeIconBtn input').val(id);
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


        //select background image 2 button
        $('.bgImage2Link').click(function(event) {
            var url = $(this).data('location');
            var name = $(this).data('name');
            var id = $(this).data('id');
            $('#bgImage2Modal').modal('hide');
            $('.bgImage2Btn img').attr('src', url);
            $('.bgImage2Btn img').attr('title', name);
            $('.bgImage2Btn input').val(id);
        });

        //change background image 2
        $('.bgImage2Btn').click(function() {
            //initiate dropzone
            $('form#addNewBgImage2Dz').dropzone({
                paramName: 'image',
                acceptedFiles: 'image/*',
                maxFilesize:3,
                init: function() {
                    thisDropzone = this;
                    this.on('error', function(file, responseText) {
                        $.each(responseText, function(index, value) {
                            $('.dz-error-message').text(value);
                        });
                    });
                },
                uploadMultiple: true,
                successmultiple: function(file, response) {
                    $('#bgImage2Tab').addClass('active in');
                    $('#bgImage2List').addClass('active');
                    $('#uploadBgImage2Tab').removeClass('active in');
                    $('#uploadBgImage2List').removeClass('active');
                    this.removeAllFiles();

                    var url = $('form#addNewBgImage2Dz').data('url');
                    $.ajax({
                        url: url,
                        data: {
                            '_token' : $('input[name=_token]').val(),
                            'title' : 'bgImage2Page',
                        },
                        beforeSend: function () {
                            $('.loaderHookBgImage1').addClass('loader');
                            $('.bgImage2Container').fadeOut();    
                        },
                        success: function(data) {
                            $('#bgImage2Tab').html(data);
                            $('.bgImage2Container').fadeIn();
                            $('.loaderHookBgImage2').removeClass('loader');

                             //select background image 2 button
                            $('.bgImage2Link').click(function(event) {
                                var url = $(this).data('location');
                                var name = $(this).data('name');
                                var id = $(this).data('id');
                                $('#bgImage2Modal').modal('hide');
                                $('.bgImage2Btn img').attr('src', url);
                                $('.bgImage2Btn img').attr('title', name);
                                $('.bgImage2Btn input').val(id);
                            });
                        },
                        error:function(data) {
                            var errors = data.responseJSON.errors;
                            console.log(errors[data]);
                        }
                    });

                    //also reload for background image 1
                    var urlBgImage1 = $('form#addNewBgImage1Dz').data('url');
                    $.ajax({
                        url: urlBgImage1,
                        data: {
                            '_token' : $('input[name=_token]').val(),
                            'title' : 'bgImage1Page',
                        },
                        beforeSend: function () {
                            $('.loaderHookBgImage1').addClass('loader');
                            $('.bgImage1Container').fadeOut();    
                        },
                        success: function(data) {
                            $('#bgImage1Tab').html(data);
                            $('.bgImage1Container').fadeIn();
                            $('.loaderHookBgImage1').removeClass('loader');

                             //select background image 1 button
                            $('.bgImage1Link').click(function(event) {
                                var url = $(this).data('location');
                                var name = $(this).data('name');
                                var id = $(this).data('id');
                                $('#bgImage1Modal').modal('hide');
                                $('.bgImage1Btn img').attr('src', url);
                                $('.bgImage1Btn img').attr('title', name);
                                $('.bgImage1Btn input').val(id);
                            });
                        },
                        error:function(data) {
                            var errors = data.responseJSON.errors;
                            console.log(errors[data]);
                        }
                    });


                    //also reload for logo images
                    var urlLogo = $('form#addNewLogoDz').data('url');
                    $.ajax({
                        url: urlLogo,
                        data: {
                            '_token' : $('input[name=_token]').val(),
                            'title' : 'logoImagePage',
                        },
                        beforeSend: function () {
                            $('.loaderHookLogo').addClass('loader');
                            $('.logoContainer').fadeOut();    
                        },
                        success: function(data) {
                            $('#logoTab').html(data);
                            $('.logoContainer').fadeIn();
                            $('.loaderHookLogo').removeClass('loader');

                             //select logo image button
                            $('.logoLink').click(function(event) {
                                var url = $(this).data('location');
                                var name = $(this).data('name');
                                var id = $(this).data('id');
                                $('#logoModal').modal('hide');
                                $('.changeLogoBtn img').attr('src', url);
                                $('.changeLogoBtn img').attr('title', name);
                                $('.changeLogoBtn input').val(id);
                            });
                        },
                        error:function(data) {
                            var errors = data.responseJSON.errors;
                            console.log(errors[data]);
                        }
                    });

                    //also reload for icon images
                    var urlIcon = $('form#addNewIconDz').data('url');
                    $.ajax({
                        url: urlIcon,
                        data: {
                            '_token' : $('input[name=_token]').val(),
                            'title' : 'iconImagePage',
                        },
                        beforeSend: function () {
                            $('.loaderHookIcon').addClass('loader');
                            $('.iconContainer').fadeOut();    
                        },
                        success: function(data) {
                            $('#iconTab').html(data);
                            $('.iconContainer').fadeIn();
                            $('.loaderHookIcon').removeClass('loader');

                             //select featured image button
                            $('.iconLink').click(function(event) {
                                var url = $(this).data('location');
                                var name = $(this).data('name');
                                var id = $(this).data('id');
                                $('#iconModal').modal('hide');
                                $('.changeIconBtn img').attr('src', url);
                                $('.changeIconBtn img').attr('title', name);
                                $('.changeIconBtn input').val(id);
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
	});
</script>