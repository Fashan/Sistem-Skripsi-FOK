function deleteuser(idx) {
	var id = idx;

	if (confirm('apakah data user ingin dihapus?')) {
		$.ajax({
			url: base_url + 'user/deleteuser',
			type: 'post',
			data: 'id=' + id,
			dataType: "json",
			success: function (response) {
				if (response.status == 'success') {
					userTable.ajax.reload(null, false);
				}
			}

		})
	}


}

var addUser = (function () {
	$('#form-adduser').on('submit', function (e) {
		e.preventDefault();

		$.ajax({
			url: base_url + 'user/adduser',
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			success: function (response) {
				console.log(response);
				if (response.status == 'success') {
					$('div.pesan').html(response.message);
					$('div#modal-adduser').modal('hide');
					$('#form-adduser').each(function () {
						this.reset();
					});
					userTable.ajax.reload(null, false);
				}
			}
		});
	});
})();

function get_pa(pa_id = 0) {
	var form = '';
	$.ajax({
		url: base_url + 'user/get_pa',
		type: 'post',
		data: '',
		dataType: 'json',
		success: function (pa) {
			form += '<div id="opsi_pa" class="form-group">';
			form += '<label for="exampleFormControlSelect1">PA</label>';
			form += '<select class="form-control" name="pa_id">';
			form += '<option value="">pilih...</option>';
			for (let i = 0; i < pa.length; i++) {
				if (pa_id == pa[i].user_id) {
					form += '<option value="' + pa[i].user_id + '" selected>' + pa[i].nama + '</option>';

				} else {
					form += '<option value="' + pa[i].user_id + '">' + pa[i].nama + '</option>';
				}


			}
			form += '</select>';
			form += '  </div>';
			$('#menu_pa2').fadeIn('slow').html(form);
		}
	});
}


function getuser(idx) {
	var id = idx;
	$.ajax({
		url: base_url + 'user/getuser',
		type: 'post',
		data: 'id=' + id,
		dataType: 'json',
		success: function (response) {
			$('#user_id').val(response.user_id);
			$('#nama').val(response.nama);
			$('#username').val(response.username);
			$('#email').val(response.email);
			$('#prodi-menu').val(response.prodi_id);
			$('#jurusan-menu').val(response.jurusan_id);
			$('#menu_role2').val(response.role_id);
			var $option = $('#menu_role2').find(':selected');
			var name = $option.data('name');
			if (name == 'mahasiswa') {
				$('#opsi_pa').remove();
				get_pa(response.pa_id);
			} else {
				$('#opsi_pa').remove();
			}
			$('#modal-edituser').modal('show');

		}
	});
}

var editUser = (function () {
	$('#form-edituser').on('submit', function (e) {
		e.preventDefault();
		$.ajax({
			url: base_url + 'user/edituser',
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			success: function (response) {
				console.log(response);
				$('div.pesan').html(response.message);
				$('div#modal-edituser').modal('hide');
				userTable.ajax.reload(null, false);
			}
		});
	});
})();

var PA = (function () {
	$('#menu_pa1').hide();
	$('#menu_pa2').hide();
	var form = '';
	$('#menu_role1').change(function () {
		var $option = $(this).find(':selected');
		var name = $option.data('name');
		if (name == 'mahasiswa') {
			$.ajax({
				url: base_url + 'user/get_pa',
				type: 'post',
				data: '',
				dataType: 'json',
				success: function (pa) {
					form += '<div id="opsi_pa" class="form-group">';
					form += '<label for="exampleFormControlSelect1">PA</label>';
					form += '<select class="form-control" name="pa_id">';
					form += '<option value="">pilih...</option>';
					for (let i = 0; i < pa.length; i++) {
						form += '<option value="' + pa[i].user_id + '">' + pa[i].nama + '</option>';

					}
					form += '</select>';
					form += '  </div>';
					$('#menu_pa1').fadeIn('slow').html(form);
				}
			});

		} else {
			form = '';
			$('#menu_pa1').fadeOut('slow');
		}
	})


	$('#menu_role2').change(function () {
		var $option = $(this).find(':selected');
		var name = $option.data('name');
		if (name == 'mahasiswa') {
			get_pa();

		} else {
			form = '';
			$('#menu_pa2').fadeOut('slow');
		}
	})


})();

$('.btn').hover(function () {
	$(this).addClass('animate__animated');
	$(this).addClass('animate__pulse');
	$(this).addClass('animate__infinite');

}, function () {
	$(this).removeClass('animate__infinite');
});
