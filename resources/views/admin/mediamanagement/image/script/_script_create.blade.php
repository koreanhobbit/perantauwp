<script>
	//setting dropzone
	Dropzone.options.addImage = {
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
            window.location = "/manage/image";
        }
	};	
</script>