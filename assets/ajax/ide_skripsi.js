function catatan(idx) {
	var id = idx;
	$.ajax({
		url: base_url + 'mahasiswa/get_catatan',
		type: 'post',
		data: 'id=' + id,
		dataType: "json",
		success: function (response) {
			$('#modal-catatan2').modal('show');
			if (response.catatan) {
				$('#catatan').text(response.catatan);
			} else {
				$('#catatan').text("tidak ada catatan");
			}

		}

	})
}

function deleteJudul(idx) {
	var id = idx;

	if (confirm('apakah Judul ingin dihapus?')) {
		$.ajax({
			url: base_url + 'mahasiswa/deletejudul',
			type: 'post',
			data: 'id=' + id,
			dataType: "json",
			success: function (response) {
				if (response.status == 'success') {
					ideskripsiTable.ajax.reload(null, false);
				}
			}

		})
	}


}

var editJudul = (function () {
	$('body').on('click', '.btn-edit', function () {
		let id = $(this).data('id'),
			name = $(this).data('judul'),
			abstrak = $(this).data('abstrak');
			file = $(this).data('file');

		$('#titleform-judul').text('Edit Judul Skripsi - ID#' + id);
		$('[name=id]').val(id);
		$('#judul').val(name).select();
		$('#abstrak').val(abstrak);
		$('#filename_ref').text(file);
		$('#btn-ajukan').text('Save');

		document.querySelector('#titleform-judul').scrollIntoView({
			behavior: 'smooth'
		});
	});

	$('body').on('click', '#clear-judul', function () {
		$('#titleform-judul').text('Ide Skripsi');
		$('#btn-ajukan').text('Ajukan');
		$('[name=id]').val('');
		$('#judul').val('').select();
		$('#abstrak').val('');
	});

})();


function uploadbukti(id) {
	var file_data = $('#filebukti').prop('files')[0];
	var form_data = new FormData();
	form_data.append("file", file_data);
	form_data.append("mahasiswa_id", id);
	$.ajax({
		url: base_url + 'mahasiswa/uploadbukti',
		type: 'post',
		dataType: 'json',
		cache: false,
		contentType: false,
		processData: false,
		data: form_data,
		success: function (response) {
			$('div.pesan').html(response.message);
			$('div#modal-uploadbukti').modal('hide');
			$('#filebukti').val('');
			$('#filename_bukti').text('Choose file');
			ideskripsi2Table.ajax.reload(null, true);
		}
	});
}

var filenamebukti = (function () {
	$(document).on('change', '#filebukti', function () {
		var file_data = $('#filebukti').prop('files')[0];
		$('#filename_bukti').text(file_data.name);

	})
})();


var filenameproposal = (function () {
	$('#file_proposal').change(function () {
		var file_data = $('#file_proposal').prop('files')[0];
		$('#filename').text(file_data.name);

	})
})();

var filenameskripsi = (function () {
	$('#file_skripsi').change(function () {
		var file_data = $('#file_skripsi').prop('files')[0];
		$('#filename2').text(file_data.name);

	})
})();

var prasyarat_seminarproposal = (function () {
	$('#file_proposal').change(function () {
		var file_data = $('#file_proposal').prop('files')[0];
		$('#filename_proposal').text(file_data.name);

	})
	$('#file_kdn').change(function () {
		var file_data = $('#file_kdn').prop('files')[0];
		$('#filename_kdn').text(file_data.name);

	})
	$('#file_kartubimbingan').change(function () {
		var file_data = $('#file_kartubimbingan').prop('files')[0];
		$('#filename_kartubimbingan').text(file_data.name);

	})
	$('#file_khs').change(function () {
		var file_data = $('#file_khs').prop('files')[0];
		$('#filename_khs').text(file_data.name);

	})
})();

var prasyarat_sidangskripsi = (function () {
	$('#file_transkipnilai').change(function () {
		var file_data = $('#file_transkipnilai').prop('files')[0];
		$('#filename_transkipnilai').text(file_data.name);

	})
	$('#file_biodatafoto').change(function () {
		var file_data = $('#file_biodatafoto').prop('files')[0];
		$('#filename_biodatafoto').text(file_data.name);

	})
	$('#file_suratlab').change(function () {
		var file_data = $('#file_suratlab').prop('files')[0];
		$('#filename_suratlab').text(file_data.name);

	})
	$('#file_bebaspiutang').change(function () {
		var file_data = $('#file_bebaspiutang').prop('files')[0];
		$('#filename_bebaspiutang').text(file_data.name);

	})
	$('#file_surattugas').change(function () {
		var file_data = $('#file_surattugas').prop('files')[0];
		$('#filename_surattugas').text(file_data.name);

	})
	$('#file_coverskripsi').change(function () {
		var file_data = $('#file_coverskripsi').prop('files')[0];
		$('#filename_coverskripsi').text(file_data.name);

	})
	$('#file_kartubimbingan').change(function () {
		var file_data = $('#file_kartubimbingan').prop('files')[0];
		$('#filename_kartubimbingan').text(file_data.name);

	})
	$('#file_piagam').change(function () {
		var file_data = $('#file_piagam').prop('files')[0];
		$('#filename_piagam').text(file_data.name);

	})
	$('#file_buktisumbangan').change(function () {
		var file_data = $('#file_buktisumbangan').prop('files')[0];
		$('#filename_buktisumbangan').text(file_data.name);

	})
	$('#file_skripsi').change(function () {
		var file_data = $('#file_skripsi').prop('files')[0];
		$('#filename_skripsi').text(file_data.name);

	})
	$('#file_buktiartikel').change(function () {
		var file_data = $('#file_buktiartikel').prop('files')[0];
		$('#filename_buktiartikel').text(file_data.name);

	})
})();

