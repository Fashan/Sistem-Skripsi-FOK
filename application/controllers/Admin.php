<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Admin extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		check_role(['admin']);
	}
	

	public function prasyarat_proposal(){
		$data["judul"] = "SIF-OKe";
		$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
		<li class="breadcrumb-item"><a href="">Prasyarat</a></li>
		<li class="breadcrumb-item"><a href="">Seminar Proposal</a></li>
		';
		$this->tmp->view('templates/_header','admin/prasyarat_proposal',$data); 
	}

	public function tabel_prasyarat_p(){
		$list = $this->prasyarat_p->get_datatables();
	$data = array();
	$no = @$_POST['start'];
	foreach ($list as $mahasiswa) {
		$no++;
		$row = array();
		$row[] = $no;
		$row[] = $mahasiswa->nama;
		$row[] = $mahasiswa->username;
		$row[] = $mahasiswa->status_p;
		if ($this->main->check_moderator($mahasiswa->username)) {
			$row[] = 'sudah pernah';
		}else {
			$row[] = 'belum pernah';
		}
		$row[] = '<div class="button-group">
		<a href="'.base_url('admin/info_prasyarat_proposal/'.$mahasiswa->user_id).'" class="btn btn-sm btn-success">info</a>
		</div>';
		$data[] = $row;
	}
	$output = array(
				"draw" => @$_POST['draw'],
				"recordsTotal" => $this->prasyarat_p->count_all(),
				"recordsFiltered" => $this->prasyarat_p->count_filtered(),
				"data" => $data,
			);
	// output to json format
	echo json_encode($output);
	}

	public function download_prasyarat_p($file){
		$this->load->helper('download');
		$path = FCPATH.'assets/file/prasyarat/proposal/'.$file;
		force_download($path,null);
	}

	public function tolak_file_p(){
		$id = $this->input->post('id');
		$query = $this->main->update('prasyarat_proposal',array('status_prasyarat' => 'ditolak'),array('id' => $id));
		if ($query) {
			$response = 'success';
		}else {
			$response = 'failed';
		}
		echo json_encode($response);
	}
	
	public function jadwal_seminar_proposal($mahasiswa_id){
		$mahasiswa = $this->main->get_mahasiswa($mahasiswa_id);
	$row=[];
	$row[0] = $this->main->get_pembimbing_byidandrole($mahasiswa_id,'Penguji 1 Proposal');
	$row[1] = $this->main->get_pembimbing_byidandrole($mahasiswa_id,'Penguji 2 Proposal');
	
	$this->main->update('prasyarat_proposal',['status_prasyarat' => 'diterima'],['mahasiswa_id' => $mahasiswa_id]);
		$data["penguji"] = $row;
		$data["jadwal"] = $this->main->get_where('events',['mahasiswa_id' => $mahasiswa_id,'keterangan' => 'seminar proposal']);
		$data["mahasiswa"] = $mahasiswa;
		$data["judul"] = "SIF-OKe";
		$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
		<li class="breadcrumb-item"><a href="">Prasyarat</a></li>
		<li class="breadcrumb-item"><a href="">Seminar Proposal</a></li>
		<li class="breadcrumb-item"><a href="">'.$mahasiswa->nama.'</a></li>
		';
		$this->tmp->view('templates/_header','admin/jadwalkan',$data); 
	}
    
	public function jadwal_sidang_skripsi($mahasiswa_id){
		$mahasiswa = $this->main->get_mahasiswa($mahasiswa_id);
		$get_penguji = $this->main->get_pengujiskrip_bymahasiswa($mahasiswa_id);
	$row=[];
	foreach ($get_penguji as $p) {
		if ($p->role == 'Penguji 1 Skripsi/TA'){
			$row[0] = $p;
		}else{
			$row[1] = $p;
		}
	}
		$data["penguji"] = $row;
		$data["jadwal"] = $this->main->get_where('events',['mahasiswa_id' => $mahasiswa_id,'keterangan' => 'sidang skripsi']);
		$data["mahasiswa"] = $mahasiswa;
		$data["judul"] = "SIF-OKe";
		$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
		<li class="breadcrumb-item"><a href="">Prasyarat</a></li>
		<li class="breadcrumb-item"><a href="">Sidang Skripsi</a></li>
		<li class="breadcrumb-item"><a href="">'.$mahasiswa->nama.'</a></li>
		';
		$this->tmp->view('templates/_header','admin/jadwalkan2',$data); 
	}
	function jadwalkan_seminar_proposal(){
		$input = $this->input->post(null,true);
		$where = ['mahasiswa_id' => $input['mahasiswa_id'],
					'prasyarat'  => 'proposal'
	];
		$this->main->insert('nilai_proposal',['mahasiswa_id' => $input['mahasiswa_id']]);
		$this->main->update('users',['status' => 'seminar proposal'],['user_id' => $input['mahasiswa_id']]);
		$input['keterangan'] = 'seminar proposal';
		$input['status'] = 'akan berlangsung';
		$this->main->insert('absen',['mahasiswa_id' => $input['mahasiswa_id'],'pembimbing_1' => 'belum','pembimbing_2' => 'belum','penguji_1' => 'belum','penguji_2' => 'belum','jenis_kegiatan' => 'seminar proposal' ]);
		$query= $this->main->insert('events',$input);
		if ($query) {
			$response = 'success';
		}else {
			$response = 'error';
		}
		echo json_encode($response);
	}

	

	function reschedule_seminar_proposal(){
		$input = $this->input->post(null,true);
		$input['status'] = 'akan berlangsung';
		$query= $this->main->update('events',$input,['mahasiswa_id' => $input['mahasiswa_id'],'keterangan' => 'seminar proposal']);
		if ($query) {
			$response = 'success';
		}else {
			$response = 'error';
		}
		echo json_encode($response);
	}

	public function jadwal_seminar(){
		$data["judul"] = "SIF-Oke";
		$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
		<li class="breadcrumb-item"><a href="">Jadwal</a></li>
		<li class="breadcrumb-item"><a href="">Seminar Proposal</a></li>
		';
		$this->tmp->view('templates/_header','admin/jadwal_seminar_proposal',$data); 
	}

	public function tabel_jadwal_p(){
		$list = $this->jadwal_p->get_datatables();
	$data = array();
	$no = @$_POST['start'];
	foreach ($list as $jadwal) {
		$no++;
		$row = array();
		$row[] = $no;
		$row[] = $jadwal->nama;
		$row[] = $jadwal->username;
		$row[] = custom_date('d-M-Y',$jadwal->tanggal);
		$row[] = custom_date('h:i A',$jadwal->tanggal);
		$moderator = $this->main->get_where('moderator',['mahasiswa_id' => $jadwal->user_id]);
		if ($moderator) {
			$row[] = $moderator->nama;
		}else {
			$row[] = 'belum tersedia';
		}
		$row[] = $jadwal->status;
		$row[] = '<div class="button-group">
		<button class="btn btn-sm btn-success" onclick="halaman_absen_proposal('.$jadwal->user_id.')">absen</button>
		</div>';
		$data[] = $row;
	}
	$output = array(
				"draw" => @$_POST['draw'],
				"recordsTotal" => $this->jadwal_p->count_all(),
				"recordsFiltered" => $this->jadwal_p->count_filtered(),
				"data" => $data,
			);
	// output to json format
	echo json_encode($output);
	}

	public function selesai_seminar(){
		$id = $this->input->post('id');
		$event = $this->main->get_where('events',['id' => $id]);
		$mahasiswa_id = $event->mahasiswa_id;
		$this->main->update('users',['status' => 'selesai seminar proposal'],['user_id' => $mahasiswa_id]);
		$update = [
			'status' => 'selesai'
		];
		$this->main->update('events',$update,['id' => $id]);

		
		echo json_encode('done');
	}

	public function prasyarat_skripsi(){
		$data["judul"] = "SIF-OKe";
		$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
		<li class="breadcrumb-item"><a href="">Prasyarat</a></li>
		<li class="breadcrumb-item"><a href="">Sidang Skripsi</a></li>
		';
		$this->tmp->view('templates/_header','admin/prasyarat_skripsi',$data); 
	}


	
	public function tabel_prasyarat_s(){
		$list = $this->prasyarat_s->get_datatables();
	$data = array();
	$no = @$_POST['start'];
	foreach ($list as $mahasiswa) {
		$no++;
		$row = array();
		$row[] = $no;
		$row[] = $mahasiswa->nama;
		$row[] = $mahasiswa->username;
		$row[] = $mahasiswa->status_p;
		$row[] = '<div class="button-group">
		<a href="'.base_url('admin/info_prasyarat_skripsi/'.$mahasiswa->user_id).'" class="btn btn-sm btn-success">info</a>
		</div>';
		$data[] = $row;
	}
	$output = array(
				"draw" => @$_POST['draw'],
				"recordsTotal" => $this->prasyarat_p->count_all(),
				"recordsFiltered" => $this->prasyarat_p->count_filtered(),
				"data" => $data,
			);
	// output to json format
	echo json_encode($output);
	}

	public function download_prasyarat_s($file){
		$this->load->helper('download');
		$path = FCPATH.'assets/file/prasyarat/skripsi/'.$file;
		force_download($path,null);
	}

	public function tolak_file_s(){
		$id = $this->input->post('id');
		$query = $this->main->update('prasyarat_skripsi',array('status_prasyarat' => 'ditolak'),array('id' => $id));
		if ($query) {
			$response = 'success';
		}else {
			$response = 'failed';
		}
		echo json_encode($response);
	}

	function jadwalkan_sidang_skripsi(){
		$input = $this->input->post(null,true);
		$where = ['mahasiswa_id' => $input['mahasiswa_id'],
					'prasyarat'  => 'skripsi'
	];
		$this->main->update('prasyarat',['status' => 'diterima'],$where);
		$this->main->insert('nilai_skripsi',['mahasiswa_id' => $input['mahasiswa_id']]);
		$this->main->insert('absen',['mahasiswa_id' => $input['mahasiswa_id'],'pembimbing_1' => 'belum','pembimbing_2' => 'belum','penguji_1' => 'belum','penguji_2' => 'belum','jenis_kegiatan' => 'sidang skripsi' ]);
		$this->main->update('users',['status' => 'sidang skripsi'],['user_id' => $input['mahasiswa_id']]);
		$input['keterangan'] = 'sidang skripsi';
		$input['status'] = 'akan berlangsung';
		$query= $this->main->insert('events',$input);
		if ($query) {
			$response = 'success';
		}else {
			$response = 'error';
		}
		echo json_encode($response);
	}
	

	function reschedule_sidang_skripsi(){
		$input = $this->input->post(null,true);
		$input['status'] = 'akan berlangsung';
		$query= $this->main->update('events',$input,['mahasiswa_id' => $input['mahasiswa_id'],'keterangan' => 'sidang skripsi']);
		if ($query) {
			$response = 'success';
		}else {
			$response = 'error';
		}
		echo json_encode($input);
	}

	public function tabel_jadwal_s(){
		$list = $this->jadwal_s->get_datatables();
	$data = array();
	$no = @$_POST['start'];
	foreach ($list as $jadwal) {
		$no++;
		$row = array();
		$row[] = $no;
		$row[] = $jadwal->nama;
		$row[] = $jadwal->username;
		$row[] = custom_date('d-M-Y',$jadwal->tanggal);
		$row[] = custom_date('h:i A',$jadwal->tanggal);
		$row[] = $jadwal->status;
		$row[] = '<div class="button-group">
		<button class="btn btn-sm btn-success" onclick="halaman_absen_skripsi('.$jadwal->mahasiswa_id.')">absen</button>
		</div>';
		$data[] = $row;
	}
	$output = array(
				"draw" => @$_POST['draw'],
				"recordsTotal" => $this->jadwal_s->count_all(),
				"recordsFiltered" => $this->jadwal_s->count_filtered(),
				"data" => $data,
			);
	// output to json format
	echo json_encode($output);
	}

	public function jadwal_sidang(){
		$data["judul"] = "SIF-OKe";
		$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
		<li class="breadcrumb-item"><a href="">Jadwal</a></li>
		<li class="breadcrumb-item"><a href="">Sidang Skripsi</a></li>
		';
		$this->tmp->view('templates/_header','admin/jadwal_sidang_skripsi',$data); 
	}

	public function selesai_sidang(){
		$id = $this->input->post('id');
		$update = [
			'status' => 'selesai'
		];
		$event = $this->main->get_where('events',['id' => $id]);
		$mahasiswa_id = $event->mahasiswa_id;
		$this->main->update('users',['status' => 'selesai sidang skripsi'],['user_id' => $mahasiswa_id]);
		$this->main->update('events',$update,['id' => $id]);

		
		echo json_encode('done');
	}

	public function prasyarat_yudisium(){
		$data["judul"] = "SIF-OKe";
		$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
		<li class="breadcrumb-item"><a href="">Prasyarat</a></li>
		<li class="breadcrumb-item"><a href="">Yudisium</a></li>
		';
		$this->tmp->view('templates/_header','admin/prasyarat_yudisium',$data); 
	}


	
	public function tabel_prasyarat_y(){
		$list = $this->prasyarat_y->get_datatables();
	$data = array();
	$no = @$_POST['start'];
	foreach ($list as $mahasiswa) {
		$no++;
		$row = array();
		$row[] = $no;
		$row[] = $mahasiswa->nama;
		$row[] = $mahasiswa->username;
		$row[] = $mahasiswa->status_p;
		$row[] = '<div class="button-group">
		<a href="'.base_url('admin/info_prasyarat_yudisium/'.$mahasiswa->user_id).'" class="btn btn-sm btn-success">info</a>
		</div>';
		$data[] = $row;
	}
	$output = array(
				"draw" => @$_POST['draw'],
				"recordsTotal" => $this->prasyarat_y->count_all(),
				"recordsFiltered" => $this->prasyarat_y->count_filtered(),
				"data" => $data,
			);
	// output to json format
	echo json_encode($output);
	}

	public function download_prasyarat_y($file){
		$this->load->helper('download');
		$path = FCPATH.'assets/file/prasyarat/yudisium/'.$file;
		force_download($path,null);
	}

	public function tolak_file_y(){
		$id = $this->input->post('id');
		$query = $this->main->update('prasyarat_yudisium',array('status_prasyarat' => 'ditolak'),array('id' => $id));
		if ($query) {
			$response = 'success';
		}else {
			$response = 'failed';
		}
		echo json_encode($response);
	}

	public function jadwal_yudisium($mahasiswa_id){
		$mahasiswa = $this->main->get_mahasiswa($mahasiswa_id);

		$data["jadwal"] = $this->main->get_where('events',['mahasiswa_id' => $mahasiswa_id,'keterangan' => 'yudisium']);
		$data["mahasiswa"] = $mahasiswa;
		$data["judul"] = "SIF-OKe";
		$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
		<li class="breadcrumb-item"><a href="">Prasyarat</a></li>
		<li class="breadcrumb-item"><a href="">Yudisium</a></li>
		<li class="breadcrumb-item"><a href="">'.$mahasiswa->nama.'</a></li>
		';
		$this->tmp->view('templates/_header','admin/jadwalkan3',$data); 
	}

	function jadwalkan_yudisium(){
		$input = $this->input->post(null,true);
		$where = ['mahasiswa_id' => $input['mahasiswa_id'],
					'prasyarat'  => 'yudisium'
	];
		$this->main->update('prasyarat',['status' => 'diterima'],$where);
		$this->main->update('users',['status' => 'yudisium'],['user_id' => $input['mahasiswa_id']]);
		$input['keterangan'] = 'yudisium';
		$input['status'] = 'akan berlangsung';
		$query= $this->main->insert('events',$input);
		if ($query) {
			$response = 'success';
		}else {
			$response = 'error';
		}
		echo json_encode($response);
	}

	function reschedule_yudisium(){
		$input = $this->input->post(null,true);
		$input['status'] = 'akan berlangsung';
		$query= $this->main->update('events',$input,['mahasiswa_id' => $input['mahasiswa_id'],'keterangan' => 'yudisium']);
		if ($query) {
			$response = 'success';
		}else {
			$response = 'error';
		}
		echo json_encode($response);
	}

	public function yudisium(){
		$data["judul"] = "SIF-Oke";
		$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
		<li class="breadcrumb-item"><a href="">Jadwal</a></li>
		<li class="breadcrumb-item"><a href="">Yudisium</a></li>
		';
		$this->tmp->view('templates/_header','admin/jadwal_yudisium',$data); 
	}

	public function tabel_jadwal_y(){
		$list = $this->jadwal_y->get_datatables();
	$data = array();
	$no = @$_POST['start'];
	foreach ($list as $jadwal) {
		$no++;
		$row = array();
		$row[] = $no;
		$row[] = $jadwal->nama;
		$row[] = $jadwal->username;
		$row[] = custom_date('d-M-Y',$jadwal->tanggal);
		$row[] = custom_date('h:i A',$jadwal->tanggal);
		$row[] = $jadwal->status;
		$row[] = '<div class="button-group">
		<button class="btn btn-sm btn-success" onclick="selesai_yudisium('.$jadwal->id.')">selesai</button>
		</div>';
		$data[] = $row;
	}
	$output = array(
				"draw" => @$_POST['draw'],
				"recordsTotal" => $this->jadwal_y->count_all(),
				"recordsFiltered" => $this->jadwal_y->count_filtered(),
				"data" => $data,
			);
	// output to json format
	echo json_encode($output);
	}

	public function selesai_yudisium(){
		$id = $this->input->post('id');
		$update = [
			'status' => 'selesai'
		];
		$this->main->update('events',$update,['id' => $id]);

		
		echo json_encode('done');
	}


