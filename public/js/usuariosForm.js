$().ready(function() {

	$('#usuariosForm').validate({
		rules: {

			user_id: {

				required: true,
				maxlength: 5,
				minlength: 5,

			},

			user_nombre: {

				required: true,
				maxlength: 125,

			},

			user_apellido:{

				required: true,
				maxlength: 125,
			},

			user_cod_tel:{

				required: true,
				maxlength: 4,
			},

			user_tel:{

				required: true,
				maxlength: 7,
				minlength: 7,
			},

			user_ciudad:{

				required: true,
				maxlength: 60,
			},

			user_correo:{

				required: true,
				email:true,
				maxlength: 126,
			},

			user_direccion:{

				required: true,
				maxlength: 254,
			},

			user_nacionalidad:{

				required: true,
				maxlength: 1,
			},

			user_ced:{

				required: true,
				maxlength: 8,
				minlength: 8,
			},
		}

	});

});
              

 
           