var prasyarat_yudisium = (function () {
	$('#file_buktirevisi').change(function () {
		var file_data = $('#file_buktirevisi').prop('files')[0];
		$('#filename_buktirevisi').text(file_data.name);

	})
	$('#file_buktipublikasi').change(function () {
		var file_data = $('#file_buktipublikasi').prop('files')[0];
		$('#filename_buktipublikasi').text(file_data.name);

	})

})();

var filenamereferensi = (function () {
	$(document).on('change','#file_referensi',function () {
		var file_data = $('#file_referensi').prop('files')[0];
		$('#filename_ref').text(file_data.name);

	})
})();




function deletebukti(idx) {
	var id = idx;
	if (confirm('apakah bukti ingin di hapus?')) {
		$.ajax({
			url: base_url + 'mahasiswa/delete_bukti',
			type: 'post',
			dataType: 'json',
			data: 'id=' + id,
			success: function (response) {
				$('div.pesan').html(response.message);
				if (response.status == 'success') {
					ideskripsi2Table.ajax.reload(null, true);

				}
			}
		});
	}

}


function bimbingan(dosen_id) {
	var file_data = $('#file_bimbingan').prop('files')[0];
	var textarea = $('#text_bimbingan').val();
	var form_data = new FormData();
	form_data.append("file", file_data);
	form_data.append("bimbingan", textarea);
	form_data.append("dosen_id", dosen_id);
	form_data.append("mahasiswa_id", $('#btn-tambahbp').data('id'));
	form_data.append("role_id", $('#btn-tambahbp').data('role_id'));
	form_data.append("username", $('#btn-tambahbp').data('username'));
	form_data.append("role_folder", $('#btn-tambahbp').data('role'));
	$.ajax({
		url: base_url + 'bimbingan/logbimbingan',
		type: 'post',
		dataType: 'json',
		cache: false,
		contentType: false,
		processData: false,
		data: form_data,
		success: function (response) {
			$('div.pesan').html(response.message);
			$('div#modal-bimbingan').modal('hide');
			// $('#form-bp').each(function () {
			// 	this.reset();
			// });
			// $('#file_bimbingan').val('');
			// $('#filename').text('Choose file');
			logbimbingan1Table.ajax.reload(null, true);
			logbimbingan2Table.ajax.reload(null, true);
			logbimbingan7Table.ajax.reload(null, true);
			logbimbingan8Table.ajax.reload(null, true);

			if ($('#datatable-logbimbingandosen1').length) {
				logbimbingandosen1Table.ajax.reload(null, true);
			}

			if ($('#datatable-logbimbingandosen2').length) {
				logbimbingandosen2Table.ajax.reload(null, true);
			}
			if ($('#datatable-logbimbingandosen7').length) {
				logbimbingandosen7Table.ajax.reload(null, true);
			}

			if ($('#datatable-logbimbingandosen8').length) {
				logbimbingandosen8Table.ajax.reload(null, true);
			}
		}
	});
}



function bimbingan2(dosen_id) {
	var file_data = $('#file_bimbingan').prop('files')[0];
	var textarea = $('#text_bimbingan').val();
	var form_data = new FormData();
	form_data.append("file", file_data);
	form_data.append("bimbingan", textarea);
	form_data.append("dosen_id", dosen_id);
	form_data.append("mahasiswa_id", $('#btn-tambahbp').data('id'));
	form_data.append("role_id", $('#btn-tambahbp').data('role_id'));
	form_data.append("username", $('#btn-tambahbp').data('username'));
	form_data.append("role_folder", $('#btn-tambahbp').data('role'));
	$.ajax({
		url: base_url + 'bimbingan/logbimbingan2',
		type: 'post',
		dataType: 'json',
		cache: false,
		contentType: false,
		processData: false,
		data: form_data,
		success: function (response) {
			$('div.pesan').html(response.message);
			$('div#modal-bimbingan').modal('hide');
			$('#form-bp').each(function () {
				this.reset();
			});
			$('#file_bimbingan').val('');
			$('#filename').text('Choose file');
			logbimbingan3Table.ajax.reload(null, true);
			logbimbingan4Table.ajax.reload(null, true);
			logbimbingan5Table.ajax.reload(null, true);
			logbimbingan6Table.ajax.reload(null, true);
			if ($('#datatable-logbimbingandosen3').length) {
				logbimbingandosen3Table.ajax.reload(null, true);
			}

			if ($('#datatable-logbimbingandosen4').length) {
				logbimbingandosen4Table.ajax.reload(null, true);
			}
			if ($('#datatable-logbimbingandosen5').length) {
				logbimbingandosen5Table.ajax.reload(null, true);
			}

			if ($('#datatable-logbimbingandosen6').length) {
				logbimbingandosen6Table.ajax.reload(null, true);
			}
		}
	});
}