public function download_prasyarat_proposal($nim,$file){
		$this->load->helper('download');
		$path = FCPATH.'assets/file/prasyarat/proposal/'.$nim.'/'.$file;
		if (is_file($path)) {
			force_download($path, NULL);
		};
}

public function download_prasyarat_skripsi($nim,$file){
	$this->load->helper('download');
	$path = FCPATH.'assets/file/prasyarat/skripsi/'.$nim.'/'.$file;
	if (is_file($path)) {
		force_download($path, NULL);
	};
}

public function download_prasyarat_yudisium($nim,$file){
	$this->load->helper('download');
	$path = FCPATH.'assets/file/prasyarat/yudisium/'.$nim.'/'.$file;
	if (is_file($path)) {
		force_download($path, NULL);
	};
}


public function info_prasyarat_proposal($mahasiswa_id)
{

	$data["mahasiswa"] = $this->main->get_mahasiswa($mahasiswa_id);
	$data["prasyarat"] = $this->main->get_where('prasyarat_proposal',['mahasiswa_id'=>$mahasiswa_id]);
	$data["judul"] = "SIF-OKe";
	$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
	<li class="breadcrumb-item"><a href="">Prasyarat</a></li>
	<li class="breadcrumb-item"><a href="">Seminar Proposal</a></li>
	<li class="breadcrumb-item"><a href="">'.$data["mahasiswa"]->nama.'</a></li>
	';
	$this->tmp->view('templates/_header','prasyarat_admin/proposal',$data); 
                
}

