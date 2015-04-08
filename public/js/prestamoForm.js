$().ready(function() {

	$('#prestamosForm').validate({
		rules: {

			prest_id: {

				required: true,
				minlength: 5,
				maxlength: 5,
				digits: true,

			},

			libro_bar_id: {

				required: true,
				maxlength: 8,
				minlength:8,
				digits: true,

			},

			user_id: {

				required: true,
				minlength: 5,
				maxlength: 5,
				digits: true,

			},

			fecha_salida: {

				required: true,
				maxlength: 10,
				minlength: 10,
				date: true,

			},

			fecha_devolucion: {

				required: true,
				minlength: 10,
				date: true,

			}

		}


	});


});