var filenamebimbingan = (function () {
	$('#file_bimbingan').change(function () {
		var file_data = $('#file_bimbingan').prop('files')[0];
		$('#filename').text(file_data.name);

	})
})();



function deletelogbp(idx, nim) {
	var id = idx;
	$('#hapus_bp').modal('show');
	$('.btn-delete').click(function () {

		$.ajax({
			url: base_url + 'bimbingan/delete_bimbingan',
			type: 'post',
			data: 'id=' + id + '&nim=' + nim + '&role=' + $('#btn-tambahbp').data('role'),
			dataType: "json",
			success: function (response) {
				if (response.status == 'success') {
					logbimbingan1Table.ajax.reload(null, false);
					logbimbingan2Table.ajax.reload(null, false);
					logbimbingan7Table.ajax.reload(null, false);
					logbimbingan8Table.ajax.reload(null, false);
					if ($('#datatable-logbimbingandosen1').length) {
						logbimbingandosen1Table.ajax.reload(null, true);
					}

					if ($('#datatable-logbimbingandosen2').length) {
						logbimbingandosen2Table.ajax.reload(null, true);
					}
					if ($('#datatable-logbimbingandosen7').length) {
						logbimbingandosen7Table.ajax.reload(null, true);
					}

					if ($('#datatable-logbimbingandosen8').length) {
						logbimbingandosen8Table.ajax.reload(null, true);
					}

				}
				$('#hapus_bp').modal('hide');
			}
		})
	});
}

function deletelogbp2(idx, nim) {
	var id = idx;
	$('#hapus_bp').modal('show');
	$('.btn-delete').click(function () {

		$.ajax({
			url: base_url + 'bimbingan/delete_bimbingan2',
			type: 'post',
			data: 'id=' + id + '&nim=' + nim + '&role=' + $('#btn-tambahbp').data('role'),
			dataType: "json",
			success: function (response) {
				if (response.status == 'success') {
					logbimbingan3Table.ajax.reload(null, false);
					logbimbingan4Table.ajax.reload(null, false);
					logbimbingan5Table.ajax.reload(null, false);
					logbimbingan6Table.ajax.reload(null, false);
					if ($('#datatable-logbimbingandosen3').length) {
						logbimbingandosen3Table.ajax.reload(null, true);
					}

					if ($('#datatable-logbimbingandosen4').length) {
						logbimbingandosen4Table.ajax.reload(null, true);
					}
					if ($('#datatable-logbimbingandosen5').length) {
						logbimbingandosen5Table.ajax.reload(null, true);
					}

					if ($('#datatable-logbimbingandosen6').length) {
						logbimbingandosen6Table.ajax.reload(null, true);
					}
				}
				$('#hapus_bp').modal('hide');
			}
		})
	});
}


function getlogbp(idx) {
	var id = idx;
	$.ajax({
		url: base_url + 'bimbingan/getlogbimbingan',
		type: 'post',
		data: 'id=' + id,
		dataType: 'json',
		success: function (response) {
			$('#text_bimbingan2').val(response.bimbingan);
			$('#filename2').text(response.file);
			$('#btn-editbp').data('id', id);
			$('#modal-editbimbingan').modal('show');
		}
	});
}

function getlogbp2(idx) {
	var id = idx;
	$.ajax({
		url: base_url + 'bimbingan/getlogbimbingan2',
		type: 'post',
		data: 'id=' + id,
		dataType: 'json',
		success: function (response) {
			$('#text_bimbingan2').val(response.bimbingan);
			$('#filename2').text(response.file);
			$('#btn-editbp').data('id', id);
			$('#modal-editbimbingan').modal('show');
		}
	});
}

// mahasiswa edit log bimbingan
function editlogbp() {
	var file_data = $('#file_bimbingan2').prop('files')[0];
	var textarea = $('#text_bimbingan2').val();
	var form_data = new FormData();
	form_data.append("file", file_data);
	form_data.append("bimbingan", textarea);
	form_data.append("id", $('#btn-editbp').data('id'));
	form_data.append("role", $('#btn-tambahbp').data('role'));
	$.ajax({
		url: base_url + 'bimbingan/editlogbimbingan',
		type: 'post',
		dataType: 'json',
		cache: false,
		contentType: false,
		processData: false,
		data: form_data,
		success: function (response) {
			$('div.pesan').html(response.message);
			$('#modal-editbimbingan').modal('hide');
			$('#form-bp').each(function () {
				this.reset();
			});

			logbimbingan1Table.ajax.reload(null, true);
			logbimbingan2Table.ajax.reload(null, true);
			logbimbingan7Table.ajax.reload(null, true);
			logbimbingan8Table.ajax.reload(null, true);
			if ($('#datatable-logbimbingandosen1').length) {
				logbimbingandosen1Table.ajax.reload(null, true);
			}

			if ($('#datatable-logbimbingandosen2').length) {
				logbimbingandosen2Table.ajax.reload(null, true);
			}
			if ($('#datatable-logbimbingandosen7').length) {
				logbimbingandosen7Table.ajax.reload(null, true);
			}

			if ($('#datatable-logbimbingandosen8').length) {
				logbimbingandosen8Table.ajax.reload(null, true);
			}
		}
	});
}