public function info_prasyarat_skripsi($mahasiswa_id)
{

	$data["mahasiswa"] = $this->main->get_mahasiswa($mahasiswa_id);
	$data["prasyarat"] = $this->main->get_where('prasyarat_skripsi',['mahasiswa_id'=>$mahasiswa_id]);
	$data["judul"] = "SIF-OKe";
	$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
	<li class="breadcrumb-item"><a href="">Prasyarat</a></li>
	<li class="breadcrumb-item"><a href="">Sidang Skripsi</a></li>
	<li class="breadcrumb-item"><a href="">'.$data["mahasiswa"]->nama.'</a></li>
	';
	$this->tmp->view('templates/_header','prasyarat_admin/skripsi',$data); 
                
}

public function info_prasyarat_yudisium($mahasiswa_id)
{

	$data["mahasiswa"] = $this->main->get_mahasiswa($mahasiswa_id);
	$data["prasyarat"] = $this->main->get_where('prasyarat_yudisium',['mahasiswa_id'=>$mahasiswa_id]);
	$data["judul"] = "SIF-OKe";
	$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
	<li class="breadcrumb-item"><a href="">Prasyarat</a></li>
	<li class="breadcrumb-item"><a href="">Yudisium</a></li>
	<li class="breadcrumb-item"><a href="">'.$data["mahasiswa"]->nama.'</a></li>
	';
	$this->tmp->view('templates/_header','prasyarat_admin/yudisium',$data); 
                
}

