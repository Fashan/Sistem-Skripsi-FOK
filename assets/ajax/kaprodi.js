function getid(idx) {
	$('#modal-catatan').modal('show');
	$('#id').val(idx);
}

var tolakJudul = (function () {
	$('#form-tolakjudul').on('submit', function (e) {
		e.preventDefault();
		$.ajax({
			url: base_url + 'kaprodi/tolakjudul',
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			success: function (response) {
				if (response.status == 'success') {
					$('.message').html(response.message);
				}
				$('#modal-catatan').modal('hide');
				judulmahasiswaTable.ajax.reload(null, false);


			}
		});
	});
})();

function infojudul(idx) {
	var id = idx;
	$.ajax({
		url: base_url + 'kaprodi/get_infojudul',
		type: 'post',
		data: 'id=' + id,
		dataType: "json",
		success: function (response) {
			$('#modal-judul').modal('show');
			$('#nama_mahasiswa').text(response.nama);
			$('#judul').text(response.judul);
			$('#abstrak').text(response.abstrak);
			$('#file').html('<i class="fa fa-download"></i>'+response.file);
			$('#file').val(response.file);
		}

	})

}

function download_ref(){
	var file = $('#file').val();
	location.href = base_url + 'mahasiswa/download_referensi/'+ file;
}

function download_prasyarat_proposal(nim,file){
	location.href = base_url + 'admin/download_prasyarat_proposal/'+nim +'/'+ file;
}

function download_prasyarat_skripsi(nim,file){
	location.href = base_url + 'admin/download_prasyarat_skripsi/'+nim +'/'+ file;
}

function download_prasyarat_yudisium(nim,file){
	location.href = base_url + 'admin/download_prasyarat_yudisium/'+nim +'/'+ file;
}

var getDosen = (function () {
	$("#menu-prodi").change(function () {
		var id = $(this).val();
		var data_dosen1 = '';
		var data_dosen2 = '';
		var data_dosen3 = '';
		var data_dosen4 = '';
		if (id.length) {
			$.ajax({
				url: base_url + 'kaprodi/get_dosen',
				type: 'post',
				data: 'prodi_id=' + id,
				dataType: "json",
				success: function (dosen) {
					data_dosen1 += '<option value="" selected>Pembimbing 1</option>';
					data_dosen2 += '<option value="" selected>Pembimbing 2</option>';
					data_dosen3 += '<option value="" selected>Penguji 1</option>';
					data_dosen4 += '<option value="" selected>Penguji 2</option>';
					for (let i = 0; i < dosen.length; i++) {
						data_dosen1 += '<option value="' + dosen[i].user_id + '">' + dosen[i].nama + '</option>';
						data_dosen2 += '<option value="' + dosen[i].user_id + '">' + dosen[i].nama + '</option>';
						data_dosen3 += '<option value="' + dosen[i].user_id + '">' + dosen[i].nama + '</option>';
						data_dosen4 += '<option value="' + dosen[i].user_id + '">' + dosen[i].nama + '</option>';
					}
					$('#menu-dosen1').html(data_dosen1);
					$('#menu-dosen2').html(data_dosen2);
					$('#menu-dosen3').html(data_dosen3);
					$('#menu-dosen4').html(data_dosen4);


				}

			})
		} else {
			data_dosen1 += '<option value="" selected>Pembimbing 1</option>';
			data_dosen2 += '<option value="" selected>Pembimbing 2</option>';
			$('#menu-dosen1').html(data_dosen1);
			$('#menu-dosen2').html(data_dosen2);
		}


	});
})();


