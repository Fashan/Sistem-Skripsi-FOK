var userTable = $('#datatable-user').DataTable({
	responsive: true,
	processing: true,
	serverside: true,
	ajax: base_url + 'user/get_ajax',
	language: {
		paginate: {
			previous: "<i class='fas fa-angle-left'>",
			next: "<i class='fas fa-angle-right'>"
		}
	},
	keys: !0,
});

var prodiTable = $('#datatable-prodi').DataTable({
	responsive: true,
	processing: true,
	serverside: true,
	ajax: base_url + 'prodi/get_ajax',
	language: {
		paginate: {
			previous: "<i class='fas fa-angle-left'>",
			next: "<i class='fas fa-angle-right'>"
		}
	},
});

var daftarskripsiTable = $('#datatable-daftar_skripsi').DataTable({
	responsive: true,
	processing: true,
	serverside: true,
	ajax: base_url + 'dosen/tabel_daftarskripsi',
	language: {
		paginate: {
			previous: "<i class='fas fa-angle-left'>",
			next: "<i class='fas fa-angle-right'>"
		}
	},
});

var daftarskripsiTable = $('#datatable-data_yudisium').DataTable({
	responsive: true,
	processing: true,
	serverside: true,
	ajax: base_url + 'dosen/tabel_datayudisium',
	language: {
		paginate: {
			previous: "<i class='fas fa-angle-left'>",
			next: "<i class='fas fa-angle-right'>"
		}
	},
});

var jurusanTable = $('#datatable-jurusan').DataTable({
	responsive: true,
	processing: true,
	serverside: true,
	ajax: base_url + 'jurusan/get_ajax',
	language: {
		paginate: {
			previous: "<i class='fas fa-angle-left'>",
			next: "<i class='fas fa-angle-right'>"
		}
	},
});

var ideskripsiTable = $('#datatable-ideskripsi').DataTable({
	responsive: true,
	processing: true,
	serverside: true,
	ajax: base_url + 'mahasiswa/tabel_ajukanjudul',
	language: {
		paginate: {
			previous: "<i class='fas fa-angle-left'>",
			next: "<i class='fas fa-angle-right'>"
		}
	},
});
var ideskripsi2Table = $('#dashboard-ideskripsi').DataTable({
	responsive: true,
	processing: true,
	serverside: true,
	ajax: base_url + 'mahasiswa/tabel_dashboardajukanjudul',
	language: {
		paginate: {
			previous: "<i class='fas fa-angle-left'>",
			next: "<i class='fas fa-angle-right'>"
		}
	},
});
var judulmahasiswaTable = $('#dashboard-judulmahasiswa').DataTable({
	responsive: true,
	processing: true,
	serverside: true,
	ajax: base_url + 'kaprodi/tabel_judulmahasiswa',
	language: {
		paginate: {
			previous: "<i class='fas fa-angle-left'>",
			next: "<i class='fas fa-angle-right'>"
		}
	},
});

var dashboardPATable = $('#dashboard-PA').DataTable({
	responsive: true,
	processing: true,
	serverside: true,
	ajax: base_url + 'PA/tabel_judulmahasiswa',
	language: {
		paginate: {
			previous: "<i class='fas fa-angle-left'>",
			next: "<i class='fas fa-angle-right'>"
		}
	},
});

// pembimbing proposal
var logbimbingan1Table = $('#datatable-logbimbingan1').DataTable({
	responsive: true,
	processing: true,
	serverside: true,
	ajax: base_url + 'bimbingan/tabel_bimbingan_p1',
	language: {
		paginate: {
			previous: "<i class='fas fa-angle-left'>",
			next: "<i class='fas fa-angle-right'>"
		}
	},
});



var logbimbingan2Table = $('#datatable-logbimbingan2').DataTable({
	responsive: true,
	processing: true,
	serverside: true,
	ajax: base_url + 'bimbingan/tabel_bimbingan_p2',
	language: {
		paginate: {
			previous: "<i class='fas fa-angle-left'>",
			next: "<i class='fas fa-angle-right'>"
		}
	},
});

