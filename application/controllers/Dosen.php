<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Dosen extends CI_Controller {

public function __construct()
{
	parent::__construct();
	check_role(['dosen','kaprodi','PA']);
}

public function pembimbing()
{
	$data['pembimbing'] = $this->main->get_pembimbing_byrole(''.userdata()->role.'');
	$data["judul"] = "SIF-OKe";
	$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
	<li class="breadcrumb-item"><a href="">Pembimbing</a></li>
	';
	$this->tmp->view('templates/_header','dosen/pembimbing',$data); 
                
}


public function penguji()
{
	// $data['pembimbing'] = $this->main->get_pembimbing_byrole(''.userdata()->role.'');
	$data["judul"] = "SIF-OKe";
	$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
	<li class="breadcrumb-item"><a href="">Penguji</a></li>
	';
	$this->tmp->view('templates/_header','dosen/penguji',$data); 
                
}


function tabel_pembimbing() {
	$list = $this->pembimbing->get_datatables();
	$data = array();
	$no = @$_POST['start'];
	foreach ($list as $pembimbing) {
		$no++;
		$row = array();
		$row[] = $no;
		$row[] = $pembimbing->nama;
		$row[] = $pembimbing->judul;
		$row[] = $pembimbing->role;
		$mahasiswa = $this->main->get_mahasiswa($pembimbing->mahasiswa_id);
		if ($mahasiswa->status == "bimbingan proposal" || $mahasiswa->status == "seminar proposal" || $mahasiswa->status == "selesai seminar proposal" ) {
			$row[] = '<div class="button-group">
<a href="'.base_url("bimbingan/info_mahasiswa/".$pembimbing->mahasiswa_id).'" class="btn btn-sm btn-warning"><i class="fa fa-info"></i></a>
</div>';
		}

		if ($mahasiswa->status == "bimbingan skripsi" || $mahasiswa->status == "sidang skripsi" ||  $mahasiswa->status == "selesai sidang skripsi" ) {
			$row[] = '<div class="button-group">
<a href="'.base_url("bimbingan/info_mahasiswa3/".$pembimbing->mahasiswa_id).'" class="btn btn-sm btn-warning"><i class="fa fa-info"></i></a>
</div>';
		}
		$data[] = $row;
	}
	$output = array(
				"draw" => @$_POST['draw'],
				"recordsTotal" => $this->pembimbing->count_all(),
				"recordsFiltered" => $this->pembimbing->count_filtered(),
				"data" => $data,
			);
	// output to json format
	echo json_encode($output);
}


function tabel_penguji() {
	$list = $this->penguji->get_datatables();
	$data = array();
	$no = @$_POST['start'];
	foreach ($list as $penguji) {
		$no++;
		$row = array();
		$row[] = $no;
		$row[] = $penguji->nama;
		$row[] = $penguji->judul;
		$row[] = $penguji->role;
		$mahasiswa = $this->main->get_mahasiswa($penguji->mahasiswa_id);
		if ($mahasiswa->status == "bimbingan proposal" || $mahasiswa->status == "seminar proposal" || $mahasiswa->status == "selesai seminar proposal") {
			$row[] = '<div class="button-group">
<a href="'.base_url("bimbingan/info_mahasiswa2/".$penguji->mahasiswa_id).'" class="btn btn-sm btn-warning"><i class="fa fa-info"></i></a>
</div>';
		} 
		if($mahasiswa->status == 'bimbingan skripsi' || $mahasiswa->status == "sidang skripsi" || $mahasiswa->status == "selesai sidang skripsi"){
			$row[] = '<div class="button-group">
<a href="'.base_url("bimbingan/info_mahasiswa4/".$penguji->mahasiswa_id).'" class="btn btn-sm btn-warning"><i class="fa fa-info"></i></a>
</div>';
		}
		$data[] = $row;
	}
	$output = array(
				"draw" => @$_POST['draw'],
				"recordsTotal" => $this->penguji->count_all(),
				"recordsFiltered" => $this->penguji->count_filtered(),
				"data" => $data,
			);
	// output to json format
	echo json_encode($output);
}

function nilai_proposal(){
	$id = $this->input->post('id');
	$role = $this->input->post('role');
	$nilai = str_replace(',','.',$this->input->post('nilai'));
	$pembimbing = $this->main->get_pembimbingprop_bymahasiswa($id);
$penguji = $this->main->get_pengujiprop_bymahasiswa($id);
	if ($role == "Pembimbing_1_Proposal") {
		$this->main->update('nilai_proposal',['pembimbing_1' => $nilai],['mahasiswa_id' => $id]);
		$proposal = $this->main->get_where('proposal',['mahasiswa_id'=> $id]);
		if ($proposal->catatan) {
			$this->main->update('pembimbing',['status' => "sudah"],['mahasiswa_id' => $id,'dosen_id' => $pembimbing[0]->user_id]);
		}
	};
	
	if ($role == "Pembimbing_2_Proposal") {
		$this->main->update('nilai_proposal',['pembimbing_2' => $nilai],['mahasiswa_id' => $id]);
		$this->main->update('pembimbing',['status' => "sudah"],['mahasiswa_id' => $id,'dosen_id' => $pembimbing[1]->user_id]);
	};

	if ($role == "Penguji_1_Proposal") {
		$this->main->update('nilai_proposal',['penguji_1' => $nilai],['mahasiswa_id' => $id]);
		$this->main->update('pembimbing',['status' => "sudah"],['mahasiswa_id' => $id,'dosen_id' => $penguji[0]->user_id]);
	};

	if ($role == "Penguji_2_Proposal") {
		$this->main->update('nilai_proposal',['penguji_2' => $nilai],['mahasiswa_id' => $id]);
		$this->main->update('pembimbing',['status' => "sudah"],['mahasiswa_id' => $id,'dosen_id' => $penguji[1]->user_id]);
	};
	if (check_nilai_proposal($id)) {
		$skripsi = $this->main->get_where('skripsi',['mahasiswa_id' => $id]);
		if (!$skripsi) {
		$this->update_status_pembimbing($id);
	}
	}

	echo json_encode('success');
}



function update_status_pembimbing($mahasiswa_id){
	$this->main->update('users',['status' =>'bimbingan skripsi'],['user_id' => $mahasiswa_id]);
	$ide_skripsi = $this->main->get_where('ide_skripsi',['mahasiswa_id' => $mahasiswa_id]);
	$this->main->insert('skripsi',['mahasiswa_id' => $mahasiswa_id,'judul' => $ide_skripsi->judul,'abstrak' => $ide_skripsi->abstrak,
	'status_pem1' => 'belum ACC','status_pem2' => 'belum ACC','status_pnj1' => 'belum ACC','status_pnj2' => 'belum ACC'
]);
$pembimbing = $this->main->get_pembimbingprop_bymahasiswa($mahasiswa_id);
$penguji = $this->main->get_pengujiprop_bymahasiswa($mahasiswa_id);
$role = $this->main->get("role");
foreach ($role as $rl) {
	if ($rl->role == 'Pembimbing 1 Skripsi/TA') {
		$r1 = $rl->id;
	}
	if ($rl->role == 'Pembimbing 2 Skripsi/TA') {
		$r2 = $rl->id;
	}
	if ($rl->role == 'Penguji 1 Skripsi/TA') {
		$r3 = $rl->id;
	}
	if ($rl->role == 'Penguji 2 Skripsi/TA') {
		$r4 = $rl->id;
	}
}

$pembimbing_1 = [
	'role_id' => $r1,
	'status' => 'belum'
];
$pembimbing_2 = [
	'role_id' => $r2,
	'status' => 'belum'
];
$penguji_1 = [
	'role_id' => $r3,
	'status' => 'belum'
];
$penguji_2 = [
	'role_id' => $r4,
	'status' => 'belum'
];

$this->main->update('pembimbing',$pembimbing_1,['mahasiswa_id' => $mahasiswa_id,'dosen_id' => $pembimbing[0]->user_id]);
$this->main->update('pembimbing',$pembimbing_2,['mahasiswa_id' => $mahasiswa_id,'dosen_id' => $pembimbing[1]->user_id]);
$this->main->update('pembimbing',$penguji_1,['mahasiswa_id' => $mahasiswa_id,'dosen_id' => $penguji[0]->user_id]);
$this->main->update('pembimbing',$penguji_2,['mahasiswa_id' => $mahasiswa_id,'dosen_id' => $penguji[1]->user_id]);
}


function nilai_skripsi(){
	$id = $this->input->post('id');
	$role = $this->input->post('role');
	$nilai = str_replace(',','.',$this->input->post('nilai'));
	$pembimbing = $this->main->get_pembimbingskrip_bymahasiswa($id);
$penguji = $this->main->get_pengujiskrip_bymahasiswa($id);
$absen = $this->main->get_where('absen',['mahasiswa_id' => $id,'jenis_kegiatan' => 'sidang skripsi']);
	if ($role == "Pembimbing_1_Skripsi/TA") {
		$this->main->update('nilai_skripsi',['pembimbing_1' => $nilai],['mahasiswa_id' => $id]);
		$skripsi = $this->main->get_where('skripsi',['mahasiswa_id'=> $id]);
		if ($skripsi->catatan) {
			$this->main->update('pembimbing',['status' => "sudah"],['mahasiswa_id' => $id,'dosen_id' => $pembimbing[0]->user_id]);
		}
	};
	
	if ($role == "Pembimbing_2_Skripsi/TA") {
		$this->main->update('nilai_skripsi',['pembimbing_2' => $nilai],['mahasiswa_id' => $id]);
		$this->main->update('pembimbing',['status' => "sudah"],['mahasiswa_id' => $id,'dosen_id' => $pembimbing[1]->user_id]);
	};

	if ($role == "Penguji_1_Skripsi/TA") {
		$this->main->update('nilai_skripsi',['penguji_1' => $nilai],['mahasiswa_id' => $id]);
		$this->main->update('pembimbing',['status' => "sudah"],['mahasiswa_id' => $id,'dosen_id' => $penguji[0]->user_id]);
	};

	if ($role == "Penguji_2_Skripsi/TA") {
		$this->main->update('nilai_skripsi',['penguji_2' => $nilai],['mahasiswa_id' => $id]);
		$this->main->update('pembimbing',['status' => "sudah"],['mahasiswa_id' => $id,'dosen_id' => $penguji[1]->user_id]);
	};

	if ($absen->pembimbing_1 != 'hadir') {
		$this->main->update('pembimbing',['status' => "sudah"],['mahasiswa_id' => $id,'dosen_id' => $pembimbing[0]->user_id]);
	}
	if ($absen->pembimbing_2 != 'hadir') {
		$this->main->update('pembimbing',['status' => "sudah"],['mahasiswa_id' => $id,'dosen_id' => $pembimbing[1]->user_id]);
	}
	if ($absen->penguji_1 != 'hadir') {
		$this->main->update('pembimbing',['status' => "sudah"],['mahasiswa_id' => $id,'dosen_id' => $penguji[0]->user_id]);
	}
	if ($absen->penguji_2 != 'hadir') {
		$this->main->update('pembimbing',['status' => "sudah"],['mahasiswa_id' => $id,'dosen_id' => $penguji[1]->user_id]);
	}
	if (check_nilai_skripsi($id)) {
	$this->main->update('users',['status' => 'menunggu jadwal yudisium'],['user_id' => $id]);
	}

	echo json_encode($absen);
}


public function daftarskripsi()
{
	$data["judul"] = "SIF-OKe";
	$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
	<li class="breadcrumb-item"><a href="">Daftar Skripsi</a></li>
	';
	$this->tmp->view('templates/_header','daftar_skripsi',$data); 
                
}


function tabel_daftarskripsi() {
	$list = $this->daftar_skripsi->get_datatables();
	$data = array();
	$no = @$_POST['start'];
	foreach ($list as $skripsi) {
		$no++;
		$row = array();
		$row[] = $no;
		$row[] = $skripsi->nama;
		$row[] = $skripsi->judul;
		$row[] = $skripsi->status;
	
		$data[] = $row;
	}
	$output = array(
				"draw" => @$_POST['draw'],
				"recordsTotal" => $this->daftar_skripsi->count_all(),
				"recordsFiltered" => $this->daftar_skripsi->count_filtered(),
				"data" => $data,
			);
	// output to json format
	echo json_encode($output);
}



public function datayudisium()
{
	$data["judul"] = "SIF-OKe";
	$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
	<li class="breadcrumb-item"><a href="">Data Yudisium</a></li>
	';
	$this->tmp->view('templates/_header','data_yudisium',$data); 
                
}
function tabel_datayudisium() {
	$list = $this->data_yudisium->get_datatables();
	$data = array();
	$no = @$_POST['start'];
	foreach ($list as $yudisium) {
		$no++;
		$row = array();
		$row[] = $no;
		$row[] = $yudisium->username;
		$row[] = $yudisium->nama;
		$row[] = custom_date('d-M-Y h:i A',$yudisium->tanggal);
		$row[] = $yudisium->judul;
	
		$data[] = $row;
	}
	$output = array(
				"draw" => @$_POST['draw'],
				"recordsTotal" => $this->data_yudisium->count_all(),
				"recordsFiltered" => $this->data_yudisium->count_filtered(),
				"data" => $data,
			);
	// output to json format
	echo json_encode($output);
}

  
function catatan_proposal($id,$dosen_id){
	$catatan = $this->input->post('catatan');
	if ($catatan) {
		$this->main->update('proposal',['catatan' => $catatan],['mahasiswa_id' => $id]);
		$nilai = $this->main->get_where('nilai_proposal',['mahasiswa_id' => $id]);
		if ($nilai->pembimbing_1) {
			$this->main->update('pembimbing',['status' => "sudah"],['mahasiswa_id' => $id,'dosen_id' => $dosen_id]);
		}
		setFlashMsg('success','Berhasil','catatan telah di tambahkan');
	}else {
		setFlashMsg('danger','Gagal','mohon memilih catatan');
	}
	$client = $_SERVER['HTTP_REFERER'];
	redirect($client, 'refresh');
}

function catatan_skripsi($id,$dosen_id){
	$catatan = $this->input->post('catatan');
	if ($catatan) {
		$this->main->update('skripsi',['catatan' => $catatan],['mahasiswa_id' => $id]);
		$nilai = $this->main->get_where('nilai_skripsi',['mahasiswa_id' => $id]);
		if ($nilai->pembimbing_1) {
			$this->main->update('pembimbing',['status' => "sudah"],['mahasiswa_id' => $id,'dosen_id' => $dosen_id]);
		}
		setFlashMsg('success','Berhasil','catatan telah di tambahkan');
	}else {
		setFlashMsg('danger','Gagal','mohon memilih catatan');
	}
	$client = $_SERVER['HTTP_REFERER'];
	redirect($client, 'refresh');
}
}
        
    /* End of file  dosen.php */
        
                            