function create_menudatadosen(data){
	var menu = "";
	menu += '<div class="animate__animated animate__bounceInRight">';
	menu += '<ul class="nav nav-tabs" id="myTab" role="tablist">';
	menu += '<li class="nav-item">';
	menu += '<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Proposal</a>';
	menu += '</li>';
	menu +=  '<li class="nav-item">';
	menu += '<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Skripsi</a>';
	menu += '</li>';
	menu += '</ul>';
	menu += '<div class="tab-content" id="myTabContent">';
	menu += '<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">';
	menu += '<div class="card" style="width: 18rem;">';
	menu += '<div class="card-body">';
	menu += '<p>pembimbing 1: '+data.pembimbing1proposal+' skripsi</p>';
	menu += '<p>pembimbing 2: '+data.pembimbing2proposal+' skripsi</p>';
	menu += '<p>penguji 1: '+data.penguji1proposal+' skripsi</p>';
	menu += '<p>penguji 2: '+data.penguji2proposal+' skripsi</p>';
	menu += '<button type="button" class="btn btn-outline-primary" onClick="tampilkan_grafik('+data.dosen_id+')">Grafik</button>';
	// menu += '<a id="detail_dosen" href="#" class="btn btn-outline-primary" target="_blank">Show more</a>';
	menu += '</div>';
	menu += '</div>';
	menu += '</div>';
	menu += '<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">';
	menu += '<div class="card" style="width: 18rem;">';
	menu += '<div class="card-body">';
	menu += '<p>pembimbing 1: '+data.pembimbing1skripsi+' skripsi</p>';
	menu += '<p>pembimbing 2: '+data.pembimbing2skripsi+' skripsi</p>';
	menu += '<p>penguji 1: '+data.penguji1skripsi+' skripsi</p>';
	menu += '<p>penguji 2: '+data.penguji2skripsi+' skripsi</p>';
	menu += '</div>';
	menu += '</div>';
	menu += '</div>';
	menu += '</div>';
	menu += '</div>';
$('#data-dosen').html(menu);
}


$("#menu-dosen1").change(function (e) { 
	e.preventDefault();
	var id = $(this).val();
	$.ajax({
		type: "post",
		url: base_url+"kaprodi/menu_asidedosen",
		data: "dosen_id="+id,
		dataType: "json",
		success: function (response) {
			create_menudatadosen(response);
		}
	});
});

$("#menu-dosen2").change(function (e) { 
	e.preventDefault();
	var id = $(this).val();
	$.ajax({
		type: "post",
		url: base_url+"kaprodi/menu_asidedosen",
		data: "dosen_id="+id,
		dataType: "json",
		success: function (response) {
			create_menudatadosen(response);
		}
	});
});
$("#menu-dosen3").change(function (e) { 
	e.preventDefault();
	var id = $(this).val();
	$.ajax({
		type: "post",
		url: base_url+"kaprodi/menu_asidedosen",
		data: "dosen_id="+id,
		dataType: "json",
		success: function (response) {
			create_menudatadosen(response);
		}
	});
});
$("#menu-dosen4").change(function (e) { 
	e.preventDefault();
	var id = $(this).val();
	$.ajax({
		type: "post",
		url: base_url+"kaprodi/menu_asidedosen",
		data: "dosen_id="+id,
		dataType: "json",
		success: function (response) {
			create_menudatadosen(response);
		}
	});
});

function tampilkan_grafik(id){
	let grafik1 = '';
	let grafik2 = '';
	grafik1 +='<div class="card animate__animated animate__fadeInDown">';
	grafik1 +='<div class="card-body">';
	grafik1 +='<canvas id="proposal_chart" width="100%" height="50%"></canvas>';
	grafik1 +='</div>';
	grafik1 +='</div>';

	grafik2+='<div class="card animate__animated animate__fadeInDown">';
	grafik2+='<div class="card-body">';
	grafik2+='<canvas id="skripsi_chart" width="100%" height="50%"></canvas>';
	grafik2+='</div>';
	grafik2+='</div>';

	$.ajax({
		type: "post",
		url: base_url+"kaprodi/menu_asidedosen",
		data: "dosen_id="+id,
		dataType: "json",
		success: function (data) {
			$('#informasi_proposal').html(grafik1);
			$('#informasi_skripsi').html(grafik2);
			grafikTotalProposal(data);
			grafikTotalSkripsi(data);
		}
	});

}


function grafikTotalProposal(data) {
	const ctx = document.getElementById('proposal_chart').getContext('2d');
	const mixedChart = new Chart(ctx, {
		data: {
			datasets: [{
				type: 'bar',
				label: 'Total Proposal',
				data: [data.pembimbing1proposal,data.pembimbing2proposal,data.penguji1proposal,data.penguji2proposal],
				backgroundColor: 'rgba(75, 192, 192, 0.2)'
			}, 
		],
			labels: ['Pembimbing 1', 'Pembimbing 2', 'Penguji 1', 'Penguji 2']
		},
		options: {
			plugins: {
				title: {
					display: true,
					text: 'Jumlah Dosen Sebagai Pembimbing Dan Penguji Proposal'
				}
			},
			animations:false
		}
	});
	

};

