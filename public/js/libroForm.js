$().ready(function() {

	$('#libroForm').validate({
		rules: {

			libro_bar_id: {

				required: true,
				digits: true,
				minlength: 8,
				maxlength: 8,
				

			},

			libro_id: {

				required: true,
				digits: true,
				minlength: 5,
				maxlength: 5,
				

			},

			libro_nombre: {

				required: true,
				maxlength: 120,

			},

			aut_nombre:{

				required: true,

			},

			edit_nombre:{

				required: true,

			},

			catedra_nombre:{

				required: true,

			},

			fecha_creacion:{

				required: true,
				date: true,
			},

			cantidad:{

				required: true,
				digits: true,
				minlength: 1,
				maxlength: 3,
				
			},

			image_path:{

				required: true,
			},

			reseña:{

				required: true,
			}


		}


	});


});