<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Mahasiswa extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		check_role(['mahasiswa',"dosen",'kaprodi','PA']);
	}
	

public function index()
{
             
}

public function ide_skripsi(){
	$data["judul"] = "SIF-OKe";
	$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
	<li class="breadcrumb-item"><a href="">Skripsi</a></li>
	<li class="breadcrumb-item"><a href="">Ide Skripsi</a></li>
	';
	$this->tmp->view('templates/_header','mahasiswa/ide_skripsi',$data);  
}
public function skripsi(){
	$data["judul"] = "SIF-OKe";
	$data["mahasiswa"] = $this->main->get_mahasiswa(userdata()->user_id);
	$data["seminar"]  = $this->main->get_where('events',['mahasiswa_id' => userdata()->user_id,'keterangan'=>'seminar proposal']);
	$data["sidang"]  = $this->main->get_where('events',['mahasiswa_id' => userdata()->user_id,'keterangan'=>'sidang skripsi']);
	$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
	<li class="breadcrumb-item"><a href="">Skripsi</a></li>
	<li class="breadcrumb-item"><a href="">Skripsi Saya</a></li>
	';
	$this->tmp->view('templates/_header','mahasiswa/skripsi',$data);  
}

public function pembimbing1_proposal(){

	$data['pembimbing'] = $this->main->get_pembimbing_byrole("Pembimbing 1 Proposal");

	$data["judul"] = "SIF-OKe";
	$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
	<li class="breadcrumb-item"><a href="">Bimbingan Proposal</a></li>
	<li class="breadcrumb-item"><a href="">pembimbing 1</a></li>
	';
	$this->tmp->view('templates/_header','bimbingan_proposal/pembimbing1',$data); 
}

public function pembimbing2_proposal(){
	

	$data['pembimbing'] = $this->main->get_pembimbing_byrole("Pembimbing 2 Proposal");
	$data["judul"] = "SIF-OKe";
	$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
	<li class="breadcrumb-item"><a href="">Bimbingan Proposal</a></li>
	<li class="breadcrumb-item"><a href="">pembimbing 2</a></li>
	';
	$this->tmp->view('templates/_header','bimbingan_proposal/pembimbing2',$data); 
}

public function penguji1_proposal(){

	$data['penguji'] = $this->main->get_pembimbing_byrole("Penguji 1 Proposal");

	$data["judul"] = "SIF-OKe";
	$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
	<li class="breadcrumb-item"><a href="">Revisi Proposal</a></li>
	<li class="breadcrumb-item"><a href="">penguji 1</a></li>
	';
	$this->tmp->view('templates/_header','bimbingan_proposal/penguji1',$data); 
}

public function penguji2_proposal(){

	$data['penguji'] = $this->main->get_pembimbing_byrole("Penguji 2 Proposal");

	$data["judul"] = "SIF-OKe";
	$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
	<li class="breadcrumb-item"><a href="">Revisi Proposal</a></li>
	<li class="breadcrumb-item"><a href="">penguji 2</a></li>
	';
	$this->tmp->view('templates/_header','bimbingan_proposal/penguji2',$data); 
}


public function pembimbing1_skripsi(){

	$data['pembimbing'] = $this->main->get_pembimbing_byrole("Pembimbing 1 Skripsi/TA");

	$data["judul"] = "SIF-OKe";
	$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
	<li class="breadcrumb-item"><a href="">Bimbingan Skripsi</a></li>
	<li class="breadcrumb-item"><a href="">pembimbing 1</a></li>
	';
	$this->tmp->view('templates/_header','bimbingan_skripsi/pembimbing1',$data); 
}

public function pembimbing2_skripsi(){

	$data['pembimbing'] = $this->main->get_pembimbing_byrole("Pembimbing 2 Skripsi/TA");

	$data["judul"] = "SIF-OKe";
	$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
	<li class="breadcrumb-item"><a href="">Bimbingan Skripsi</a></li>
	<li class="breadcrumb-item"><a href="">pembimbing 2</a></li>
	';
	$this->tmp->view('templates/_header','bimbingan_skripsi/pembimbing2',$data); 
}

public function penguji1_skripsi(){

	$data['penguji'] = $this->main->get_pembimbing_byrole("Penguji 1 Skripsi/TA");

	$data["judul"] = "SIF-OKe";
	$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
	<li class="breadcrumb-item"><a href="">Revisi Skripsi</a></li>
	<li class="breadcrumb-item"><a href="">penguji 1</a></li>
	';
	$this->tmp->view('templates/_header','bimbingan_skripsi/penguji1',$data); 
}