function editlogbp2() {
	var file_data = $('#file_bimbingan2').prop('files')[0];
	var textarea = $('#text_bimbingan2').val();
	var form_data = new FormData();
	form_data.append("file", file_data);
	form_data.append("bimbingan", textarea);
	form_data.append("id", $('#btn-editbp').data('id'));
	form_data.append("role", $('#btn-tambahbp').data('role'));
	$.ajax({
		url: base_url + 'bimbingan/editlogbimbingan2',
		type: 'post',
		dataType: 'json',
		cache: false,
		contentType: false,
		processData: false,
		data: form_data,
		success: function (response) {
			$('div.pesan').html(response.message);
			$('#modal-editbimbingan').modal('hide');
			$('#form-bp').each(function () {
				this.reset();
			});

			logbimbingan3Table.ajax.reload(null, true);
			logbimbingan4Table.ajax.reload(null, true);
			logbimbingan5Table.ajax.reload(null, true);
			logbimbingan6Table.ajax.reload(null, true);
			if ($('#datatable-logbimbingandosen3').length) {
				logbimbingandosen3Table.ajax.reload(null, true);
			}

			if ($('#datatable-logbimbingandosen4').length) {
				logbimbingandosen4Table.ajax.reload(null, true);
			}

			if ($('#datatable-logbimbingandosen5').length) {
				logbimbingandosen5Table.ajax.reload(null, true);
			}

			if ($('#datatable-logbimbingandosen6').length) {
				logbimbingandosen6Table.ajax.reload(null, true);
			}
		}
	});
}


var filenamebimbingan2 = (function () {
	$('#file_bimbingan2').change(function () {
		var file_data = $('#file_bimbingan2').prop('files')[0];
		$('#filename2').text(file_data.name);

	})
})();


function upload_proposal(id) {
	var file_data = $('#file_proposal').prop('files')[0];
	var form_data = new FormData();
	form_data.append("file", file_data);
	form_data.append("id", id);
	if (file_data) {
		$.ajax({
			url: base_url + 'mahasiswa/upload_proposal',
			type: 'post',
			dataType: 'json',
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,
			success: function (response) {
				$('div.pesan').html(response.message);
				$('div#modal-upload_proposal').modal('hide');
				$('#file_proposal').val('');
				location.reload();
				$('#filename').text('Choose file');
			}
		});

	} else {
		alert('harap upload file terlebih dahulu');
	}
}

function upload_skripsi(id) {
	var file_data = $('#file_skripsi').prop('files')[0];
	var form_data = new FormData();
	form_data.append("file", file_data);
	form_data.append("id", id);
	if (file_data) {
		$.ajax({
			url: base_url + 'mahasiswa/upload_skripsi',
			type: 'post',
			dataType: 'json',
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,
			success: function (response) {
				// $('div.pesan').html(response.message);
				$('div#modal-upload_skripsi').modal('hide');
				$('#file_skripsi').val('');
				// $('#menu2').html('<p class="card-text">skripsi berhasil disimpan silahkan di refresh</p>');
				location.reload();
				$('#filename2').text('Choose file');
			}
		});
	}else{
		alert('harap upload file terlebih dahulu');
	}
}

function upload_prasyarat_p(id) {
	var file_proposal = $('#file_proposal').prop('files')[0];
	var file_kdn = $('#file_kdn').prop('files')[0];
	var file_kartubimbingan = $('#file_kartubimbingan').prop('files')[0];
	var file_khs = $('#file_khs').prop('files')[0];
	var form_data = new FormData();
	form_data.append("file_proposal", file_proposal);
	form_data.append("file_kdn", file_kdn);
	form_data.append("file_kartubimbingan", file_kartubimbingan);
	form_data.append("file_khs", file_khs);
	form_data.append("id", id);
	if (file_proposal != null && file_kdn != null && file_kartubimbingan != null && file_khs != null) {
		$.ajax({
			url: base_url + 'mahasiswa/upload_prasyarat_p',
			type: 'post',
			dataType: 'json',
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,
			success: function (response) {
				let btn = '<p>menunggu...</p>';
				$('.btn-daftar').html(btn);
				$('#file_proposal').val('');
				$('#filename_proposal').text('Choose file');
				$('#file_kdn').val('');
				$('#filename_kdn').text('Choose file');
				$('#file_kartubimbingan').val('');
				$('#filename_kartubimbingan').text('Choose file');
				$('#file_khs').val('');
				$('#filename_khs').text('Choose file');
			}
		});

	} else {
		alert('Mohon melengkapi form');
	}
}


