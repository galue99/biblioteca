$().ready(function() {

	$('#autorForm').validate({
		rules: {

			aut_id: {

				required: true,
				minlength: 5,
				maxlength: 5,

			},

			aut_nombre: {

				required: true,
				maxlength: 120,

			}

		}


	});


});