public function penguji2_skripsi(){

	$data['penguji'] = $this->main->get_pembimbing_byrole("Penguji 2 Skripsi/TA");

	$data["judul"] = "SIF-OKe";
	$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
	<li class="breadcrumb-item"><a href="">Revisi Skripsi</a></li>
	<li class="breadcrumb-item"><a href="">penguji 1</a></li>
	';
	$this->tmp->view('templates/_header','bimbingan_skripsi/penguji2',$data); 
}
       

function tabel_ajukanjudul() {
	$list = $this->ide_skripsi->get_datatables();
	$data = array();
	$no = @$_POST['start'];
	foreach ($list as $judul) {
		$no++;
		$row = array();
		$row[] = $no;
		$row[] = $judul->judul;
		$row[] = $judul->abstrak;
		$row[] = $judul->file;
		$row[] = '<div class="button-group">
<button class="btn btn-sm btn-danger" onClick="deleteJudul('.$judul->id.');"><i class="fa fa-trash"></i></button>
<button type="button" data-id="'.$judul->id.'" data-judul="'.$judul->judul.'" data-abstrak="'.$judul->abstrak.'" data-file="'.$judul->file.'" class="btn btn-sm btn-warning btn-edit"><i class="fa fa-edit"></i></button>

</div>';
		$data[] = $row;
	}
	$output = array(
				"draw" => @$_POST['draw'],
				"recordsTotal" => $this->ide_skripsi->count_all(),
				"recordsFiltered" => $this->ide_skripsi->count_filtered(),
				"data" => $data,
			);
	// output to json format
	echo json_encode($output);
}

public function ajukanjudul(){
	$input = $this->input->post(null,true);
	$ide = [];
    $ide['mahasiswa_id'] = $input['mahasiswa_id'];
    $ide['judul'] = $input['judul'];
    $ide['abstrak'] = $input['abstrak'];
	
	if ($input['id']) {
		$where = [
			'id' => $input['id']
		];
		$judul = $this->main->get_where('ide_skripsi',$where);
		// hapus file
		$file = FCPATH.'assets/file/referensi/'.$judul->file;
		if (is_file($file)) {
			unlink($file);
		}
		// upload file
		$path = FCPATH.'assets/file/referensi';
		if (!empty($_FILES['file']['name'])) {
			$this->_configUpload($path);
			if ($this->upload->do_upload('file')) {
				$file = $this->upload->data();
				$ide['file'] = $file['file_name'];
			}
		}
		setFlashMsg('success','Judul','berhasil di edit');
		$this->main->update('ide_skripsi',$ide,$where);
	}else {
		$judul = $this->main->get_where('ide_skripsi',['mahasiswa_id' => userdata()->user_id]);
		if (!$judul) {
			setFlashMsg('success','Judul','berhasil ditambahkan');
			$this->main->update('users',['status' => 'mengajukan judul'],['user_id' => userdata()->user_id]);
		$ide['status'] = "belum ACC";
		$path = FCPATH.'assets/file/referensi';
		if (!empty($_FILES['file']['name'])) {
			$this->_configUpload($path);
			if ($this->upload->do_upload('file')) {
				$file = $this->upload->data();
				$ide['file'] = $file['file_name'];
				$this->main->insert('ide_skripsi',$ide);
			}
		}else {
			setFlashMsg('danger','Gagal','mohon maaf pastikan form telah disi dengan benar');
		}

		}else {
			setFlashMsg('danger','mohon maaf',' mahasiswa hanya dapat mengajukan satu judul');
		}
	
	}
	redirect('mahasiswa/ide_skripsi','refresh');
	
}

function tabel_dashboardajukanjudul() {
	$list = $this->ide_skripsi->get_datatables();
	$data = array();
	$no = @$_POST['start'];
	foreach ($list as $judul) {
		$no++;
		$row = array();
		$row[] = $no;
		$row[] = $judul->judul;
		$row[] = $judul->abstrak;
		if ($judul->status =="ditolak") {
			$row[] = '<div class="button-group">
<button class="btn btn-sm btn-danger" onClick="catatan('.$judul->id.');"><i class="far fa-times-circle"></i> ditolak</button>
</div>';
		}else if($judul->status == 'ACC'){
			$row[] = '<div class="button-group">
<button class="btn btn-sm btn-success" onClick="catatan('.$judul->id.');"><i class="fas fa-check"></i> ACC</button>
</div>';
		};

		if ($judul->status != "ACC") {
			$row[] = $judul->status;
			$row[] = '<div class="button-group">
<button  class="btn btn-sm btn-success" disabled><i class="fas fa-file-upload"></i> Bukti</button>
</div>';
		}else{
			if ($judul->bukti != null) {
				$row[] = '<div class="button-group">
				<button  class="btn btn-sm btn-success" disabled><i class="fas fa-file-upload"></i> '.$judul->bukti.'</button>
				<button  class="btn btn-sm btn-danger" onClick="deletebukti('.$judul->mahasiswa_id.');"><i class="fa fa-trash"></i></button>
				</div>';
			}else {
				$row[] = '<div class="button-group">
<button data-toggle="modal" data-target="#modal-uploadbukti" class="btn btn-sm btn-success" ><i class="fas fa-file-upload"></i> Bukti</button>
</div>';
			}
		}
	
		$data[] = $row;
	}
	$output = array(
				"draw" => @$_POST['draw'],
				"recordsTotal" => $this->ide_skripsi->count_all(),
				"recordsFiltered" => $this->ide_skripsi->count_filtered(),
				"data" => $data,
			);
	// output to json format
	echo json_encode($output);
}

