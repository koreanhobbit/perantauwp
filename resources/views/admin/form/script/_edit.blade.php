{{-- tinymce javascript --}}
<script src="{{ asset('js/vendor/tinymce/jquery.tinymce.min.js') }}"></script>
<script src="{{ asset('js/vendor/tinymce/tinymce.min.js') }}"></script>

<script>
	$(document).ready(function() {
		// initiate tinymce
        tinymce.init({ 
            selector:'textarea',
            plugins: 'autosave link lists preview code',
            branding: false,
            min_height: 1,
            toolbar: "code",
            menubar: "tools",
            mobile: {
                theme: 'mobile',
                plugins: [ 'autosave', 'link', 'lists', 'code', 'preview' ],
            },
        });
    });
</script>
<script>

    //activate change form name
    $('.activateName').click(function() {
        $("#name").prop("disabled", (_, val) => !val);
    });

    //sourcecode button
    $('.sourceCodeBtn').click(function() {
        $('.sourceCodeRow').toggleClass('hidden');
    });

    //add option row
    $('.addOptionBtn').click(function() {
        $('.optionRow').append('<div class="row"><div class="col-sm-6"><div class="form-group"><label for="optionname">Name</label><input type="text" class="form-control optionname" id="optionname" name="optionname"></div></div><div class="col-sm-6"><div class="form-group"><label for="optionvalue">Value</label><input type="text" class="form-control optionvalue" id="optionvalue" name="optionvalue"></div></div></div>');
    });

    //clear back modal to the original form
    $('#modalradio, #modalcheckbox, #modalselect').on('hidden.bs.modal', function() {
        $('.optionRow').html('<div class="row"><div class="col-sm-6"><div class="form-group"><label for="optionname">Name</label><input type="text" class="form-control optionname" id="optionname" name="optionname"></div></div><div class="col-sm-6"><div class="form-group"><label for="optionvalue">Value</label><input type="text" class="form-control optionvalue" id="optionvalue" name="optionvalue"></div></div></div>');
    });

    //put form part id in the modal
    $('.submitItemBtn').click(function() {
        modalId = $(this).data('target');
        $(modalId).find('.appendItemBtn').attr('data-id', $(this).data('id'));
    });
   
    //append form to proposed form
    $('.appendItemBtn').click(function() {
        var url = $(this).data('url');
        var id = $(this).data('id');
        var label = $(this).parents('.modal-body').find('#label').val();
        var type = $(this).parents('.modal-body').find('#type').val();
        var value = [];
        $(this).parents('.modal-body').find('.optionRow').children().each(function() {
            var optionname = $(this).find('.optionname').val();
            var optionvalue = $(this).find('.optionvalue').val();
            var optionrow = [optionname, optionvalue];
            value.push(optionrow);
        });
        $.ajax({
            url: url,
            type: 'get',
            data: {
                '_token' : $('input[name=_token]').val(),
                'title' : 'addItem',
                'id' : id,
                'label' : label,
                'type' : type,
                'option': value,
            },
            beforeSend: function() {
                $('.loaderHook').addClass('loader');
                $('.showcaseContainer').addClass('hidden');
            },
            success: function(data) {
                $('.loaderHook').removeClass('loader');
                $('.showcaseContainer').html(data);
                $('.showcaseContainer').removeClass('hidden');
            },
        })
    });
</script>