function grafikTotalSkripsi(data) {
	const ctx = document.getElementById('skripsi_chart').getContext('2d');
	const mixedChart = new Chart(ctx, {
		data: {
			datasets: [{
				type: 'bar',
				label: 'Total Skripsi',
				data: [data.pembimbing1skripsi, data.pembimbing2skripsi, data.penguji1skripsi, data.penguji2skripsi],
				backgroundColor: 'rgba(153, 102, 255, 0.2)'
			}, 
		],
			labels: ['Pembimbing 1', 'Pembimbing 2', 'Penguji 1', 'Penguji 2']
		},
		options: {
			plugins: {
				title: {
					display: true,
					text: 'Jumlah Dosen Sebagai Pembimbing Dan Penguji Skripsi'
				}
			},
			animations:false
		}
	});
	

};


function btn_prasyarat_proposal(status) { 
	if (status == 'diterima') {
		if ($('#btn-halprop1').length) {
			$('#btn-halprop1').prop('disabled',false);
		}
		if ($('#btn-halprop2').length) {
			$('#btn-halprop2').prop('disabled',false);
		}
	}else{
		if ($('#btn-halprop1').length) {
			$('#btn-halprop1').prop('disabled',true);
		}
		if ($('#btn-halprop2').length) {
			$('#btn-halprop2').prop('disabled',true);
		}
	}
 }

 function btn_prasyarat_skripsi(status) { 
	if (status == 'diterima') {
		if ($('#btn-halskrip1').length) {
			$('#btn-halskrip1').prop('disabled',false);
		}
		if ($('#btn-halskrip2').length) {
			$('#btn-halskrip2').prop('disabled',false);
		}
	}else{
		if ($('#btn-halskrip1').length) {
			$('#btn-halskrip1').prop('disabled',true);
		}
		if ($('#btn-halskrip2').length) {
			$('#btn-halskrip2').prop('disabled',true);
		}
	}
 }

 function btn_prasyarat_yudisium(status) { 
	if (status == 'diterima') {
		if ($('#btn-halyud1').length) {
			$('#btn-halyud1').prop('disabled',false);
		}
		if ($('#btn-halyud2').length) {
			$('#btn-halyud2').prop('disabled',false);
		}
	}else{
		if ($('#btn-halyud1').length) {
			$('#btn-halyud1').prop('disabled',true);
		}
		if ($('#btn-halyud2').length) {
			$('#btn-halyud2').prop('disabled',true);
		}
	}
 }