function reupload_prasyarat_p(id) {
	var file_proposal = $('#file_proposal').prop('files')[0];
	var file_kdn = $('#file_kdn').prop('files')[0];
	var file_kartubimbingan = $('#file_kartubimbingan').prop('files')[0];
	var file_khs = $('#file_khs').prop('files')[0];
	var form_data = new FormData();
	form_data.append("file_proposal", file_proposal);
	form_data.append("file_kdn", file_kdn);
	form_data.append("file_kartubimbingan", file_kartubimbingan);
	form_data.append("file_khs", file_khs);
	form_data.append("id", id);
	if (file_proposal != null && file_kdn != null && file_kartubimbingan != null && file_khs != null) {
		$.ajax({
			url: base_url + 'mahasiswa/reupload_prasyarat_p',
			type: 'post',
			dataType: 'json',
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,
			success: function (response) {
				let btn = '<p>menunggu...</p>';
				$('.btn-daftar').html(btn);
				$('#file_proposal').val('');
				$('#filename_proposal').text('Choose file');
				$('#file_kdn').val('');
				$('#filename_kdn').text('Choose file');
				$('#file_kartubimbingan').val('');
				$('#filename_kartubimbingan').text('Choose file');
				$('#file_khs').val('');
				$('#filename_khs').text('Choose file');
			}
		});

	} else {
		alert('Mohon melengkapi form');
	}
}

// tolak prasyarat proposal
function tolak_file_p(id) {

		if (confirm('Apakah Anda yakin?')) {
			$.ajax({
				type: "post",
				url: base_url + "admin/tolak_file_p",
				data: "id=" + id,
				dataType: "json",
				success: function (response) {
					prasyarat_pTable.ajax.reload(null, false);
				}
			});
	
		}
	
}

//jadwalkan seminar proposal
function jadwalkan_seminar_proposal(id) {
	var tanggal = $('#tanggal_seminar').val();
	var jam = $('#timepicker').val();
	$.ajax({
		type: "post",
		url: base_url + "admin/jadwalkan_seminar_proposal",
		data: "mahasiswa_id=" + id + "&tanggal=" + tanggal + ' ' + jam,
		dataType: "json",
		success: function (response) {
			$('.btn-jadwal').html('<p>Terjadwal</p>');
		}
	});

}

//jadwalkan seminar proposal
function reschedule_seminar_proposal(id) {
	var tanggal = $('#tanggal_seminar').val();
	var jam = $('#timepicker').val();
	$.ajax({
		type: "post",
		url: base_url + "admin/reschedule_seminar_proposal",
		data: "mahasiswa_id=" + id + "&tanggal=" + tanggal + ' ' + jam,
		dataType: "json",
		success: function (response) {
			$('.btn-jadwal').html('<p>Terjadwal</p>');
		}
	});

}

// datepicker tanggal seminar proposal
$('#tanggal_seminar').datepicker({
	format: 'yyyy-m-dd',
	timepicker: true
});

// timepicker tanggal
$('#timepicker').mdtimepicker();

function set_moderator() {
	$.ajax({
		type: "post",
		url: base_url + "mahasiswa/set_moderator",
		data: $('#form-moderator').serialize(),
		dataType: "json",
		success: function (response) {
			console.log(response);
			if (response.status == 'success') {
				var text = '<h3>Moderator</h3>';
				text += '<p>' + response.nama + '</p>';
				$('.rangkaian-form').html(text);
			}else{
				alert(response);
			}
		}
	});
}

// selesai seminar proposal

function selesai_seminar(id) {
if (confirm('apakah Seminar Proposal ini telah selesai?')) {
	$.ajax({
		type: "post",
		url: base_url + "admin/selesai_seminar",
		data: "id=" + id,
		dataType: "json",
		success: function (response) {
			location.href = base_url + "admin/jadwal_seminar";
		}
	});
	
}
}


function nilai_proposal() {
	var mahasiswa_id = $('#identitas').data('mahasiswa_id');
	var role = $('#identitas').data('dosenrole1');
	var nilai = $('#input-nilai').val();
	if (nilai) {
		$.ajax({
			type: "post",
			url: base_url + "dosen/nilai_proposal",
			data: "id=" + mahasiswa_id + "&role=" + role + "&nilai=" + nilai,
			dataType: "json",
			success: function (response) {
				$('#nilai_proposal').modal('hide');
				alert('nilai berhasil di input');
			}
		});
		
	}else{
		alert('mohon memasukkan nilai terlebih dahulu');
	}
}

function hapus_proposal(id) {
if (confirm('apakah Anda yakin?')) {
	$.ajax({
		type: "post",
		url: "mahasiswa/hapus_proposal",
		data: "id=" + id,
		dataType: "json",
		success: function (response) {
			// var menu = '<p class="card-text">hapus proposal berhasil silahkan di refresh</p>';
			// $('#menu1').html(menu);
			location.reload();
		}
	});
	
}
}

// * sidang skripsi