public function get_catatan(){
	$id =$this->input->post('id',true);
	$where= [
		'id' => $id
	];
	$catatan = $this->main->get_where('ide_skripsi',$where);
	echo json_encode($catatan);
}


function deletejudul(){
	$id = $this->input->post('id',true);
	$ide_skripsi = $this->main->get_where('ide_skripsi',['id' => $id]);
	$file = FCPATH.'assets/file/bukti/' . $ide_skripsi->bukti;
	$ref = FCPATH.'assets/file/referensi/' . $ide_skripsi->file;
	if (is_file($file)) {
		unlink($file);
	}
	if (is_file($ref)) {
		unlink($ref);
	}
	$this->main->delete('ide_skripsi',['id' => $id]); 
	$response = array(
				'status' => 'success',
			);
	  echo json_encode($response);
}


private function _configUpload($path)
{
	$config['upload_path'] = $path;
	$config['allowed_types'] = 'pdf|zip';
	$this->load->library('upload');
	$this->upload->initialize($config);
}

public function uploadbukti(){
		$path = FCPATH.'assets/file/bukti';
		$id = $this->input->post('mahasiswa_id');
		$where = [
			'mahasiswa_id' => $id
		];
		 // file Upload
		 if (!empty($_FILES['file']['name'])) {
            $this->_configUpload($path);

            if ($this->upload->do_upload('file')) {
                $file = $this->upload->data();
                $input['bukti'] = $file['file_name'];
				$this->main->update('ide_skripsi',$input,$where);
				
				$response = array(
					'status' => 'success',
					'message' => setMsg('success','File','berhasil di Upload'),
				);
            } else {
				$response = array(
					'status' => 'error',
					'message' => setMsg('danger', "Failed to upload file : " . $this->upload->display_errors(),''),
				);
                

            }
        }else{
			$response = array(
				'status' => 'error',
				'message' => setMsg('danger','File','belum di upload'),
			);
		}
        echo json_encode($response);
}

function delete_bukti(){
	$id = $this->input->post('id');
	$ide_skripsi = $this->main->get_where('ide_skripsi',['mahasiswa_id' => $id]);
	$file = FCPATH.'assets/file/bukti/' . $ide_skripsi->bukti;
	if (is_file($file)) {
		unlink($file);
		$response = array(
			'status' => 'success',
		);
		$this->main->update('ide_skripsi',['bukti' => ''],['mahasiswa_id' => $id]);
	}
	echo json_encode($response);
}



public function upload_proposal(){
	$path = FCPATH.'assets/file/seminar_proposal';
	$id = $this->input->post('id');
	$where = [
		'id' => $id
	];
	 // file Upload
	 if (!empty($_FILES['file']['name'])) {
		$this->_configUpload($path);

		if ($this->upload->do_upload('file')) {
			$file = $this->upload->data();
			$input['file'] = $file['file_name'];
			$this->main->update('proposal',$input,$where);
			
			$response = array(
				'status' => 'success',
				'message' => setMsg('success','File','berhasil di Upload'),
			);
		} else {
			$response = array(
				'status' => 'error',
				'message' => setMsg('danger', "Failed to upload file : " . $this->upload->display_errors(),''),
			);
			

		}
	}else{
		$response = array(
			'status' => 'error',
			'message' => setMsg('danger','File','belum di upload'),
		);
	}
	echo json_encode($response);
}

function hapus_proposal(){
	$id = $this->input->post('id');
	$proposal = $this->main->get_where('proposal',['id' => $id]);
	$file = FCPATH . 'assets/file/seminar_proposal/'.$proposal->file;
	if (is_file($file)) {
		unlink($file);
	}
	$this->main->update('proposal',['file' => ''],['id' => $id]);
	echo json_encode('success');
}

function hapus_skripsi(){
	$id = $this->input->post('id');
	$skripsi = $this->main->get_where('skripsi',['id' => $id]);
	$file = FCPATH . 'assets/file/sidang_skripsi/'.$skripsi->file;
	if (is_file($file)) {
		unlink($file);
	}
	$this->main->update('skripsi',['file' => ''],['id' => $id]);
	echo json_encode('success');
}


