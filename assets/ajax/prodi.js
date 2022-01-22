


function deleteprodi(idx) {
	var id = idx;

	if (confirm('apakah data prodi ingin dihapus?')) {
		$.ajax({
			url: base_url + 'prodi/deleteprodi',
			type: 'post',
			data: 'id=' + id,
			dataType: "json",
			success: function (response) {
				if (response.status == 'success') {
					prodiTable.ajax.reload(null, false);
				}
			}

		})
	}


}

var addProdi = (function () {
	$('#form-addprodi').on('submit', function (e) {
		e.preventDefault();

		$.ajax({
			url: base_url + 'prodi/addprodi',
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			success: function (response) {
				console.log(response);
				if (response.status =='success') {
				$('div.pesan').html(response.message);
				$('div#modal-addprodi').modal('hide');
				$('#form-adduser').each(function () {
					this.reset();
				});
				prodiTable.ajax.reload(null, false);
				}
			}
		});
	});
})();

function getprodi(idx) {
	var id = idx;
	$.ajax({
		url: base_url + 'prodi/getprodi',
		type: 'post',
		data: 'id=' + id,
		dataType: 'json',
		success: function (response) {
			$('#id_prodi').val(response.id);
			$('#prodi').val(response.nama_prodi);
			$('#modal-editprodi').modal('show');
		}
	});
}

var editProdi = (function () {
	$('#form-editprodi').on('submit', function (e) {
		e.preventDefault();;
		$.ajax({
			url: base_url + 'prodi/editprodi',
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			success: function (response) {
				$('div.pesan').html(response.message);
				$('div#modal-editprodi').modal('hide');
				prodiTable.ajax.reload(null, false);
			}
		});
	});
}
)();