function upload_prasyarat_s(id) {
	var file_transkipnilai = $('#file_transkipnilai').prop('files')[0];
	var file_biodatafoto = $('#file_biodatafoto').prop('files')[0];
	var file_suratlab = $('#file_suratlab').prop('files')[0];
	var file_bebaspiutang = $('#file_bebaspiutang').prop('files')[0];
	var file_surattugas = $('#file_surattugas').prop('files')[0];
	var file_coverskripsi = $('#file_coverskripsi').prop('files')[0];
	var file_kartubimbingan = $('#file_kartubimbingan').prop('files')[0];
	var file_piagam = $('#file_piagam').prop('files')[0];
	var file_buktisumbangan = $('#file_buktisumbangan').prop('files')[0];
	var file_skripsi = $('#file_skripsi').prop('files')[0];
	var file_buktiartikel = $('#file_buktiartikel').prop('files')[0];
	var form_data = new FormData();
	form_data.append("file_transkipnilai", file_transkipnilai);
	form_data.append("file_biodatafoto", file_biodatafoto);
	form_data.append("file_suratlab", file_suratlab);
	form_data.append("file_bebaspiutang", file_bebaspiutang);
	form_data.append("file_surattugas", file_surattugas);
	form_data.append("file_coverskripsi", file_coverskripsi);
	form_data.append("file_kartubimbingan", file_kartubimbingan);
	form_data.append("file_piagam", file_piagam);
	form_data.append("file_buktisumbangan", file_buktisumbangan);
	form_data.append("file_skripsi", file_skripsi);
	form_data.append("file_buktiartikel", file_buktiartikel);
	form_data.append("id", id);
	if (file_transkipnilai != null && file_biodatafoto != null && file_suratlab != null && file_bebaspiutang != null && file_surattugas != null && file_coverskripsi != null && file_kartubimbingan != null && file_piagam != null && file_buktisumbangan != null && file_skripsi != null && file_buktiartikel != null) {
		$.ajax({
			url: base_url + 'mahasiswa/upload_prasyarat_s',
			type: 'post',
			dataType: 'json',
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,
			success: function (response) {
				console.log(response);
				let btn = '<p>menunggu...</p>';
				$('.btn-daftar').html(btn);
				$('#file_transkipnilai').val('');
				$('#filename_transkipnilai').text('Choose file');
				$('#file_biodatafoto').val('');
				$('#filename_biodatafoto').text('Choose file');
				$('#file_suratlab').val('');
				$('#filename_suratlab').text('Choose file');
				$('#file_bebaspiutang').val('');
				$('#filename_bebaspiutang').text('Choose file');
				$('#file_surattugas').val('');
				$('#filename_surattugas').text('Choose file');
				$('#file_coverskripsi').val('');
				$('#filename_coverskripsi').text('Choose file');
				$('#file_kartubimbingan').val('');
				$('#filename_kartubimbingan').text('Choose file');
				$('#file_piagam').val('');
				$('#filename_piagam').text('Choose file');
				$('#file_buktisumbangan').val('');
				$('#filename_buktisumbangan').text('Choose file');
				$('#file_skripsi').val('');
				$('#filename_skripsi').text('Choose file');
				$('#file_buktiartikel').val('');
				$('#filename_buktiartikel').text('Choose file');
				
			}
		});

	} else {
		alert('Mohon melengkapi form');
	}
}

function reupload_prasyarat_s(id) {
	var file_transkipnilai = $('#file_transkipnilai').prop('files')[0];
	var file_biodatafoto = $('#file_biodatafoto').prop('files')[0];
	var file_suratlab = $('#file_suratlab').prop('files')[0];
	var file_bebaspiutang = $('#file_bebaspiutang').prop('files')[0];
	var file_surattugas = $('#file_surattugas').prop('files')[0];
	var file_coverskripsi = $('#file_coverskripsi').prop('files')[0];
	var file_kartubimbingan = $('#file_kartubimbingan').prop('files')[0];
	var file_piagam = $('#file_piagam').prop('files')[0];
	var file_buktisumbangan = $('#file_buktisumbangan').prop('files')[0];
	var file_skripsi = $('#file_skripsi').prop('files')[0];
	var file_buktiartikel = $('#file_buktiartikel').prop('files')[0];
	var form_data = new FormData();
	form_data.append("file_transkipnilai", file_transkipnilai);
	form_data.append("file_biodatafoto", file_biodatafoto);
	form_data.append("file_suratlab", file_suratlab);
	form_data.append("file_bebaspiutang", file_bebaspiutang);
	form_data.append("file_surattugas", file_surattugas);
	form_data.append("file_coverskripsi", file_coverskripsi);
	form_data.append("file_kartubimbingan", file_kartubimbingan);
	form_data.append("file_piagam", file_piagam);
	form_data.append("file_buktisumbangan", file_buktisumbangan);
	form_data.append("file_skripsi", file_skripsi);
	form_data.append("file_buktiartikel", file_buktiartikel);
	form_data.append("id", id);
	if (file_transkipnilai != null && file_biodatafoto != null && file_suratlab != null && file_bebaspiutang != null && file_surattugas != null && file_coverskripsi != null && file_kartubimbingan != null && file_piagam != null && file_buktisumbangan != null && file_skripsi != null && file_buktiartikel != null) {
		$.ajax({
			url: base_url + 'mahasiswa/reupload_prasyarat_s',
			type: 'post',
			dataType: 'json',
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,
			success: function (response) {
				console.log(response);
				let btn = '<p>menunggu...</p>';
				$('.btn-daftar').html(btn);
				$('#file_transkipnilai').val('');
				$('#filename_transkipnilai').text('Choose file');
				$('#file_biodatafoto').val('');
				$('#filename_biodatafoto').text('Choose file');
				$('#file_suratlab').val('');
				$('#filename_suratlab').text('Choose file');
				$('#file_bebaspiutang').val('');
				$('#filename_bebaspiutang').text('Choose file');
				$('#file_surattugas').val('');
				$('#filename_surattugas').text('Choose file');
				$('#file_coverskripsi').val('');
				$('#filename_coverskripsi').text('Choose file');
				$('#file_kartubimbingan').val('');
				$('#filename_kartubimbingan').text('Choose file');
				$('#file_piagam').val('');
				$('#filename_piagam').text('Choose file');
				$('#file_buktisumbangan').val('');
				$('#filename_buktisumbangan').text('Choose file');
				$('#file_skripsi').val('');
				$('#filename_skripsi').text('Choose file');
				$('#file_buktiartikel').val('');
				$('#filename_buktiartikel').text('Choose file');
				
			}
		});

	} else {
		alert('Mohon melengkapi form');
	}
}