public function update_check_prasyarat_proposal(){
	$input = $this->input->post(null,true);
	$prasyarat = $this->main->get_where('prasyarat_proposal',['id' => $input['id']]);
	if ($input['status'] == 'file_proposal') {
		if ($prasyarat->status_fileproposal == 'belum') {
			$this->main->update('prasyarat_proposal',['status_fileproposal' => 'check'],['id' => $input['id']]);
		}else{
			$this->main->update('prasyarat_proposal',['status_fileproposal' => 'belum'],['id' => $input['id']]);
		}
	}

	if ($input['status'] == 'file_kdn') {
		if ($prasyarat->status_filekdn == 'belum') {
			$this->main->update('prasyarat_proposal',['status_filekdn' => 'check'],['id' => $input['id']]);
		}else{
			$this->main->update('prasyarat_proposal',['status_filekdn' => 'belum'],['id' => $input['id']]);
		}
	}

	if ($input['status'] == 'file_kartubimbingan') {
		if ($prasyarat->status_filekartubimbingan == 'belum') {
			$this->main->update('prasyarat_proposal',['status_filekartubimbingan' => 'check'],['id' => $input['id']]);
		}else{
			$this->main->update('prasyarat_proposal',['status_filekartubimbingan' => 'belum'],['id' => $input['id']]);
		}
	}

	if ($input['status'] == 'file_khs') {
		if ($prasyarat->status_filekhs == 'belum') {
			$this->main->update('prasyarat_proposal',['status_filekhs' => 'check'],['id' => $input['id']]);
		}else{
			$this->main->update('prasyarat_proposal',['status_filekhs' => 'belum'],['id' => $input['id']]);
		}
	}
	
	$prasyarat = $this->main->get_where('prasyarat_proposal',['id' => $input['id']]);
	if ($prasyarat->status_fileproposal == 'check' && $prasyarat->status_filekdn =='check' && $prasyarat->status_filekartubimbingan == 'check' && $prasyarat->status_filekhs == 'check') {
		$this->main->update('prasyarat_proposal',['status_prasyarat' => 'diterima'],['id' => $input['id']]);
	}else{
		$this->main->update('prasyarat_proposal',['status_prasyarat' => 'menunggu'],['id' => $input['id']]);
	}
	
	$prasyarat = $this->main->get_where('prasyarat_proposal',['id' => $input['id']]);
	echo json_encode($prasyarat->status_prasyarat);
}


