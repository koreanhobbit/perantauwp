<script>
	Dropzone.options.fileDz = {
		paramName: "file",
		acceptedFiles: "application/pdf, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/x-rar-compressed, application/zip",
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
			window.location = "/manage/file";
		}
	};
</script>