// pembimbing skripsi
var logbimbingan3Table = $('#datatable-logbimbingan3').DataTable({
	responsive: true,
	processing: true,
	serverside: true,
	ajax: base_url + 'bimbingan/tabel_bimbingan_pem1',
	language: {
		paginate: {
			previous: "<i class='fas fa-angle-left'>",
			next: "<i class='fas fa-angle-right'>"
		}
	},
});

var logbimbingan4Table = $('#datatable-logbimbingan4').DataTable({
	responsive: true,
	processing: true,
	serverside: true,
	ajax: base_url + 'bimbingan/tabel_bimbingan_pem2',
	language: {
		paginate: {
			previous: "<i class='fas fa-angle-left'>",
			next: "<i class='fas fa-angle-right'>"
		}
	},
});

// penguji skripsi
var logbimbingan5Table = $('#datatable-logbimbingan5').DataTable({
	responsive: true,
	processing: true,
	serverside: true,
	ajax: base_url + 'bimbingan/tabel_bimbingan_pnj1',
	language: {
		paginate: {
			previous: "<i class='fas fa-angle-left'>",
			next: "<i class='fas fa-angle-right'>"
		}
	},
});

var logbimbingan6Table = $('#datatable-logbimbingan6').DataTable({
	responsive: true,
	processing: true,
	serverside: true,
	ajax: base_url + 'bimbingan/tabel_bimbingan_pnj2',
	language: {
		paginate: {
			previous: "<i class='fas fa-angle-left'>",
			next: "<i class='fas fa-angle-right'>"
		}
	},
});

// penguji proposal
var logbimbingan7Table = $('#datatable-logbimbingan7').DataTable({
	responsive: true,
	processing: true,
	serverside: true,
	ajax: base_url + 'bimbingan/tabel_bimbingan_pnj1_prop',
	language: {
		paginate: {
			previous: "<i class='fas fa-angle-left'>",
			next: "<i class='fas fa-angle-right'>"
		}
	},
});

var logbimbingan8Table = $('#datatable-logbimbingan8').DataTable({
	responsive: true,
	processing: true,
	serverside: true,
	ajax: base_url + 'bimbingan/tabel_bimbingan_pnj2_prop',
	language: {
		paginate: {
			previous: "<i class='fas fa-angle-left'>",
			next: "<i class='fas fa-angle-right'>"
		}
	},
});



var pembimbingTable = $('#datatable-pembimbing').DataTable({
	responsive: true,
	processing: true,
	serverside: true,
	ajax: base_url + 'dosen/tabel_pembimbing',
	language: {
		paginate: {
			previous: "<i class='fas fa-angle-left'>",
			next: "<i class='fas fa-angle-right'>"
		}
	},
});

var pengujiTable = $('#datatable-penguji').DataTable({
	responsive: true,
	processing: true,
	serverside: true,
	ajax: base_url + 'dosen/tabel_penguji',
	language: {
		paginate: {
			previous: "<i class='fas fa-angle-left'>",
			next: "<i class='fas fa-angle-right'>"
		}
	},
});

var prasyarat_pTable = $('#datatable-prasyarat_p').DataTable({
	responsive: true,
	processing: true,
	serverside: true,
	ajax: base_url + 'admin/tabel_prasyarat_p',
	language: {
		paginate: {
			previous: "<i class='fas fa-angle-left'>",
			next: "<i class='fas fa-angle-right'>"
		}
	},
});

var prasyarat_sTable = $('#datatable-prasyarat_s').DataTable({
	responsive: true,
	processing: true,
	serverside: true,
	ajax: base_url + 'admin/tabel_prasyarat_s',
	language: {
		paginate: {
			previous: "<i class='fas fa-angle-left'>",
			next: "<i class='fas fa-angle-right'>"
		}
	},
});