// tolak prasyarat skripsi
function tolak_file_s(id) {
	if (confirm('apakah Anda yakin?')) {
		$.ajax({
			type: "post",
			url: base_url + "admin/tolak_file_s",
			data: "id=" + id,
			dataType: "json",
			success: function (response) {
				location.href = base_url + "admin/prasyarat_skripsi";
			}
		});
	}
}

// datepicker tanggal sidang skripsi
$('#tanggal_sidang').datepicker({
	format: 'yyyy-m-dd',
	timepicker: true
});

//jadwalkan sidang skripsi
function jadwalkan_sidang_skripsi(id) {
	var tanggal = $('#tanggal_sidang').val();
	var jam = $('#timepicker').val();
	$.ajax({
		type: "post",
		url: base_url + "admin/jadwalkan_sidang_skripsi",
		data: "mahasiswa_id=" + id + "&tanggal=" + tanggal + ' ' + jam,
		dataType: "json",
		success: function (response) {
			$('.btn-jadwal').html('<p>Terjadwal</p>');
		}
	});

}


//jadwalkan seminar proposal
function reschedule_sidang_skripsi(id) {
	var tanggal = $('#tanggal_sidang').val();
	var jam = $('#timepicker').val();
	$.ajax({
		type: "post",
		url: base_url + "admin/reschedule_sidang_skripsi",
		data: "mahasiswa_id=" + id + "&tanggal=" + tanggal + ' ' + jam,
		dataType: "json",
		success: function (response) {
			$('.btn-jadwal').html('<p>Terjadwal</p>');
		}
	});

}

// selesai seminar skripsi

function selesai_sidang(id) {
if (confirm('apakah Sidang Skripsi ini telah selesai?')) {
	$.ajax({
		type: "post",
		url: base_url + "admin/selesai_sidang",
		data: "id=" + id,
		dataType: "json",
		success: function (response) {
			location.href = base_url + "admin/jadwal_sidang";
		}
	});
	
}
}




function hapus_skripsi(id) {
	if (confirm('apakah Anda yakin?')) {
		$.ajax({
			type: "post",
			url: "mahasiswa/hapus_skripsi",
			data: "id=" + id,
			dataType: "json",
			success: function (response) {
				var menu = '<p class="card-text">hapus skripsi berhasil silahkan di refresh</p>';
				// $('#menu2').html(menu);
				location.reload();
			}
		});
	}
}


function nilai_skripsi() {
	var mahasiswa_id = $('#identitas').data('mahasiswa_id');
	var role = $('#identitas').data('dosenrole1');
	var nilai = $('#input-nilai').val();
	$.ajax({
		type: "post",
		url: base_url + "dosen/nilai_skripsi",
		data: "id=" + mahasiswa_id + "&role=" + role + "&nilai=" + nilai,
		dataType: "json",
		success: function (response) {
			$('#nilai_skripsi').modal('hide');
			alert('nilai berhasil di input');
		}
	});
}

//  * yudisium


function upload_prasyarat_y(id) {
	var file_buktirevisi = $('#file_buktirevisi').prop('files')[0];
	var file_buktipublikasi = $('#file_buktipublikasi').prop('files')[0];
	var form_data = new FormData();
	form_data.append("file_buktirevisi", file_buktirevisi);
	form_data.append("file_buktipublikasi", file_buktipublikasi);
	form_data.append("id", id);
	if (file_buktirevisi != null && file_buktipublikasi != null ) {
		$.ajax({
			url: base_url + 'mahasiswa/upload_prasyarat_y',
			type: 'post',
			dataType: 'json',
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,
			success: function (response) {
				let btn = '<p>menunggu...</p>';
				$('.btn-daftar').html(btn);
				$('#file_buktirevisi').val('');
				$('#filename_buktirevisi').text('Choose file');
				$('#file_buktipublikasi').val('');
				$('#filename_buktipublikasi').text('Choose file');
			
			}
		});

	} else {
		alert('Mohon melengkapi form');
	}
}

function reupload_prasyarat_y(id) {
	var file_buktirevisi = $('#file_buktirevisi').prop('files')[0];
	var file_buktipublikasi = $('#file_buktipublikasi').prop('files')[0];
	var form_data = new FormData();
	form_data.append("file_buktirevisi", file_buktirevisi);
	form_data.append("file_buktipublikasi", file_buktipublikasi);
	form_data.append("id", id);
	if (file_buktirevisi != null && file_buktipublikasi != null ) {
		$.ajax({
			url: base_url + 'mahasiswa/reupload_prasyarat_y',
			type: 'post',
			dataType: 'json',
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,
			success: function (response) {
				let btn = '<p>menunggu...</p>';
				$('.btn-daftar').html(btn);
				$('#file_buktirevisi').val('');
				$('#filename_buktirevisi').text('Choose file');
				$('#file_buktipublikasi').val('');
				$('#filename_buktipublikasi').text('Choose file');
			
			}
		});

	} else {
		alert('Mohon melengkapi form');
	}
}