public function upload_skripsi(){
	$path = FCPATH.'assets/file/sidang_skripsi';
	$id = $this->input->post('id');
	$where = [
		'id' => $id
	];
	 // file Upload
	 if (!empty($_FILES['file']['name'])) {
		$this->_configUpload($path);

		if ($this->upload->do_upload('file')) {
			$file = $this->upload->data();
			$input['file'] = $file['file_name'];
			$this->main->update('skripsi',$input,$where);
			
			$response = array(
				'status' => 'success',
				'message' => setMsg('success','File','berhasil di Upload'),
			);
		} else {
			$response = array(
				'status' => 'error',
				'message' => setMsg('danger', "Failed to upload file : " . $this->upload->display_errors(),''),
			);
			

		}
	}else{
		$response = array(
			'status' => 'error',
			'message' => setMsg('danger','File','belum di upload'),
		);
	}
	echo json_encode($response);
}


function download_proposal($file){
	$this->load->helper('download');
	$path = FCPATH.'assets/file/seminar_proposal/'.$file;
	if (is_file($path)) {
		force_download($path, NULL);
	};
}

function download_skripsi($file){
	$this->load->helper('download');
	$path = FCPATH.'assets/file/sidang_skripsi/'.$file;
	if (is_file($path)) {
		force_download($path, NULL);
	};
}

function download_referensi($file){
	$this->load->helper('download');
	$path = FCPATH.'assets/file/referensi/'.$file;
	if (is_file($path)) {
		force_download($path, NULL);
	};
}

public function seminar_proposal(){
	$data['mahasiswa'] = $this->main->get_mahasiswa(userdata()->user_id);
	$data['prasyarat'] = $this->main->get_where('prasyarat_proposal',['mahasiswa_id' => userdata()->user_id]);
	$data['jadwal'] = $this->main->get_where('events',['mahasiswa_id' => userdata()->user_id,'keterangan' => 'seminar proposal']);
	$data['moderator'] = $this->main->get_where('moderator',['mahasiswa_id' => userdata()->user_id]);
	$data["judul"] = "SIF-OKe";
	$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
	<li class="breadcrumb-item"><a href="">Prasyarat</a></li>
	<li class="breadcrumb-item"><a href="">Seminar Proposal</a></li>
	';
	$this->tmp->view('templates/_header','prasyarat/seminar_proposal',$data); 
}

public function sidang_skripsi(){
	$data['mahasiswa'] = $this->main->get_mahasiswa(userdata()->user_id);
	$data['prasyarat'] = $this->main->get_where('prasyarat_skripsi',['mahasiswa_id' => userdata()->user_id]);
	$data['jadwal'] = $this->main->get_where('events',['mahasiswa_id' => userdata()->user_id,'keterangan' => 'sidang skripsi']);
	$data["judul"] = "SIF_OKe";
	$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
	<li class="breadcrumb-item"><a href="">Prasyarat</a></li>
	<li class="breadcrumb-item"><a href="">Sidang Skripsi</a></li>
	';
	$this->tmp->view('templates/_header','prasyarat/sidang_skripsi',$data); 
}

public function yudisium(){
	$data['mahasiswa'] = $this->main->get_mahasiswa(userdata()->user_id);
	$data['prasyarat'] = $this->main->get_where('prasyarat_yudisium',['mahasiswa_id' => userdata()->user_id]);
	$data['jadwal'] = $this->main->get_where('events',['mahasiswa_id' => userdata()->user_id,'keterangan' => 'yudisium']);
	$data["judul"] = "SIF_OKe";
	$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
	<li class="breadcrumb-item"><a href="">Prasyarat</a></li>
	<li class="breadcrumb-item"><a href="">Yudisium</a></li>
	';
	$this->tmp->view('templates/_header','prasyarat/yudisium',$data); 
}



