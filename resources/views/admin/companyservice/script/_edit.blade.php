<script>
	$(document).ready(function() {
        //add point button
        $('.addPointBtn').click(function() {
            $('.pointContainer').append('<div class="row"><div class="col-xs-8"><div class="form-group"><label for="pointdesc">Description</label><input type="text" name="" id="" class="form-control pointdesc"></div></div><div class="col-xs-2"><div class="form-group"><label for="pointshow"></label><label class="checkbox"><input type="checkbox" name="" id="" checked="" class="pointshow">Show</label></div></div><div class="col-xs-2"><label for="deletePointRowBtn">Del</label><a class="btn btn-sm btn-danger deletePointRowBtn"><span><i class="fa fa-trash"></i></span></a></div><input type="hidden" name="" id="" class="pointslug"></div>');

            //call deletePointRow function
            deletePointRow();

            //call the autopoint name function
            autoPointName();
        });

        //make the name of the point id
        function autoPointName() {
            $('.pointContainer').children('.row').each(function() {
                var pointname = $(this).find('.pointdesc');
                var pointslug = $(this).find('.pointslug');
                var pointshow = $(this).find('.pointshow');

                pointname.on('keyup blur', function() {
                    var val = $(this).val();
                    val = $.trim(val);
                    val = val.replace(/\s+/g, '-').toLowerCase();
                    pointslug.val(val);
                    pointname.prop('name', 'pointdesc[' + val + ']');
                    pointname.prop('id', 'pointdesc[' + val + ']');
                    pointslug.prop('name', 'pointslug[' + val + ']');
                    pointslug.prop('id', 'pointslug[' + val + ']');
                    pointshow.prop('name', 'pointshow[' + val + ']');
                    pointshow.prop('id', 'pointshow[' + val + ']');
                });

            });
        }

        //function delete row for unused point
        function deletePointRow() {
            $('.deletePointRowBtn').click(function() {
                $(this).parentsUntil('.pointContainer').remove();
            });
        }
	});
</script>