// tolak prasyarat yudisium
function tolak_file_y(id) {
if (confirm('apakah Anda yakin?')) {
	$.ajax({
		type: "post",
		url: base_url + "admin/tolak_file_y",
		data: "id=" + id,
		dataType: "json",
		success: function (response) {
			console.log(response);
			location.href = base_url + "admin/prasyarat_yudisium"
		}
		
	});
}
}

// datepicker tanggal yudisium
$('#tanggal_yudisium').datepicker({
	format: 'yyyy-m-dd',
	timepicker: true
});

//jadwalkan yudisium
function jadwalkan_yudisium(id) {
	var tanggal = $('#tanggal_yudisium').val();
	var jam = $('#timepicker').val();
	$.ajax({
		type: "post",
		url: base_url + "admin/jadwalkan_yudisium",
		data: "mahasiswa_id=" + id + "&tanggal=" + tanggal + ' ' + jam,
		dataType: "json",
		success: function (response) {
			$('.btn-jadwal').html('<p>Terjadwal</p>');
		}
	});

}


//jadwalkan yudisium
function reschedule_yudisium(id) {
	var tanggal = $('#tanggal_yudisium').val();
	var jam = $('#timepicker').val();
	$.ajax({
		type: "post",
		url: base_url + "admin/reschedule_yudisium",
		data: "mahasiswa_id=" + id + "&tanggal=" + tanggal + ' ' + jam,
		dataType: "json",
		success: function (response) {
			$('.btn-jadwal').html('<p>Terjadwal</p>');
		}
	});

}

// selesai seminar skripsi

function selesai_yudisium(id) {
if (confirm('apakah Yudisium telah selesai?')) {
	$.ajax({
		type: "post",
		url: base_url + "admin/selesai_yudisium",
		data: "id=" + id,
		dataType: "json",
		success: function (response) {
			jadwal_yTable.ajax.reload(null, false);
		}
	});
	
}
}

var filenamefoto = (function () {
	$(document).on('change', '#file_foto', function () {
		var file_data = $('#file_foto').prop('files')[0];
		$('#filename3').text(file_data.name);
	});
})();

function ubah_foto(id) {
	var file_data = $('#file_foto').prop('files')[0];
	var form_data = new FormData();
	form_data.append("file", file_data);
	form_data.append("id", id);

	if (file_data) {
		$.ajax({
			url: base_url + 'setting/ubah_foto',
			type: 'post',
			dataType: 'json',
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,
			success: function (response) {
				// $('div.pesan').html(response.message);
				$('div#ubah_foto').modal('hide');
				$('#file_foto').val('');
				$('#filename3').text('Choose file');
				location.reload();
			}
		});
	}else {
		alert('mohon upload file terlebih dahulu');
	}
}

var validasi_ubahpassword = (function () {
	$(document).on('blur', 'input', function (e) {
		// PassWord
		if ($(this).hasClass('password_lama')) {
			if ($(this).val().length == '') {
				$(this).addClass('is-invalid');
				$(this).siblings('div.invalid-feedback').text('kolom Password Lama wajib diisi').fadeIn();
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
		// PassWord
		if ($(this).hasClass('passwordconf')) {
			if ($(this).val().length == '') {
				$(this).addClass('is-invalid');
				$(this).siblings('div.invalid-feedback').text('kolom Konfirmasi Password Baru wajib diisi').fadeIn();
			} else {
				$(this).removeClass('is-invalid');
				$(this).addClass('is-valid');
				$(this).siblings('div.invalid-feedback').text('').fadeOut();
			}
		}

	});
})();


function ubah_password() {
	$.ajax({
		type: "post",
		url: base_url + "setting/ubah_password",
		data: $('#form-password').serialize(),
		dataType: "json",
	success: function (response) {
			if (response.status == 'success') {
				alert(response.message.success);
				$('#ubah_password').modal('hide');
			}
			if (response.status == 'failed') {
				alert(response.message.failed);
			}
			if (response.message.password_lama) {
				$('input.password_lama').addClass('is-invalid');
				$('input.password_lama').siblings('div.invalid-feedback').text(response.message.password_lama).fadeIn();
			}
			if (response.message.password) {
				$('input.password').addClass('is-invalid');
				$('input.password').siblings('div.invalid-feedback').text(response.message.password).fadeIn();
			}
			if (response.message.passwordconf) {
				$('input.passwordconf').addClass('is-invalid');
				$('input.passwordconf').siblings('div.invalid-feedback').text(response.message.passwordconf).fadeIn();
			}



			$('input').blur(function () {


			});
		}
	});
}


function acc_pa(id) {
	if (confirm('apakah Anda ingin meng-ACC judul ini?')) {
		location.href = base_url + 'PA/acc/' + id;
	}
}