var prasyarat_sTable = $('#datatable-prasyarat_y').DataTable({
	responsive: true,
	processing: true,
	serverside: true,
	ajax: base_url + 'admin/tabel_prasyarat_y',
	language: {
		paginate: {
			previous: "<i class='fas fa-angle-left'>",
			next: "<i class='fas fa-angle-right'>"
		}
	},
});
var jadwal_pTable = $('#datatable-jadwal_p').DataTable({
	responsive: true,
	processing: true,
	serverside: true,
	ajax: base_url + 'admin/tabel_jadwal_p',
	language: {
		paginate: {
			previous: "<i class='fas fa-angle-left'>",
			next: "<i class='fas fa-angle-right'>"
		}
	},
});

var jadwal_sTable = $('#datatable-jadwal_s').DataTable({
	responsive: true,
	processing: true,
	serverside: true,
	ajax: base_url + 'admin/tabel_jadwal_s',
	language: {
		paginate: {
			previous: "<i class='fas fa-angle-left'>",
			next: "<i class='fas fa-angle-right'>"
		}
	},
});

var jadwal_yTable = $('#datatable-jadwal_y').DataTable({
	responsive: true,
	processing: true,
	serverside: true,
	ajax: base_url + 'admin/tabel_jadwal_y',
	language: {
		paginate: {
			previous: "<i class='fas fa-angle-left'>",
			next: "<i class='fas fa-angle-right'>"
		}
	},
});

var nilai_proposalTable = $('#datatable-nilai_proposal').DataTable({
	responsive: true,
	processing: true,
	serverside: true,
	ajax: base_url + 'mahasiswa/tabel_nilaiproposal',
	language: {
		paginate: {
			previous: "<i class='fas fa-angle-left'>",
			next: "<i class='fas fa-angle-right'>"
		}
	},
});

var nilai_skripsiTable = $('#datatable-nilai_skripsi').DataTable({
	responsive: true,
	processing: true,
	serverside: true,
	ajax: base_url + 'mahasiswa/tabel_nilaiskripsi',
	language: {
		paginate: {
			previous: "<i class='fas fa-angle-left'>",
			next: "<i class='fas fa-angle-right'>"
		}
	},
});


// dosen sebagai pembimbing proposal

if ($('#datatable-logbimbingandosen1').length) {
	var id = $('#identitas').data('mahasiswa_id');
	var dosenrole = $('#identitas').data('dosenrole1');
	var logbimbingandosen1Table = $('#datatable-logbimbingandosen1').DataTable({
		responsive: true,
		processing: true,
		serverside: true,
		ajax: base_url + 'bimbingan/tabel_bimbingandosen_p1/' + id + '/' + dosenrole,
		language: {
			paginate: {
				previous: "<i class='fas fa-angle-left'>",
				next: "<i class='fas fa-angle-right'>"
			}
		},
	});

}



if ($('#datatable-logbimbingandosen2').length) {
	var id = $('#identitas').data('mahasiswa_id');
	var dosen_id = $('#identitas').data('dosen2id');
	var dosen_role = $('#identitas').data('dosenrole2');
	var logbimbingandosen2Table = $('#datatable-logbimbingandosen2').DataTable({
		responsive: true,
		processing: true,
		serverside: true,
		ajax: base_url + 'bimbingan/tabel_bimbingandosen_p2/' + id + '/' + dosen_id + '/' + dosen_role,
		language: {
			paginate: {
				previous: "<i class='fas fa-angle-left'>",
				next: "<i class='fas fa-angle-right'>"
			}
		},
	});

}



// dosen sebagai pembimbing skripsi

