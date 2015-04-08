$().ready(function() {

	$('#catedraForm').validate({
		rules: {

			cat_id: {

				required: true,
				minlength: 3,
				maxlength: 5,

			},

			cat_nombre: {

				required: true,
				maxlength: 120,

			}

		}


	});


});