public function update_check_prasyarat_skripsi(){
	$input = $this->input->post(null,true);
	$prasyarat = $this->main->get_where('prasyarat_skripsi',['id' => $input['id']]);
	if ($input['status'] == 'file_transkipnilai') {
		if ($prasyarat->status_transkipnilai == 'belum') {
			$this->main->update('prasyarat_skripsi',['status_transkipnilai' => 'check'],['id' => $input['id']]);
		}else{
			$this->main->update('prasyarat_skripsi',['status_transkipnilai' => 'belum'],['id' => $input['id']]);
		}
	}
	if ($input['status'] == 'file_biodatafoto') {
		if ($prasyarat->status_biodatafoto == 'belum') {
			$this->main->update('prasyarat_skripsi',['status_biodatafoto' => 'check'],['id' => $input['id']]);
		}else{
			$this->main->update('prasyarat_skripsi',['status_biodatafoto' => 'belum'],['id' => $input['id']]);
		}
	}
	if ($input['status'] == 'file_suratlab') {
		if ($prasyarat->status_suratlab == 'belum') {
			$this->main->update('prasyarat_skripsi',['status_suratlab' => 'check'],['id' => $input['id']]);
		}else{
			$this->main->update('prasyarat_skripsi',['status_suratlab' => 'belum'],['id' => $input['id']]);
		}
	}
	if ($input['status'] == 'file_bebaspiutang') {
		if ($prasyarat->status_bebaspiutang == 'belum') {
			$this->main->update('prasyarat_skripsi',['status_bebaspiutang' => 'check'],['id' => $input['id']]);
		}else{
			$this->main->update('prasyarat_skripsi',['status_bebaspiutang' => 'belum'],['id' => $input['id']]);
		}
	}
	if ($input['status'] == 'file_surattugas') {
		if ($prasyarat->status_surattugas == 'belum') {
			$this->main->update('prasyarat_skripsi',['status_surattugas' => 'check'],['id' => $input['id']]);
		}else{
			$this->main->update('prasyarat_skripsi',['status_surattugas' => 'belum'],['id' => $input['id']]);
		}
	}
	if ($input['status'] == 'file_coverskripsi') {
		if ($prasyarat->status_coverskripsi == 'belum') {
			$this->main->update('prasyarat_skripsi',['status_coverskripsi' => 'check'],['id' => $input['id']]);
		}else{
			$this->main->update('prasyarat_skripsi',['status_coverskripsi' => 'belum'],['id' => $input['id']]);
		}
	}
	if ($input['status'] == 'file_kartubimbingan') {
		if ($prasyarat->status_kartubimbingan == 'belum') {
			$this->main->update('prasyarat_skripsi',['status_kartubimbingan' => 'check'],['id' => $input['id']]);
		}else{
			$this->main->update('prasyarat_skripsi',['status_kartubimbingan' => 'belum'],['id' => $input['id']]);
		}
	}
	if ($input['status'] == 'file_piagam') {
		if ($prasyarat->status_piagam == 'belum') {
			$this->main->update('prasyarat_skripsi',['status_piagam' => 'check'],['id' => $input['id']]);
		}else{
			$this->main->update('prasyarat_skripsi',['status_piagam' => 'belum'],['id' => $input['id']]);
		}
	}
	if ($input['status'] == 'file_buktisumbangan') {
		if ($prasyarat->status_buktisumbangan == 'belum') {
			$this->main->update('prasyarat_skripsi',['status_buktisumbangan' => 'check'],['id' => $input['id']]);
		}else{
			$this->main->update('prasyarat_skripsi',['status_buktisumbangan' => 'belum'],['id' => $input['id']]);
		}
	}
	if ($input['status'] == 'file_skripsi') {
		if ($prasyarat->status_fileskripsi == 'belum') {
			$this->main->update('prasyarat_skripsi',['status_fileskripsi' => 'check'],['id' => $input['id']]);
		}else{
			$this->main->update('prasyarat_skripsi',['status_fileskripsi' => 'belum'],['id' => $input['id']]);
		}
	}
	if ($input['status'] == 'file_buktiartikel') {
		if ($prasyarat->status_buktiartikel == 'belum') {
			$this->main->update('prasyarat_skripsi',['status_buktiartikel' => 'check'],['id' => $input['id']]);
		}else{
			$this->main->update('prasyarat_skripsi',['status_buktiartikel' => 'belum'],['id' => $input['id']]);
		}
	}

	
	
	$prasyarat = $this->main->get_where('prasyarat_skripsi',['id' => $input['id']]);
	if ($prasyarat->status_transkipnilai == 'check' && $prasyarat->status_biodatafoto == 'check' && $prasyarat->status_suratlab == 'check' && $prasyarat->status_bebaspiutang == 'check' && $prasyarat->status_surattugas == 'check' && $prasyarat->status_coverskripsi == 'check' && $prasyarat->status_kartubimbingan == 'check' && $prasyarat->status_piagam == 'check' && $prasyarat->status_buktisumbangan == 'check' && $prasyarat->status_fileskripsi == 'check' && $prasyarat->status_buktiartikel == 'check') {
		$this->main->update('prasyarat_skripsi',['status_prasyarat' => 'diterima'],['id' => $input['id']]);
	}else{
		$this->main->update('prasyarat_skripsi',['status_prasyarat' => 'menunggu'],['id' => $input['id']]);
	}
	
	$prasyarat = $this->main->get_where('prasyarat_skripsi',['id' => $input['id']]);
	echo json_encode($prasyarat->status_prasyarat);
}
public function update_check_prasyarat_yudisium(){
	$input = $this->input->post(null,true);
	$prasyarat = $this->main->get_where('prasyarat_yudisium',['id' => $input['id']]);
	if ($input['status'] == 'file_buktirevisi') {
		if ($prasyarat->status_buktirevisi == 'belum') {
			$this->main->update('prasyarat_yudisium',['status_buktirevisi' => 'check'],['id' => $input['id']]);
		}else{
			$this->main->update('prasyarat_yudisium',['status_buktirevisi' => 'belum'],['id' => $input['id']]);
		}
	}

	if ($input['status'] == 'file_buktipublikasi') {
		if ($prasyarat->status_buktipublikasi == 'belum') {
			$this->main->update('prasyarat_yudisium',['status_buktipublikasi' => 'check'],['id' => $input['id']]);
		}else{
			$this->main->update('prasyarat_yudisium',['status_buktipublikasi' => 'belum'],['id' => $input['id']]);
		}
	}

	$prasyarat = $this->main->get_where('prasyarat_yudisium',['id' => $input['id']]);
	if ($prasyarat->status_buktirevisi == 'check' && $prasyarat->status_buktipublikasi =='check' ) {
		$this->main->update('prasyarat_yudisium',['status_prasyarat' => 'diterima'],['id' => $input['id']]);
	}else{
		$this->main->update('prasyarat_yudisium',['status_prasyarat' => 'menunggu'],['id' => $input['id']]);
	}
	
	$prasyarat = $this->main->get_where('prasyarat_yudisium',['id' => $input['id']]);
	echo json_encode($prasyarat->status_prasyarat);
}



