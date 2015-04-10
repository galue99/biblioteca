$().ready(function() {

	$('#editorForm').validate({
		rules: {

			edit_id: {

				required: true,
				minlength: 5,
				maxlength: 5,

			},

			edit_nombre: {

				required: true,
				maxlength: 120,

			}

		}


	});


});