public function upload_prasyarat_p(){
	$id = $this->input->post('id');
	$mahasiswa = $this->main->get_where('users',['user_id' => $id]);
	if (!file_exists('assets/file/prasyarat/proposal/'.$mahasiswa->username)) {
		mkdir('assets/file/prasyarat/proposal/'.$mahasiswa->username);
	}
	$path = FCPATH.'assets/file/prasyarat/proposal/'.$mahasiswa->username;
	 // file Upload
	 if (!empty($_FILES['file_proposal']['name'])) {
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_proposal')) {
			$file = $this->upload->data();
			$input['file_proposal'] = $file['file_name'];
			$input['status_fileproposal'] = 'belum';
		}
	}
	 if (!empty($_FILES['file_kdn']['name'])) {
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_kdn')) {
			$file = $this->upload->data();
			$input['file_kdn'] = $file['file_name'];
			$input['status_filekdn'] = 'belum';
		}
	}
	 if (!empty($_FILES['file_kartubimbingan']['name'])) {
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_kartubimbingan')) {
			$file = $this->upload->data();
			$input['file_kartubimbingan'] = $file['file_name'];
			$input['status_filekartubimbingan'] = 'belum';
		}
	}
	 if (!empty($_FILES['file_khs']['name'])) {
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_khs')) {
			$file = $this->upload->data();
			$input['file_khs'] = $file['file_name'];
			$input['status_filekhs'] = 'belum';
		}
	}
	$input['mahasiswa_id'] = $id;
	$input['status_prasyarat'] = 'menunggu';
	$this->main->insert('prasyarat_proposal',$input);
	echo json_encode('success');
}

public function upload_prasyarat_s(){
	$id = $this->input->post('id');
	$mahasiswa = $this->main->get_where('users',['user_id' => $id]);
	if (!file_exists('assets/file/prasyarat/skripsi/'.$mahasiswa->username)) {
		mkdir('assets/file/prasyarat/skripsi/'.$mahasiswa->username);
	}
	$path = FCPATH.'assets/file/prasyarat/skripsi/'.$mahasiswa->username;
	//  file Upload
	 if (!empty($_FILES['file_transkipnilai']['name'])) {
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_transkipnilai')) {
			$file = $this->upload->data();
			$input['file_transkipnilai'] = $file['file_name'];
			$input['status_transkipnilai'] = 'belum';
		}
	}
	if (!empty($_FILES['file_biodatafoto']['name'])) {
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_biodatafoto')) {
			$file = $this->upload->data();
			$input['file_biodatafoto'] = $file['file_name'];
			$input['status_biodatafoto'] = 'belum';
		}
	}
	
	if (!empty($_FILES['file_kartubimbingan']['name'])) {
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_kartubimbingan')) {
			$file = $this->upload->data();
			$input['file_kartubimbingan'] = $file['file_name'];
			$input['status_kartubimbingan'] = 'belum';
		}
	}

	if (!empty($_FILES['file_suratlab']['name'])) {
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_suratlab')) {
			$file = $this->upload->data();
			$input['file_suratlab'] = $file['file_name'];
			$input['status_suratlab'] = 'belum';
		}
    }
	 if (!empty($_FILES['file_bebaspiutang']['name'])) {
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_bebaspiutang')) {
			$file = $this->upload->data();
			$input['file_bebaspiutang'] = $file['file_name'];
			$input['status_bebaspiutang'] = 'belum';
		}
    }
	 if (!empty($_FILES['file_surattugas']['name'])) {
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_surattugas')) {
			$file = $this->upload->data();
			$input['file_surattugas'] = $file['file_name'];
			$input['status_surattugas'] = 'belum';
		}
    }
	 if (!empty($_FILES['file_coverskripsi']['name'])) {
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_coverskripsi')) {
			$file = $this->upload->data();
			$input['file_coverskripsi'] = $file['file_name'];
			$input['status_coverskripsi'] = 'belum';
		}
    }
	 if (!empty($_FILES['file_piagam']['name'])) {
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_piagam')) {
			$file = $this->upload->data();
			$input['file_piagam'] = $file['file_name'];
			$input['status_piagam'] = 'belum';
		}
    }
	 if (!empty($_FILES['file_buktisumbangan']['name'])) {
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_buktisumbangan')) {
			$file = $this->upload->data();
			$input['file_buktisumbangan'] = $file['file_name'];
			$input['status_buktisumbangan'] = 'belum';
		}
    }

	 if (!empty($_FILES['file_skripsi']['name'])) {
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_skripsi')) {
			$file = $this->upload->data();
			$input['file_skripsi'] = $file['file_name'];
			$input['status_fileskripsi'] = 'belum';
		}
    }
    
	 if (!empty($_FILES['file_buktiartikel']['name'])) {
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_buktiartikel')) {
			$file = $this->upload->data();
			$input['file_buktiartikel'] = $file['file_name'];
			$input['status_buktiartikel'] = 'belum';
		}
	}
	$input['mahasiswa_id'] = $id;
	$input['status_prasyarat'] = 'menunggu';
	$this->main->insert('prasyarat_skripsi',$input);
	echo json_encode('success');
	
	 }