public function absen_proposal($mahasiswa_id)
{
	$row=[];
	$row[0] =  $this->main->get_pembimbing_byidandrole($mahasiswa_id,'Pembimbing 1 Proposal');
	$row[1] =  $this->main->get_pembimbing_byidandrole($mahasiswa_id,'Pembimbing 2 Proposal');
	$row[2] =  $this->main->get_pembimbing_byidandrole($mahasiswa_id,'Penguji 1 Proposal');
	$row[3] =  $this->main->get_pembimbing_byidandrole($mahasiswa_id,'Penguji 2 Proposal');
	
	$data['jadwal'] = $this->main->get_where('events',['mahasiswa_id' => $mahasiswa_id,'keterangan' => 'seminar proposal']);
	$data["mahasiswa"] = $this->main->get_mahasiswa($mahasiswa_id);
	$data["dosen"] = $row;
	$data["absen"] = $this->main->get_where('absen',['mahasiswa_id'=>$mahasiswa_id,'jenis_kegiatan' => 'seminar proposal']);
	$data["judul"] = "SIF-OKe";
	$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
	<li class="breadcrumb-item"><a href="">Jadwal</a></li>
	<li class="breadcrumb-item"><a href="">Seminar Proposal</a></li>
	<li class="breadcrumb-item"><a href="">'.$data["mahasiswa"]->nama.'</a></li>
	';
	$this->tmp->view('templates/_header','absen/absen_proposal',$data); 
                
}

