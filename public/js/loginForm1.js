$().ready(function() {

	$('#loginform').validate({
		rules: {

			emailLogin: {

				required: true,
				email: true,
				maxlength: 120,

			},

			passwordLogin: {

				required: true,
				minlength: 6,
				maxlength: 16,

			}
		}

	});

});



              

 
           