var check_prasyarat_proposal = (function () { 
	$('#check_proposal').change(function () {
		let id = $('#id_prasyarat').data('id');
		$.ajax({
			type: "post",
			url: base_url + "admin/update_check_prasyarat_proposal",
			data: "status=file_proposal"+'&id='+id,
			dataType: "json",
			success: function (response) {
				btn_prasyarat_proposal(response);
			}
		});
	});
	$('#check_kdn').change(function () {
		let id = $('#id_prasyarat').data('id');
		$.ajax({
			type: "post",
			url: base_url + "admin/update_check_prasyarat_proposal",
			data: "status=file_kdn"+'&id='+id,
			dataType: "json",
			success: function (response) {
				btn_prasyarat_proposal(response);
			}
		});
	});
	$('#check_kartubimbingan').change(function () {
		let id = $('#id_prasyarat').data('id');
		$.ajax({
			type: "post",
			url: base_url + "admin/update_check_prasyarat_proposal",
			data: "status=file_kartubimbingan"+'&id='+id,
			dataType: "json",
			success: function (response) {
				btn_prasyarat_proposal(response);
				
			}
		});
	});
	$('#check_khs').change(function () {
		let id = $('#id_prasyarat').data('id');
		$.ajax({
			type: "post",
			url: base_url + "admin/update_check_prasyarat_proposal",
			data: "status=file_khs"+'&id='+id,
			dataType: "json",
			success: function (response) {
				btn_prasyarat_proposal(response);
			}
		});
	});
 })();

 var check_prasyarat_skripsi = (function () { 
	$('#check_transkipnilai').change(function () {
		let id = $('#id_prasyarat').data('id');
		$.ajax({
			type: "post",
			url: base_url + "admin/update_check_prasyarat_skripsi",
			data: "status=file_transkipnilai"+'&id='+id,
			dataType: "json",
			success: function (response) {
				btn_prasyarat_skripsi(response);
			}
		});
	});
	$('#check_biodatafoto').change(function () {
		let id = $('#id_prasyarat').data('id');
		$.ajax({
			type: "post",
			url: base_url + "admin/update_check_prasyarat_skripsi",
			data: "status=file_biodatafoto"+'&id='+id,
			dataType: "json",
			success: function (response) {
				btn_prasyarat_skripsi(response);
			}
		});
	});

	$('#check_suratlab').change(function () {
		let id = $('#id_prasyarat').data('id');
		$.ajax({
			type: "post",
			url: base_url + "admin/update_check_prasyarat_skripsi",
			data: "status=file_suratlab"+'&id='+id,
			dataType: "json",
			success: function (response) {
				btn_prasyarat_skripsi(response);
			}
		});
	});

	$('#check_bebaspiutang').change(function () {
		let id = $('#id_prasyarat').data('id');
		$.ajax({
			type: "post",
			url: base_url + "admin/update_check_prasyarat_skripsi",
			data: "status=file_bebaspiutang"+'&id='+id,
			dataType: "json",
			success: function (response) {
				btn_prasyarat_skripsi(response);
			}
		});
	});
	$('#check_surattugas').change(function () {
		let id = $('#id_prasyarat').data('id');
		$.ajax({
			type: "post",
			url: base_url + "admin/update_check_prasyarat_skripsi",
			data: "status=file_surattugas"+'&id='+id,
			dataType: "json",
			success: function (response) {
				btn_prasyarat_skripsi(response);
			}
		});
	});
	$('#check_coverskripsi').change(function () {
		let id = $('#id_prasyarat').data('id');
		$.ajax({
			type: "post",
			url: base_url + "admin/update_check_prasyarat_skripsi",
			data: "status=file_coverskripsi"+'&id='+id,
			dataType: "json",
			success: function (response) {
				btn_prasyarat_skripsi(response);
			}
		});
	});
	$('#check_kartubimbingan').change(function () {
		let id = $('#id_prasyarat').data('id');
		$.ajax({
			type: "post",
			url: base_url + "admin/update_check_prasyarat_skripsi",
			data: "status=file_kartubimbingan"+'&id='+id,
			dataType: "json",
			success: function (response) {
				btn_prasyarat_skripsi(response);
			}
		});
	});
	$('#check_piagam').change(function () {
		let id = $('#id_prasyarat').data('id');
		$.ajax({
			type: "post",
			url: base_url + "admin/update_check_prasyarat_skripsi",
			data: "status=file_piagam"+'&id='+id,
			dataType: "json",
			success: function (response) {
				btn_prasyarat_skripsi(response);
			}
		});
	});
	$('#check_buktisumbangan').change(function () {
		let id = $('#id_prasyarat').data('id');
		$.ajax({
			type: "post",
			url: base_url + "admin/update_check_prasyarat_skripsi",
			data: "status=file_buktisumbangan"+'&id='+id,
			dataType: "json",
			success: function (response) {
				btn_prasyarat_skripsi(response);
			}
		});
	});
	$('#check_fileskripsi').change(function () {
		let id = $('#id_prasyarat').data('id');
		$.ajax({
			type: "post",
			url: base_url + "admin/update_check_prasyarat_skripsi",
			data: "status=file_skripsi"+'&id='+id,
			dataType: "json",
			success: function (response) {
				btn_prasyarat_skripsi(response);
			}
		});
	});
	$('#check_buktiartikel').change(function () {
		let id = $('#id_prasyarat').data('id');
		$.ajax({
			type: "post",
			url: base_url + "admin/update_check_prasyarat_skripsi",
			data: "status=file_buktiartikel"+'&id='+id,
			dataType: "json",
			success: function (response) {
				btn_prasyarat_skripsi(response);
			}
		});
	});
	
 })();

 var check_prasyarat_yudisium = (function () { 
	$('#check_buktirevisi').change(function () {
		let id = $('#id_prasyarat').data('id');
		$.ajax({
			type: "post",
			url: base_url + "admin/update_check_prasyarat_yudisium",
			data: "status=file_buktirevisi"+'&id='+id,
			dataType: "json",
			success: function (response) {
				console.log(response);
				btn_prasyarat_yudisium(response);
			}
		});
	});
	$('#check_buktipublikasi').change(function () {
		let id = $('#id_prasyarat').data('id');
		$.ajax({
			type: "post",
			url: base_url + "admin/update_check_prasyarat_yudisium",
			data: "status=file_buktipublikasi"+'&id='+id,
			dataType: "json",
			success: function (response) {
				btn_prasyarat_yudisium(response);
			}
		});
	});

 })();




 function halaman_jadwal_seminar() { 
	let id = $('#id_prasyarat').data('mahasiswa_id');
	location.href = base_url + "admin/jadwal_seminar_proposal/"+id;
  }
 function halaman_jadwal_sidang() { 
	let id = $('#id_prasyarat').data('mahasiswa_id');
	location.href = base_url + "admin/jadwal_sidang_skripsi/"+id;
  }
 function halaman_jadwal_yudisium() { 
	let id = $('#id_prasyarat').data('mahasiswa_id');
	location.href = base_url + "admin/jadwal_yudisium/"+id;
  }

  function halaman_absen_proposal(id) { 
	location.href = base_url + "admin/absen_proposal/"+id;
  }
  function halaman_absen_skripsi(id) { 
	location.href = base_url + "admin/absen_skripsi/"+id;
  }


  var check_absen_proposal = (function () { 
	$('#check_pembimbing1').change(function () {
		let id = $('#id_absen').data('id');
		$.ajax({
			type: "post",
			url: base_url + "admin/update_check_absen_dosen",
			data: "status=pembimbing_1"+'&id='+id,
			dataType: "json",
			success: function (response) {
				console.log(response);
			}
		});
	});
	$('#check_pembimbing2').change(function () {
		let id = $('#id_absen').data('id');
		$.ajax({
			type: "post",
			url: base_url + "admin/update_check_absen_dosen",
			data: "status=pembimbing_2"+'&id='+id,
			dataType: "json",
			success: function (response) {
				console.log(response);
			}
		});
	});
	$('#check_penguji1').change(function () {
		let id = $('#id_absen').data('id');
		$.ajax({
			type: "post",
			url: base_url + "admin/update_check_absen_dosen",
			data: "status=penguji_1"+'&id='+id,
			dataType: "json",
			success: function (response) {
				console.log(response);
			}
		});
	});
	$('#check_penguji2').change(function () {
		let id = $('#id_absen').data('id');
		$.ajax({
			type: "post",
			url: base_url + "admin/update_check_absen_dosen",
			data: "status=penguji_2"+'&id='+id,
			dataType: "json",
			success: function (response) {
				console.log(response);
			}
		});
	});
 })();



 var check_absen_skripsi = (function () { 
	$('#check_pembimbing1s').change(function () {
		let id = $('#id_absen').data('id');
		$.ajax({
			type: "post",
			url: base_url + "admin/update_check_absen_dosen2",
			data: "status=pembimbing_1"+'&id='+id,
			dataType: "json",
			success: function (response) {
				console.log(response);
			}
		});
	});
	$('#check_pembimbing2s').change(function () {
		let id = $('#id_absen').data('id');
		$.ajax({
			type: "post",
			url: base_url + "admin/update_check_absen_dosen2",
			data: "status=pembimbing_2"+'&id='+id,
			dataType: "json",
			success: function (response) {
				console.log(response);
			}
		});
	});
	$('#check_penguji1s').change(function () {
		let id = $('#id_absen').data('id');
		$.ajax({
			type: "post",
			url: base_url + "admin/update_check_absen_dosen2",
			data: "status=penguji_1"+'&id='+id,
			dataType: "json",
			success: function (response) {
				console.log(response);
			}
		});
	});
	$('#check_penguji2s').change(function () {
		let id = $('#id_absen').data('id');
		$.ajax({
			type: "post",
			url: base_url + "admin/update_check_absen_dosen2",
			data: "status=penguji_2"+'&id='+id,
			dataType: "json",
			success: function (response) {
				console.log(response);
			}
		});
	});
 })();


