if ($('#datatable-logbimbingandosen3').length) {

	var id = $('#identitas').data('mahasiswa_id');
	var dosenrole = $('#identitas').data('dosenrole1');
	var logbimbingandosen3Table = $('#datatable-logbimbingandosen3').DataTable({
		responsive: true,
		processing: true,
		serverside: true,
		ajax: base_url + 'bimbingan/tabel_bimbingandosen_pem1/' + id + '/' + dosenrole,
		language: {
			paginate: {
				previous: "<i class='fas fa-angle-left'>",
				next: "<i class='fas fa-angle-right'>"
			}
		},
	});

}




if ($('#datatable-logbimbingandosen4').length) {


	var id = $('#identitas').data('mahasiswa_id');
	var dosen_id = $('#identitas').data('dosen2id');
	var dosen_role = $('#identitas').data('dosenrole2');
	var logbimbingandosen4Table = $('#datatable-logbimbingandosen4').DataTable({
		responsive: true,
		processing: true,
		serverside: true,
		ajax: base_url + 'bimbingan/tabel_bimbingandosen_pem2/' + id + '/' + dosen_id + '/' + dosen_role,
		language: {
			paginate: {
				previous: "<i class='fas fa-angle-left'>",
				next: "<i class='fas fa-angle-right'>"
			}
		},
	});


}

// dosen sebagai penguji skripsi

if ($('#datatable-logbimbingandosen5').length) {

	var id = $('#identitas').data('mahasiswa_id');
	var dosenrole = $('#identitas').data('dosenrole1');
	var logbimbingandosen5Table = $('#datatable-logbimbingandosen5').DataTable({
		responsive: true,
		processing: true,
		serverside: true,
		ajax: base_url + 'bimbingan/tabel_bimbingandosen_pnj1/' + id + '/' + dosenrole,
		language: {
			paginate: {
				previous: "<i class='fas fa-angle-left'>",
				next: "<i class='fas fa-angle-right'>"
			}
		},
	});

}




if ($('#datatable-logbimbingandosen6').length) {


	var id = $('#identitas').data('mahasiswa_id');
	var dosen_id = $('#identitas').data('dosen2id');
	var dosen_role = $('#identitas').data('dosenrole2');
	var logbimbingandosen6Table = $('#datatable-logbimbingandosen6').DataTable({
		responsive: true,
		processing: true,
		serverside: true,
		ajax: base_url + 'bimbingan/tabel_bimbingandosen_pnj2_prop/' + id + '/' + dosen_id + '/' + dosen_role,
		language: {
			paginate: {
				previous: "<i class='fas fa-angle-left'>",
				next: "<i class='fas fa-angle-right'>"
			}
		},
	});


}

// dosen sebagai penguji proposal
if ($('#datatable-logbimbingandosen7').length) {

	var id = $('#identitas').data('mahasiswa_id');
	var dosenrole = $('#identitas').data('dosenrole1');
	var logbimbingandosen7Table = $('#datatable-logbimbingandosen7').DataTable({
		responsive: true,
		processing: true,
		serverside: true,
		ajax: base_url + 'bimbingan/tabel_bimbingandosen_pnj1_prop/' + id + '/' + dosenrole,
		language: {
			paginate: {
				previous: "<i class='fas fa-angle-left'>",
				next: "<i class='fas fa-angle-right'>"
			}
		},
	});

}




if ($('#datatable-logbimbingandosen8').length) {


	var id = $('#identitas').data('mahasiswa_id');
	var dosen_id = $('#identitas').data('dosen2id');
	var dosen_role = $('#identitas').data('dosenrole2');
	var logbimbingandosen8Table = $('#datatable-logbimbingandosen8').DataTable({
		responsive: true,
		processing: true,
		serverside: true,
		ajax: base_url + 'bimbingan/tabel_bimbingandosen_pnj2_prop/' + id + '/' + dosen_id + '/' + dosen_role,
		language: {
			paginate: {
				previous: "<i class='fas fa-angle-left'>",
				next: "<i class='fas fa-angle-right'>"
			}
		},
	});


}







$('div.dataTables_length select').removeClass('custom-select custom-select-sm');
