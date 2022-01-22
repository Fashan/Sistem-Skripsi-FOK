


function deletejurusan(idx) {
	var id = idx;

	if (confirm('apakah data jurusan ingin dihapus?')) {
		$.ajax({
			url: base_url + 'jurusan/deletejurusan',
			type: 'post',
			data: 'id=' + id,
			dataType: "json",
			success: function (response) {
				if (response.status == 'success') {
					jurusanTable.ajax.reload(null, false);
				}
			}

		})
	}


}

var addJurusan = (
	function() {
		$('#form-addjurusan').on('submit', function (e) {
			e.preventDefault();
	
			$.ajax({
				url: base_url + 'jurusan/addjurusan',
				type: 'post',
				data: $(this).serialize(),
				dataType: 'json',
				success: function (response) {
					console.log(response);
					if (response.status =='success') {
					$('div.pesan').html(response.message);
					$('div#modal-addjurusan').modal('hide');
					$('#form-addjurusan').each(function () {
						this.reset();
					});
					jurusanTable.ajax.reload(null, false);
					}
				}
			});
		});
	}
)();

function getjurusan(idx) {
	var id = idx;
	$.ajax({
		url: base_url + 'jurusan/getjurusan',
		type: 'post',
		data: 'id=' + id,
		dataType: 'json',
		success: function (response) {
			$('#id_jurusan').val(response.id);
			$('#jurusan').val(response.nama_jurusan);
			$('#modal-editjurusan').modal('show');
		}
	});
}

var editJurusan = (
	function() {
		$('#form-editjurusan').on('submit', function (e) {
			e.preventDefault();;
			$.ajax({
				url: base_url + 'jurusan/editjurusan',
				type: 'post',
				data: $(this).serialize(),
				dataType: 'json',
				success: function (response) {
					$('div.pesan').html(response.message);
					$('div#modal-editjurusan').modal('hide');
					jurusanTable.ajax.reload(null, false);
				}
			});
		});
	}
)();