public function absen_skripsi($mahasiswa_id)
{
	$row=[];
	$row[0] =  $this->main->get_pembimbing_byidandrole($mahasiswa_id,'Pembimbing 1 Skripsi/TA');
	$row[1] =  $this->main->get_pembimbing_byidandrole($mahasiswa_id,'Pembimbing 2 Skripsi/TA');
	$row[2] =  $this->main->get_pembimbing_byidandrole($mahasiswa_id,'Penguji 1 Skripsi/TA');
	$row[3] =  $this->main->get_pembimbing_byidandrole($mahasiswa_id,'Penguji 2 Skripsi/TA');
	
	$data['jadwal'] = $this->main->get_where('events',['mahasiswa_id' => $mahasiswa_id,'keterangan' => 'sidang skripsi']);
	$data["mahasiswa"] = $this->main->get_mahasiswa($mahasiswa_id);
	$data["dosen"] = $row;
	$data["absen"] = $this->main->get_where('absen',['mahasiswa_id'=>$mahasiswa_id,'jenis_kegiatan' => 'sidang skripsi']);
	$data["judul"] = "SIF-OKe";
	$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
	<li class="breadcrumb-item"><a href="">Jadwal</a></li>
	<li class="breadcrumb-item"><a href="">Seminar Proposal</a></li>
	<li class="breadcrumb-item"><a href="">'.$data["mahasiswa"]->nama.'</a></li>
	';
	$this->tmp->view('templates/_header','absen/absen_skripsi',$data); 
                
}