public function upload_prasyarat_y(){
	$id = $this->input->post('id');
	$mahasiswa = $this->main->get_where('users',['user_id' => $id]);
	if (!file_exists('assets/file/prasyarat/yudisium/'.$mahasiswa->username)) {
		mkdir('assets/file/prasyarat/yudisium/'.$mahasiswa->username);
	}
	$path = FCPATH.'assets/file/prasyarat/yudisium/'.$mahasiswa->username;
	 // file Upload
	 if (!empty($_FILES['file_buktirevisi']['name'])) {
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_buktirevisi')) {
			$file = $this->upload->data();
			$input['file_buktirevisi'] = $file['file_name'];
			$input['status_buktirevisi'] = 'belum';
		}
	}
	 if (!empty($_FILES['file_buktipublikasi']['name'])) {
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_buktipublikasi')) {
			$file = $this->upload->data();
			$input['file_buktipublikasi'] = $file['file_name'];
			$input['status_buktipublikasi'] = 'belum';
		}
	}
	 
	$input['mahasiswa_id'] = $id;
	$input['status_prasyarat'] = 'menunggu';
	$this->main->insert('prasyarat_yudisium',$input);
	echo json_encode('success');
}


public function reupload_prasyarat_p(){
	$id = $this->input->post('id');
	$mahasiswa = $this->main->get_where('users',['user_id' => $id]);
	$path = FCPATH.'assets/file/prasyarat/proposal/'.$mahasiswa->username;
	$where = [
		'mahasiswa_id' => $id,
	];
	$prasyarat = $this->main->get_where('prasyarat_proposal',$where);

	// file Upload
	if (!empty($_FILES['file_proposal']['name'])) {
		$file = $path.'/'.$prasyarat->file_proposal;
		if (is_file($file)) {
			unlink($file);
		}
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_proposal')) {
			$file = $this->upload->data();
			$input['file_proposal'] = $file['file_name'];
			$input['status_fileproposal'] = 'belum';
		}
	}
	 if (!empty($_FILES['file_kdn']['name'])) {
		$file = $path.'/'.$prasyarat->file_kdn;
		if (is_file($file)) {
			unlink($file);
		}
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_kdn')) {
			$file = $this->upload->data();
			$input['file_kdn'] = $file['file_name'];
			$input['status_filekdn'] = 'belum';
		}
	}
	 if (!empty($_FILES['file_kartubimbingan']['name'])) {
		$file = $path.'/'.$prasyarat->file_kartubimbingan;
		if (is_file($file)) {
			unlink($file);
		}
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_kartubimbingan')) {
			$file = $this->upload->data();
			$input['file_kartubimbingan'] = $file['file_name'];
			$input['status_filekartubimbingan'] = 'belum';
		}
	}
	 if (!empty($_FILES['file_khs']['name'])) {
		$file = $path.'/'.$prasyarat->file_khs;
		if (is_file($file)) {
			unlink($file);
		}
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_khs')) {
			$file = $this->upload->data();
			$input['file_khs'] = $file['file_name'];
			$input['status_filekhs'] = 'belum';
		}
	}

	$input['status_prasyarat'] = 'menunggu';
	$this->main->update('prasyarat_proposal',$input,$where);
	echo json_encode('success');
}


