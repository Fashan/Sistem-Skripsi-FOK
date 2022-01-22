function acc_proposal(id, status) {
	if (confirm('apakah Anda ingin ACC proposal ini?')) {
		$.ajax({
			url: base_url + 'bimbingan/acc_proposal',
			type: 'post',
			data: 'id=' + id + '&status=' + status,
			dataType: "json",
			success: function (response) {
				if (response === 'success') {
					if (status == 'status_p1') {
						button = '<button class="btn btn-danger mt-1" onclick="batal_proposal(' + id + ',\'status_p1\')">batalkan Seminar Proposal</button>';
						$('.button-acc').html(button);
					}
					if (status == 'status_p2') {
						button = '<button class="btn btn-danger mt-1" onclick="batal_proposal(' + id + ',\'status_p2\')">batalkan Seminar Proposal</button>';
						$('.button-acc').html(button);
					}
					if (status == 'status_pnj1') {
						button = '<button class="btn btn-danger mt-1" onclick="batal_proposal(' + id + ',\'status_pnj1\')">batalkan ACC</button>';
						$('.button-acc').html(button);
						$('.unduh-proposal').html('<button data-toggle="modal" data-target="#nilai_proposal" class="btn btn-success text-white animate__animated animate__zoomIn">berikan nilai</button>');
					}
					if (status == 'status_pnj2') {
						button = '<button class="btn btn-danger mt-1" onclick="batal_proposal(' + id + ',\'status_pnj2\')">batalkan ACC</button>';
						$('.button-acc').html(button);
						$('.unduh-proposal').html('<button data-toggle="modal" data-target="#nilai_proposal" class="btn btn-success text-white animate__animated animate__zoomIn">berikan nilai</button>');
					}
				}

			}
		});
	}
}

function acc_skripsi(id, status) {
	if (confirm('apakah Anda ingin ACC skripsi ini?')) {
		$.ajax({
			url: base_url + 'bimbingan/acc_skripsi',
			type: 'post',
			data: 'id=' + id + '&status=' + status,
			dataType: "json",
			success: function (response) {
				if (response === 'success') {
					if (status == 'status_pem1') {
						button = '<button class="btn btn-danger mt-1" onclick="batal_skripsi(' + id + ',\'status_pem1\')">batalkan Sidang Skripsi</button>';
						$('.button-acc').html(button);
					}
					if (status == 'status_pem2') {
						button = '<button class="btn btn-danger mt-1" onclick="batal_skripsi(' + id + ',\'status_pem2\')">batalkan Sidang Skripsi</button>';
						$('.button-acc').html(button);
					}
					if (status == 'status_pnj1') {
						button = '<button class="btn btn-danger mt-1" onclick="batal_skripsi(' + id + ',\'status_pnj1\')">batalkan ACC</button>';
						$('.button-acc').html(button);
						$('.unduh-skripsi').html('<button data-toggle="modal" data-target="#nilai_skripsi" class="btn btn-success text-white animate__animated animate__zoomIn">berikan nilai</button>');
					}
					if (status == 'status_pnj2') {
						button = '<button class="btn btn-danger mt-1" onclick="batal_skripsi(' + id + ',\'status_pnj2\')">batalkan ACC</button>';
						$('.button-acc').html(button);
						$('.unduh-skripsi').html('<button data-toggle="modal" data-target="#nilai_skripsi" class="btn btn-success text-white animate__animated animate__zoomIn">berikan nilai</button>');
					}

				}

			}
		});

	}
}


function batal_proposal(id, status) {
	if (confirm('apakah Anda ingin membatalkan Seminar Proposal?')) {
		$.ajax({
			url: base_url + 'bimbingan/batal_proposal',
			type: 'post',
			data: 'id=' + id + '&status=' + status,
			dataType: "json",
			success: function (response) {
				if (response === 'success') {
					if (status == 'status_p1') {
						button = '<button class="btn btn-primary mt-1" onclick="acc_proposal(' + id + ',\'status_p1\')">ACC Proposal</button>';
						$('.button-acc').html(button);
					} 
					if (status == 'status_p2') {
						button = '<button class="btn btn-primary mt-1" onclick="acc_proposal(' + id + ',\'status_p2\')">ACC Proposal</button>';
						$('.button-acc').html(button);
					} 


					if (status == 'status_pnj1') {
						button = '<button class="btn btn-primary mt-1" onclick="acc_proposal(' + id + ',\'status_pnj1\')">ACC Proposal</button>';
						$('.button-acc').html(button);
						let link = $('.unduh-proposal').data('link');
						$('.unduh-proposal').html('<a href="'+link+'" class="btn btn-success text-white animate__animated animate__zoomIn">Unduh Proposal Fix</a>');
						
					}

					if (status == 'status_pnj2') {
						button = '<button class="btn btn-primary mt-1" onclick="acc_proposal(' + id + ',\'status_pnj2\')">ACC Proposal</button>';
						$('.button-acc').html(button);
						let link = $('.unduh-proposal').data('link');
						$('.unduh-proposal').html('<a href="'+link+'" class="btn btn-success text-white animate__animated animate__zoomIn">Unduh Proposal Fix</a>');
						
					}
				}

			}
		});

	}
}



function batal_skripsi(id, status) {
	if (confirm('apakah Anda ingin membatalkan Sidang Skripsi?')) {
		$.ajax({
			url: base_url + 'bimbingan/batal_skripsi',
			type: 'post',
			data: 'id=' + id + '&status=' + status,
			dataType: "json",
			success: function (response) {
				if (response === 'success') {
					if (status == 'status_pem1') {
						button = '<button class="btn btn-primary mt-1" onclick="acc_skripsi(' + id + ',\'status_pem1\')">ACC Skripsi</button>';
						$('.button-acc').html(button);
					}
					if (status == 'status_pem2') {
						button = '<button class="btn btn-primary mt-1" onclick="acc_skripsi(' + id + ',\'status_pem2\')">ACC Skripsi</button>';
						$('.button-acc').html(button);
					}
					if (status == 'status_pnj1') {
						button = '<button class="btn btn-primary mt-1" onclick="acc_skripsi(' + id + ',\'status_pnj1\')">ACC Skripsi</button>';
						$('.button-acc').html(button);
						let link = $('.unduh-skripsi').data('link');
						$('.unduh-skripsi').html('<a href="'+link+'" class="btn btn-success text-white animate__animated animate__zoomIn">Unduh Skripsi Fix</a>');
					}
					if (status == 'status_pnj2') {
						button = '<button class="btn btn-primary mt-1" onclick="acc_skripsi(' + id + ',\'status_pnj2\')">ACC Skripsi</button>';
						$('.button-acc').html(button);
						let link = $('.unduh-skripsi').data('link');
						$('.unduh-skripsi').html('<a href="'+link+'" class="btn btn-success text-white animate__animated animate__zoomIn">Unduh Skripsi Fix</a>');
					}
				}

			}
		});

	}
}
