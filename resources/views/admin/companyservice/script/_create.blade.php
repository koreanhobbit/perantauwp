{{-- tinymce javascript --}}
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

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
	});
</script>