public function update_check_absen_dosen(){
	$input = $this->input->post(null,true);
	$where = ['id' => $input['id'],'jenis_kegiatan' => 'seminar proposal'];
	$absen = $this->main->get_where('absen',$where);
	if ($input['status'] == 'pembimbing_1') {
		if ($absen->pembimbing_1 == 'belum') {
			$this->main->update('absen',['pembimbing_1' => 'hadir'],$where);
		}else{
			$this->main->update('absen',['pembimbing_1' => 'belum'],$where);
		}
	}

	if ($input['status'] == 'pembimbing_2') {
		if ($absen->pembimbing_2 == 'belum') {
			$this->main->update('absen',['pembimbing_2' => 'hadir'],$where);
		}else{
			$this->main->update('absen',['pembimbing_2' => 'belum'],$where);
		}
	}

	if ($input['status'] == 'penguji_1') {
		if ($absen->penguji_1 == 'belum') {
			$this->main->update('absen',['penguji_1' => 'hadir'],$where);
		}else{
			$this->main->update('absen',['penguji_1' => 'belum'],$where);
		}
	}
	if ($input['status'] == 'penguji_2') {
		if ($absen->penguji_2 == 'belum') {
			$this->main->update('absen',['penguji_2' => 'hadir'],$where);
		}else{
			$this->main->update('absen',['penguji_2' => 'belum'],$where);
		}
	}
	echo json_encode('success');
}


public function update_check_absen_dosen2(){
	$input = $this->input->post(null,true);
	$where = ['id' => $input['id'],'jenis_kegiatan' => 'sidang skripsi'];
	$absen = $this->main->get_where('absen',$where);
	if ($input['status'] == 'pembimbing_1') {
		if ($absen->pembimbing_1 == 'belum') {
			$this->main->update('absen',['pembimbing_1' => 'hadir'],$where);
		}else{
			$this->main->update('absen',['pembimbing_1' => 'belum'],$where);
		}
	}

	if ($input['status'] == 'pembimbing_2') {
		if ($absen->pembimbing_2 == 'belum') {
			$this->main->update('absen',['pembimbing_2' => 'hadir'],$where);
		}else{
			$this->main->update('absen',['pembimbing_2' => 'belum'],$where);
		}
	}

	if ($input['status'] == 'penguji_1') {
		if ($absen->penguji_1 == 'belum') {
			$this->main->update('absen',['penguji_1' => 'hadir'],$where);
		}else{
			$this->main->update('absen',['penguji_1' => 'belum'],$where);
		}
	}
	if ($input['status'] == 'penguji_2') {
		if ($absen->penguji_2 == 'belum') {
			$this->main->update('absen',['penguji_2' => 'hadir'],$where);
		}else{
			$this->main->update('absen',['penguji_2' => 'belum'],$where);
		}
	}
	echo json_encode('success');
}
}
        
    /* End of file  admin.php */
        
                            