public function reupload_prasyarat_s(){
	$id = $this->input->post('id');
	$mahasiswa = $this->main->get_where('users',['user_id' => $id]);
	$path = FCPATH.'assets/file/prasyarat/skripsi/'.$mahasiswa->username;
	$where = [
		'mahasiswa_id' => $id,
	];
	$prasyarat = $this->main->get_where('prasyarat_skripsi',$where);
	//  file Upload
	 if (!empty($_FILES['file_transkipnilai']['name'])) {
		$file = $path.'/'.$prasyarat->file_transkipnilai;
		if (is_file($file)) {
			unlink($file);
		}
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_transkipnilai')) {
			$file = $this->upload->data();
			$input['file_transkipnilai'] = $file['file_name'];
			$input['status_transkipnilai'] = 'belum';
		}
	}
	if (!empty($_FILES['file_biodatafoto']['name'])) {
		$file = $path.'/'.$prasyarat->file_biodatafoto;
		if (is_file($file)) {
			unlink($file);
		}
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_biodatafoto')) {
			$file = $this->upload->data();
			$input['file_biodatafoto'] = $file['file_name'];
			$input['status_biodatafoto'] = 'belum';
		}
	}
	
	if (!empty($_FILES['file_kartubimbingan']['name'])) {
		$file = $path.'/'.$prasyarat->file_kartubimbingan;
		if (is_file($file)) {
			unlink($file);
		}
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_kartubimbingan')) {
			$file = $this->upload->data();
			$input['file_kartubimbingan'] = $file['file_name'];
			$input['status_kartubimbingan'] = 'belum';
		}
	}

	if (!empty($_FILES['file_suratlab']['name'])) {
		$file = $path.'/'.$prasyarat->file_suratlab;
		if (is_file($file)) {
			unlink($file);
		}
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_suratlab')) {
			$file = $this->upload->data();
			$input['file_suratlab'] = $file['file_name'];
			$input['status_suratlab'] = 'belum';
		}
    }
	 if (!empty($_FILES['file_bebaspiutang']['name'])) {
		$file = $path.'/'.$prasyarat->file_bebaspiutang;
		if (is_file($file)) {
			unlink($file);
		}
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_bebaspiutang')) {
			$file = $this->upload->data();
			$input['file_bebaspiutang'] = $file['file_name'];
			$input['status_bebaspiutang'] = 'belum';
		}
    }
	 if (!empty($_FILES['file_surattugas']['name'])) {
		$file = $path.'/'.$prasyarat->file_surattugas;
		if (is_file($file)) {
			unlink($file);
		}
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_surattugas')) {
			$file = $this->upload->data();
			$input['file_surattugas'] = $file['file_name'];
			$input['status_surattugas'] = 'belum';
		}
    }
	 if (!empty($_FILES['file_coverskripsi']['name'])) {
		$file = $path.'/'.$prasyarat->file_coverskripsi;
		if (is_file($file)) {
			unlink($file);
		}
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_coverskripsi')) {
			$file = $this->upload->data();
			$input['file_coverskripsi'] = $file['file_name'];
			$input['status_coverskripsi'] = 'belum';
		}
    }
	 if (!empty($_FILES['file_piagam']['name'])) {
		$file = $path.'/'.$prasyarat->file_piagam;
		if (is_file($file)) {
			unlink($file);
		}
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_piagam')) {
			$file = $this->upload->data();
			$input['file_piagam'] = $file['file_name'];
			$input['status_piagam'] = 'belum';
		}
    }
	 if (!empty($_FILES['file_buktisumbangan']['name'])) {
		$file = $path.'/'.$prasyarat->file_buktisumbangan;
		if (is_file($file)) {
			unlink($file);
		}
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_buktisumbangan')) {
			$file = $this->upload->data();
			$input['file_buktisumbangan'] = $file['file_name'];
			$input['status_buktisumbangan'] = 'belum';
		}
    }

	 if (!empty($_FILES['file_skripsi']['name'])) {
		$file = $path.'/'.$prasyarat->file_skripsi;
		if (is_file($file)) {
			unlink($file);
		}
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_skripsi')) {
			$file = $this->upload->data();
			$input['file_skripsi'] = $file['file_name'];
			$input['status_fileskripsi'] = 'belum';
		}
    }
    
	 if (!empty($_FILES['file_buktiartikel']['name'])) {
		$file = $path.'/'.$prasyarat->file_buktiartikel;
		if (is_file($file)) {
			unlink($file);
		}
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_buktiartikel')) {
			$file = $this->upload->data();
			$input['file_buktiartikel'] = $file['file_name'];
			$input['status_buktiartikel'] = 'belum';
		}
	}
	$input['status_prasyarat'] = 'menunggu';
	$this->main->update('prasyarat_skripsi',$input,$where);
	echo json_encode('success');
}

public function reupload_prasyarat_y(){
	$id = $this->input->post('id');
	$mahasiswa = $this->main->get_where('users',['user_id' => $id]);
	$path = FCPATH.'assets/file/prasyarat/yudisium/'.$mahasiswa->username;
	$where = [
		'mahasiswa_id' => $id,
	];
	$prasyarat = $this->main->get_where('prasyarat_yudisium',$where);
	 // file Upload
	 if (!empty($_FILES['file_buktirevisi']['name'])) {
		$file = $path.'/'.$prasyarat->file_buktirevisi;
		if (is_file($file)) {
			unlink($file);
		}
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_buktirevisi')) {
			$file = $this->upload->data();
			$input['file_buktirevisi'] = $file['file_name'];
			$input['status_buktirevisi'] = 'belum';
		}
	}
	 if (!empty($_FILES['file_buktipublikasi']['name'])) {
		$file = $path.'/'.$prasyarat->file_buktipublikasi;
		if (is_file($file)) {
			unlink($file);
		}
		$this->_configUpload($path);
		if ($this->upload->do_upload('file_buktipublikasi')) {
			$file = $this->upload->data();
			$input['file_buktipublikasi'] = $file['file_name'];
			$input['status_buktipublikasi'] = 'belum';
		}
	}
	 
	$input['status_prasyarat'] = 'menunggu';
	$this->main->update('prasyarat_yudisium',$input,$where);
	echo json_encode('success');
}




