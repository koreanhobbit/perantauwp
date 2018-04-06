<script>
	Dropzone.options.scannedfileForm = {
		paramName: "file",
		acceptedFiles: "application/pdf, image/*",
		maxFilesize:8,
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
			window.location = "/manage/scannedfile";
		}
	};
</script>