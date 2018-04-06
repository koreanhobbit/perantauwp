<script>
	$(document).ready(function() {
		//add more areas button
		$('.addAreaInput').click(function() {
			$('.formAreaInputContainer').append('<div class="row"><div class="col-sm-5"><div class="form-group"><label>Area Name</label><input type="text" name="" id="" class="form-control areaName"></div></div><div class="col-sm-5"><div class="form-group"><label for="">Area Slug</label><input type="text" name="" id="" class="form-control areaSlug"></div></div><div class="col-sm-2 text-center"><label for="deleteAreaBtn">Delete</label><a class="btn btn-sm btn-danger deleteAreaBtn"><span><i class="fa fa-trash-o"></i></span></a></div></div>');

			//call autoslug
			autoSlugArea();

			//call delete button
			deleteAreaBtn();
		});

		//function make slug automatically filled for area
		autoSlugArea();
		function autoSlugArea() {
			$('.formAreaInputContainer').children('.row').each(function() {
				var areaName = $(this).find('.areaName');
				var areaSlug = $(this).find('.areaSlug');
				areaName.on('keyup blur', function () {
		            var val = $(this).val();
		            val = $.trim(val);
		            val = val.replace(/\s+/g, '-').toLowerCase();
		            areaSlug.val(val);
		            areaName.prop('name', 'areaName[' + val + ']');
		            areaName.prop('id', 'areaName[' + val + ']');
		            areaSlug.prop('name', 'areaSlug[' + val + ']');
		            areaSlug.prop('id', 'areaSlug[' + val + ']');
		        });
			});
		}

		//function make slug automatically filled for country 
		autoSlugCountry();
		function autoSlugCountry() {
			$('#countryName').on('keyup blur', function () {
	            var val = $(this).val();
	            val = $.trim(val);
	            val = val.replace(/\s+/g, '-').toLowerCase();
	            $('#countrySlug').val(val);
	        });
		} 

		//function to delete unused area 
		deleteAreaBtn();
		function deleteAreaBtn() {
			$('.deleteAreaBtn').on('click', function() {
				$(this).parentsUntil('.formAreaInputContainer').remove();
			});
		}	
	});
</script>