public function set_moderator(){
	$input = $this->input->post(null,true);
	$check = $this->main->get_where('moderator',['nim' => $input['nim']]);
	if (!$check) {
		$query = $this->main->insert('moderator',$input);
	if ($query) {
		$response = [
			'status' => 'success',
			'nama'   => $input['nama'] 
		];
	}else {
		$response = 'failed';
	}
	}else {
		$response = 'mahasiswa sudah pernah menjadi moderator';
	}
	echo json_encode($response);
}

function tabel_nilaiproposal() {
	$list = $this->nilai_proposal->get_datatables();
	$data = array();
	$no = @$_POST['start'];
	foreach ($list as $nilai) {
		$jumlah = 0;
		$no++;
		$row = array();
		// $row[] = $no;
		$row[] = $nilai->pembimbing_1;
		$jumlah = $nilai->pembimbing_1;
		$row[] = $nilai->pembimbing_2;
		$jumlah += $nilai->pembimbing_2;
		$row[] = $nilai->penguji_1;
		$jumlah += $nilai->penguji_1;
		$row[] = $nilai->penguji_2;
		$jumlah += $nilai->penguji_2;
		$jumlah = $jumlah / 4;
		if ($jumlah > 85 && $jumlah <= 100) {
			$row[] = round($jumlah, 2)." (A)";
		}
		if ($jumlah > 80 && $jumlah <= 85) {
			$row[] = round($jumlah, 2)." (-A)";
		}
		if ($jumlah > 76 && $jumlah <= 80) {
			$row[] = round($jumlah, 2)." (B+)";
		}
		if ($jumlah > 72 && $jumlah <= 76) {
			$row[] = round($jumlah, 2)." (B)";
		}
		if ($jumlah > 68 && $jumlah <= 72) {
			$row[] = round($jumlah, 2)." (B-)";
		}
		if ($jumlah > 64 && $jumlah <= 68) {
			$row[] = round($jumlah, 2)." (C+)";
		}
		if ($jumlah > 60  && $jumlah <= 64) {
			$row[] = round($jumlah, 2)." (C)";
		}
		if ($jumlah > 40 && $jumlah <= 60) {
			$row[] = round($jumlah, 2)." (D)";
		}
		if ($jumlah > 0 && $jumlah <= 40) {
			$row[] = round($jumlah, 2)." (E)";
		}
		
		$data[] = $row;
	}
	$output = array(
				"draw" => @$_POST['draw'],
				"recordsTotal" => $this->nilai_proposal->count_all(),
				"recordsFiltered" => $this->nilai_proposal->count_filtered(),
				"data" => $data,
			);
	// output to json format
	echo json_encode($output);
}

function tabel_nilaiskripsi() {
	$list = $this->nilai_skripsi->get_datatables();
	$data = array();
	$no = @$_POST['start'];
	foreach ($list as $nilai) {
		$jumlah = 0;
		$no++;
		$row = array();
		// $row[] = $no;
		$row[] = $nilai->pembimbing_1;
		$jumlah = $nilai->pembimbing_1;
		$row[] = $nilai->pembimbing_2;
		$jumlah += $nilai->pembimbing_2;
		$row[] = $nilai->penguji_1;
		$jumlah += $nilai->penguji_1;
		$row[] = $nilai->penguji_2;
		$jumlah += $nilai->penguji_2;
		$jumlah = $jumlah / 4;
		if ($jumlah > 85 && $jumlah <= 100) {
			$row[] = round($jumlah, 2)." (A)";
		}
		if ($jumlah > 80 && $jumlah <= 85) {
			$row[] = round($jumlah, 2)." (-A)";
		}
		if ($jumlah > 76 && $jumlah <= 80) {
			$row[] = round($jumlah, 2)." (B+)";
		}
		if ($jumlah > 72 && $jumlah <= 76) {
			$row[] = round($jumlah, 2)." (B)";
		}
		if ($jumlah > 68 && $jumlah <= 72) {
			$row[] = round($jumlah, 2)." (B-)";
		}
		if ($jumlah > 64 && $jumlah <= 68) {
			$row[] = round($jumlah, 2)." (C+)";
		}
		if ($jumlah > 60  && $jumlah <= 64) {
			$row[] = round($jumlah, 2)." (C)";
		}
		if ($jumlah > 40 && $jumlah <= 60) {
			$row[] = round($jumlah, 2)." (D)";
		}
		if ($jumlah > 0 && $jumlah <= 40) {
			$row[] = round($jumlah, 2)." (E)";
		}
		
		$data[] = $row;
	}
	$output = array(
				"draw" => @$_POST['draw'],
				"recordsTotal" => $this->nilai_skripsi->count_all(),
				"recordsFiltered" => $this->nilai_skripsi->count_filtered(),
				"data" => $data,
			);
	// output to json format
	echo json_encode($output);
}
}


        
    /* End of file  mahasiswa.php */
        
                            