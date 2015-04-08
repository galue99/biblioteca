$().ready(function() {

	$('#empleadoForm').validate({
		rules: {

			emp_nombre: {

				required: true,
				maxlength: 128,
			},

			emp_apellido: {

				required: true,
				maxlength: 126,

			},

			email: {

				required: true,
				maxlength: 126,
				email: true,

			},

			password: {

				required: true,
				minlength:6,
				maxlength:16,

			},

			estatus: {

				required: true,
				maxlength: 13,

			},


		}


	});


});