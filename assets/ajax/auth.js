 // Detect browser for css purpose
 function detectbrowser() {
 	if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
 		$('.form form label').addClass('fontSwitch');
 	}
 }


 // Label effect
 function labeleffect() {
 	$('input').focus(function () {

 		$(this).siblings('label').addClass('active');
 	});
 }



 //form validation
 var formValidationlogin = (function() {

	$('input').blur(function () {

		// User Name
		if ($(this).hasClass('email')) {
		   
			if ($(this).val().length === 0) {
				$(this).addClass('is-invalid');
				$(this).siblings('div.invalid-feedback').text('kolom Email wajib diisi').fadeIn();

			} else {
			   $(this).removeClass('is-invalid');
			   $(this).addClass('is-valid');
				$(this).siblings('div.invalid-feedback').text('').fadeOut();

			}
		}

		// PassWord
		if ($(this).hasClass('password')) {
			if ($(this).val().length == '') {
			   $(this).addClass('is-invalid');
			   $(this).siblings('div.invalid-feedback').text('kolom Password wajib diisi').fadeIn();
			} else {
			   $(this).removeClass('is-invalid');
			   $(this).addClass('is-valid');
				$(this).siblings('div.invalid-feedback').text('').fadeOut();
			}
		}

		// label effect
		if ($(this).val().length > 0) {
			$(this).siblings('label').addClass('active');
		} else {
			$(this).siblings('label').removeClass('active');
		}
	});
})();


 //form validation
 function formvalidation_reg() {
 	$('input').blur(function () {

 		// User Name
 		if ($(this).hasClass('name')) {
 			if ($(this).val().length === 0) {
 				$(this).siblings('span.error').text('kolom Username wajib diisi').fadeIn().parent('.form-group').addClass('hasError');
 			} else if ($(this).val().length > 1 && $(this).val().length <= 6) {
 				$(this).siblings('span.error').text('Please type at least 6 characters').fadeIn().parent('.form-group').addClass('hasError');
 			} else {
 				$(this).siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
 			}
 		}
 		// Email
 		if ($(this).hasClass('email')) {
 			if ($(this).val().length == '') {
 				$(this).siblings('span.error').text('kolom Email wajib diisi').fadeIn().parent('.form-group').addClass('hasError');
 			} else {
 				$(this).siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
 			}
 		}

 		// PassWord
 		if ($(this).hasClass('pass')) {
 			if ($(this).val().length < 8) {
 				$(this).siblings('span.error').text('minimal 8 karakter').fadeIn().parent('.form-group').addClass('hasError');
 				// passwordError = true;
 			} else {
 				$(this).siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
 				// passwordError = false;
 			}
 		}

 		// PassWord confirmation
 		if ($('.pass').val() !== $('.passConfirm').val()) {
 			$('.passConfirm').siblings('.error').text('kolom Confirm Password tidak sama').fadeIn().parent('.form-group').addClass('hasError');
 			// passConfirm = false;
 		} else {
 			$('.passConfirm').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
 			// passConfirm = false;
 		}

 		// label effect
 		if ($(this).val().length > 0) {
 			$(this).siblings('label').addClass('active');
 		} else {
 			$(this).siblings('label').removeClass('active');
 		}
 	});

 	$('select').blur(function () {
 		if ($(this).hasClass('desa')) {
 			if ($(this).val().length == '') {
 				$(this).siblings('span.error').text('Mohon memilih Desa').fadeIn().parent('.form-group').addClass('hasError');
 			} else {
 				$(this).siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
 			}
 		}

 	});
 }

 // form switch
 function formswitch() {
 	$('a.switch').click(function (e) {
 		$(this).toggleClass('active');
 		e.preventDefault();

 		if ($('a.switch').hasClass('active')) {
 			$(this).parents('.form-peice').addClass('switched').siblings('.form-peice').removeClass('switched');
 		} else {
 			$(this).parents('.form-peice').removeClass('switched').siblings('.form-peice').addClass('switched');
 		}
 	});
 }





 //ajax signup
 function signup() {

 	$(".signup-form").on('submit', function (e) {
 		e.preventDefault();
 		$.ajax({
 			url: $(this).attr('action'),
 			type: 'post',
 			dataType: 'json',
 			data: $(this).serialize(),
 			success: function (response) {
 				if (response.status == 'success') {
 					console.log(response);
 					$('.signup, .login').addClass('switched');

 					setTimeout(function () {
 						$('.signup, .login').hide();
 					}, 700);
 					setTimeout(function () {
 						$('.brand').addClass('active');
 					}, 300);
 					setTimeout(function () {
 						$('.heading').addClass('active');
 					}, 600);
 					setTimeout(function () {
 						$('.success-msg p').addClass('active');
 					}, 900);
 					setTimeout(function () {
 						$('.success-msg a').addClass('active');
 					}, 1050);
 					setTimeout(function () {
 						$('.form').hide();
 					}, 700);

 				} else {
 					if (response.message.nama) {
 						$('input.name').siblings('span.error').text(response.message.nama).fadeIn().parent('.form-group').addClass('hasError');

 					}
 					if (response.message.email) {
 						$('input.email').siblings('span.error').text(response.message.email).fadeIn().parent('.form-group').addClass('hasError');

 					}

 					if (response.message.desa) {
 						$('select.desa').siblings('span.error').text(response.message.desa).fadeIn().parent('.form-group').addClass('hasError');

 					}

 					if (response.message.password) {
 						$('input.pass').siblings('span.error').text(response.message.password).fadeIn().parent('.form-group').addClass('hasError');

 					}

 					if (response.message.password2) {
 						$('input.passConfirm').siblings('span.error').text(response.message.password2).fadeIn().parent('.form-group').addClass('hasError');

 					}


 				}





 			}
 		});
 	});
 }


 //ajax login
var login = ( function(){
	 
	$(".login-form").on('submit', function (e) {
		e.preventDefault();
		$.ajax({
			url: $(this).attr('action'),
			type: 'post',
			dataType: 'json',
			data: $(this).serialize(),
			success: function (response) {
				if (response.status == 'success') {
					location.href = response.url;
				} else {
					if (response.message.email) {
					   $('input.email').addClass('is-invalid');
					   $('input.email').siblings('div.invalid-feedback').text(response.message.email).fadeIn();
					}

					if (response.message.password) {
					   $('input.password').addClass('is-invalid');
					   $('input.password').siblings('div.invalid-feedback').text(response.message.password).fadeIn();

					}

					if (response.message.password_salah) {
						$('div.message').html(response.message.password_salah);
					}

					if (response.message.notregister) {
						$('div.message').html(response.message.notregister);
					}



				}





			}
		});
	});
})();



 // Reload page
 function reloadpage() {
 	$('a.profile').on('click', function () {
 		location.reload(true);
 	});
 }

