<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Bimbingan extends CI_Controller {

public function __construct()
{
	parent::__construct();
	check_session();
}


	function tabel_bimbingan_p1() {
		$id = userdata()->user_id;
		$pembimbing = $this->main->get_pembimbing_byrole("Pembimbing 1 Proposal");
		$dosen_id = $pembimbing->user_id;
		$list = $this->bimbingan->get_datatables($id,$dosen_id);
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $bimbingan) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = custom_date('d-m-Y',$bimbingan->tanggal);
			$row[] = $bimbingan->bimbingan;
			$row[] = $bimbingan->status;
			$row[] = $bimbingan->oleh;
			if ($bimbingan->oleh == "mahasiswa") {
				$row[] = '<div class="button-group">
				<a href="'.base_url('bimbingan/download_filebimbingan/mahasiswa_p1/'.$bimbingan->nim.'/'.$bimbingan->file).'" class="btn btn-sm btn-success"><i class="fa fa-download"></i> '.$bimbingan->file.'</a>
				</div>';
			}else{
				$row[] = '<div class="button-group">
				<a href="'.base_url('bimbingan/download_filebimbingan/Pembimbing_1_Proposal/'.$bimbingan->nim.'/'.$bimbingan->file).'" class="btn btn-sm btn-success"><i class="fa fa-download"></i> '.$bimbingan->file.'</a>
				</div>';
			}
			if ($bimbingan->oleh == "mahasiswa") {
				$row[] = '<div class="button-group">
			<button class="btn btn-sm btn-warning" onClick="getlogbp('.$bimbingan->id.');" ><i class="fa fa-edit"></i></button>
	<button class="btn btn-sm btn-danger" onClick="deletelogbp('.$bimbingan->id.','.$bimbingan->nim.');"><i class="fa fa-trash"></i></button>
	</div>';
			}else{
				$row[] ="";
			}
			$data[] = $row;
		}
		$output = array(
					"draw" => @$_POST['draw'],
					"recordsTotal" => $this->bimbingan->count_all(),
					"recordsFiltered" => $this->bimbingan->count_filtered($id,$dosen_id),
					"data" => $data,
				);
		// output to json format
		echo json_encode($output);
	}
	
	
	function tabel_bimbingan_p2() {
		$id = userdata()->user_id;
		$pembimbing = $this->main->get_pembimbing_byrole("Pembimbing 2 Proposal");
		$dosen_id = $pembimbing->user_id;
		$list = $this->bimbingan->get_datatables($id,$dosen_id);
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $bimbingan) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = custom_date('d-m-Y',$bimbingan->tanggal);
			$row[] = $bimbingan->bimbingan;
			$row[] = $bimbingan->status;
			$row[] = $bimbingan->oleh;
			if ($bimbingan->oleh == "mahasiswa") {
				$row[] = '<div class="button-group">
				<a href="'.base_url('bimbingan/download_filebimbingan/mahasiswa_p2/'.$bimbingan->nim.'/'.$bimbingan->file).'" class="btn btn-sm btn-success"><i class="fa fa-download"></i> '.$bimbingan->file.'</a>
				</div>';
			}else{
				$row[] = '<div class="button-group">
				<a href="'.base_url('bimbingan/download_filebimbingan/Pembimbing_2_Proposal/'.$bimbingan->nim.'/'.$bimbingan->file).'" class="btn btn-sm btn-success"><i class="fa fa-download"></i> '.$bimbingan->file.'</a>
				</div>';
			}
			$row[] = '<div class="button-group">
			<button class="btn btn-sm btn-warning" onClick="getlogbp('.$bimbingan->id.');" ><i class="fa fa-edit"></i></button>
	<button class="btn btn-sm btn-danger" onClick="deletelogbp('.$bimbingan->id.','.$bimbingan->nim.');" ><i class="fa fa-trash"></i></button>
	</div>';
			$data[] = $row;
		}
		$output = array(
					"draw" => @$_POST['draw'],
					"recordsTotal" => $this->bimbingan->count_all(),
					"recordsFiltered" => $this->bimbingan->count_filtered($id,$dosen_id),
					"data" => $data,
				);
		// output to json format
		echo json_encode($output);
	}

	function tabel_bimbingan_pnj1_prop() {
		$id = userdata()->user_id;
		$penguji = $this->main->get_pembimbing_byrole("Penguji 1 Proposal");
		$dosen_id = $penguji->user_id;
		$list = $this->bimbingan->get_datatables($id,$dosen_id);
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $bimbingan) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = custom_date('d-m-Y',$bimbingan->tanggal);
			$row[] = $bimbingan->bimbingan;
			$row[] = $bimbingan->status;
			$row[] = $bimbingan->oleh;
			if ($bimbingan->oleh == "mahasiswa") {
				$row[] = '<div class="button-group">
				<a href="'.base_url('bimbingan/download_filebimbingan/mahasiswa_pnj1_prop/'.$bimbingan->nim.'/'.$bimbingan->file).'" class="btn btn-sm btn-success"><i class="fa fa-download"></i> '.$bimbingan->file.'</a>
				</div>';
			}else{
				$row[] = '<div class="button-group">
				<a href="'.base_url('bimbingan/download_filebimbingan/Penguji_1_Proposal/'.$bimbingan->nim.'/'.$bimbingan->file).'" class="btn btn-sm btn-success"><i class="fa fa-download"></i> '.$bimbingan->file.'</a>
				</div>';
			}
			if ($bimbingan->oleh == "mahasiswa") {
				$row[] = '<div class="button-group">
			<button class="btn btn-sm btn-warning" onClick="getlogbp('.$bimbingan->id.');" ><i class="fa fa-edit"></i></button>
	<button class="btn btn-sm btn-danger" onClick="deletelogbp('.$bimbingan->id.','.$bimbingan->nim.');"><i class="fa fa-trash"></i></button>
	</div>';
			}else{
				$row[] ="";
			}
			$data[] = $row;
		}
		$output = array(
					"draw" => @$_POST['draw'],
					"recordsTotal" => $this->bimbingan->count_all(),
					"recordsFiltered" => $this->bimbingan->count_filtered($id,$dosen_id),
					"data" => $data,
				);
		// output to json format
		echo json_encode($output);
	}

	function tabel_bimbingan_pnj2_prop() {
		$id = userdata()->user_id;
		$penguji = $this->main->get_pembimbing_byrole("Penguji 2 Proposal");
		$dosen_id = $penguji->user_id;
		$list = $this->bimbingan->get_datatables($id,$dosen_id);
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $bimbingan) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = custom_date('d-m-Y',$bimbingan->tanggal);
			$row[] = $bimbingan->bimbingan;
			$row[] = $bimbingan->status;
			$row[] = $bimbingan->oleh;
			if ($bimbingan->oleh == "mahasiswa") {
				$row[] = '<div class="button-group">
				<a href="'.base_url('bimbingan/download_filebimbingan/mahasiswa_pnj2_prop/'.$bimbingan->nim.'/'.$bimbingan->file).'" class="btn btn-sm btn-success"><i class="fa fa-download"></i> '.$bimbingan->file.'</a>
				</div>';
			}else{
				$row[] = '<div class="button-group">
				<a href="'.base_url('bimbingan/download_filebimbingan/Penguji_2_Proposal/'.$bimbingan->nim.'/'.$bimbingan->file).'" class="btn btn-sm btn-success"><i class="fa fa-download"></i> '.$bimbingan->file.'</a>
				</div>';
			}
			if ($bimbingan->oleh == "mahasiswa") {
				$row[] = '<div class="button-group">
			<button class="btn btn-sm btn-warning" onClick="getlogbp('.$bimbingan->id.');" ><i class="fa fa-edit"></i></button>
	<button class="btn btn-sm btn-danger" onClick="deletelogbp('.$bimbingan->id.','.$bimbingan->nim.');"><i class="fa fa-trash"></i></button>
	</div>';
			}else{
				$row[] ="";
			}
			$data[] = $row;
		}
		$output = array(
					"draw" => @$_POST['draw'],
					"recordsTotal" => $this->bimbingan->count_all(),
					"recordsFiltered" => $this->bimbingan->count_filtered($id,$dosen_id),
					"data" => $data,
				);
		// output to json format
		echo json_encode($output);
	}

	function tabel_bimbingan_pem1() {
		$id = userdata()->user_id;
		$pembimbing = $this->main->get_pembimbing_byrole("Pembimbing 1 Skripsi/TA");
		$dosen_id = $pembimbing->user_id;
		$list = $this->bimbingan2->get_datatables($id,$dosen_id);
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $bimbingan) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = custom_date('d-m-Y',$bimbingan->tanggal);
			$row[] = $bimbingan->bimbingan;
			$row[] = $bimbingan->status;
			$row[] = $bimbingan->oleh;
			if ($bimbingan->oleh == "mahasiswa") {
				$row[] = '<div class="button-group">
				<a href="'.base_url('bimbingan/download_filebimbingan/mahasiswa_pem1/'.$bimbingan->nim.'/'.$bimbingan->file).'" class="btn btn-sm btn-success"><i class="fa fa-download"></i> '.$bimbingan->file.'</a>
				</div>';
			}else{
				$row[] = '<div class="button-group">
				<a href="'.base_url('bimbingan/download_filebimbingan/Pembimbing_1_Skripsi/'.$bimbingan->nim.'/'.$bimbingan->file).'" class="btn btn-sm btn-success"><i class="fa fa-download"></i> '.$bimbingan->file.'</a>
				</div>';
			}
			if ($bimbingan->oleh == "mahasiswa") {
				$row[] = '<div class="button-group">
			<button class="btn btn-sm btn-warning" onClick="getlogbp2('.$bimbingan->id.');" ><i class="fa fa-edit"></i></button>
	<button class="btn btn-sm btn-danger" onClick="deletelogbp2('.$bimbingan->id.','.$bimbingan->nim.');"><i class="fa fa-trash"></i></button>
	</div>';
			}else{
				$row[] ="";
			}
			$data[] = $row;
		}
		$output = array(
					"draw" => @$_POST['draw'],
					"recordsTotal" => $this->bimbingan2->count_all(),
					"recordsFiltered" => $this->bimbingan2->count_filtered($id,$dosen_id),
					"data" => $data,
				);
		// output to json format
		echo json_encode($output);
	}

	function tabel_bimbingan_pem2() {
		$id = userdata()->user_id;
		$pembimbing = $this->main->get_pembimbing_byrole("Pembimbing 2 Skripsi/TA");
		$dosen_id = $pembimbing->user_id;
		$list = $this->bimbingan2->get_datatables($id,$dosen_id);
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $bimbingan) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = custom_date('d-m-Y',$bimbingan->tanggal);
			$row[] = $bimbingan->bimbingan;
			$row[] = $bimbingan->status;
			$row[] = $bimbingan->oleh;
			if ($bimbingan->oleh == "mahasiswa") {
				$row[] = '<div class="button-group">
				<a href="'.base_url('bimbingan/download_filebimbingan/mahasiswa_pem2/'.$bimbingan->nim.'/'.$bimbingan->file).'" class="btn btn-sm btn-success"><i class="fa fa-download"></i> '.$bimbingan->file.'</a>
				</div>';
			}else{
				$row[] = '<div class="button-group">
				<a href="'.base_url('bimbingan/download_filebimbingan/Pembimbing_1_Skripsi/'.$bimbingan->nim.'/'.$bimbingan->file).'" class="btn btn-sm btn-success"><i class="fa fa-download"></i> '.$bimbingan->file.'</a>
				</div>';
			}
			if ($bimbingan->oleh == "mahasiswa") {
				$row[] = '<div class="button-group">
			<button class="btn btn-sm btn-warning" onClick="getlogbp2('.$bimbingan->id.');" ><i class="fa fa-edit"></i></button>
	<button class="btn btn-sm btn-danger" onClick="deletelogbp2('.$bimbingan->id.','.$bimbingan->nim.');"><i class="fa fa-trash"></i></button>
	</div>';
			}else{
				$row[] ="";
			}
			$data[] = $row;
		}
		$output = array(
					"draw" => @$_POST['draw'],
					"recordsTotal" => $this->bimbingan2->count_all(),
					"recordsFiltered" => $this->bimbingan2->count_filtered($id,$dosen_id),
					"data" => $data,
				);
		// output to json format
		echo json_encode($output);
	}

	function tabel_bimbingan_pnj1() {
		$id = userdata()->user_id;
		$pembimbing = $this->main->get_pembimbing_byrole("Penguji 1 Skripsi/TA");
		$dosen_id = $pembimbing->user_id;
		$list = $this->bimbingan2->get_datatables($id,$dosen_id);
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $bimbingan) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = custom_date('d-m-Y',$bimbingan->tanggal);
			$row[] = $bimbingan->bimbingan;
			$row[] = $bimbingan->status;
			$row[] = $bimbingan->oleh;
			if ($bimbingan->oleh == "mahasiswa") {
				$row[] = '<div class="button-group">
				<a href="'.base_url('bimbingan/download_filebimbingan/mahasiswa_pnj1/'.$bimbingan->nim.'/'.$bimbingan->file).'" class="btn btn-sm btn-success"><i class="fa fa-download"></i> '.$bimbingan->file.'</a>
				</div>';
			}else{
				$row[] = '<div class="button-group">
				<a href="'.base_url('bimbingan/download_filebimbingan/Penguji_1_Skripsi/'.$bimbingan->nim.'/'.$bimbingan->file).'" class="btn btn-sm btn-success"><i class="fa fa-download"></i> '.$bimbingan->file.'</a>
				</div>';
			}
			if ($bimbingan->oleh == "mahasiswa") {
				$row[] = '<div class="button-group">
			<button class="btn btn-sm btn-warning" onClick="getlogbp2('.$bimbingan->id.');" ><i class="fa fa-edit"></i></button>
	<button class="btn btn-sm btn-danger" onClick="deletelogbp2('.$bimbingan->id.','.$bimbingan->nim.');"><i class="fa fa-trash"></i></button>
	</div>';
			}else{
				$row[] ="";
			}
			$data[] = $row;
		}
		$output = array(
					"draw" => @$_POST['draw'],
					"recordsTotal" => $this->bimbingan2->count_all(),
					"recordsFiltered" => $this->bimbingan2->count_filtered($id,$dosen_id),
					"data" => $data,
				);
		// output to json format
		echo json_encode($output);
	}


	function tabel_bimbingan_pnj2() {
		$id = userdata()->user_id;
		$pembimbing = $this->main->get_pembimbing_byrole("Penguji 2 Skripsi/TA");
		$dosen_id = $pembimbing->user_id;
		$list = $this->bimbingan2->get_datatables($id,$dosen_id);
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $bimbingan) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = custom_date('d-m-Y',$bimbingan->tanggal);
			$row[] = $bimbingan->bimbingan;
			$row[] = $bimbingan->status;
			$row[] = $bimbingan->oleh;
			if ($bimbingan->oleh == "mahasiswa") {
				$row[] = '<div class="button-group">
				<a href="'.base_url('bimbingan/download_filebimbingan/mahasiswa_pnj2/'.$bimbingan->nim.'/'.$bimbingan->file).'" class="btn btn-sm btn-success"><i class="fa fa-download"></i> '.$bimbingan->file.'</a>
				</div>';
			}else{
				$row[] = '<div class="button-group">
				<a href="'.base_url('bimbingan/download_filebimbingan/Penguji_2_Skripsi/'.$bimbingan->nim.'/'.$bimbingan->file).'" class="btn btn-sm btn-success"><i class="fa fa-download"></i> '.$bimbingan->file.'</a>
				</div>';
			}
			if ($bimbingan->oleh == "mahasiswa") {
				$row[] = '<div class="button-group">
			<button class="btn btn-sm btn-warning" onClick="getlogbp2('.$bimbingan->id.');" ><i class="fa fa-edit"></i></button>
	<button class="btn btn-sm btn-danger" onClick="deletelogbp2('.$bimbingan->id.','.$bimbingan->nim.');"><i class="fa fa-trash"></i></button>
	</div>';
			}else{
				$row[] ="";
			}
			$data[] = $row;
		}
		$output = array(
					"draw" => @$_POST['draw'],
					"recordsTotal" => $this->bimbingan2->count_all(),
					"recordsFiltered" => $this->bimbingan2->count_filtered($id,$dosen_id),
					"data" => $data,
				);
		// output to json format
		echo json_encode($output);
	}

	function tabel_bimbingandosen_p1($id,$dosen_role) {
		if ($dosen_role == "Pembimbing_1_Proposal") {
			$mahasiswa = "mahasiswa_p1";
		}else {
			$mahasiswa = "mahasiswa_p2";
		}
		$dosen_id = userdata()->user_id;
		$list = $this->bimbingan->get_datatables($id,$dosen_id);
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $bimbingan) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = custom_date('d-m-Y',$bimbingan->tanggal);
			$row[] = $bimbingan->bimbingan;
			$row[] = $bimbingan->status;
			$row[] = $bimbingan->oleh;
			if ($bimbingan->oleh == "mahasiswa") {
				$row[] = '<div class="button-group">
				<a href="'.base_url('bimbingan/download_filebimbingan/'.$mahasiswa.'/'.$bimbingan->nim.'/'.$bimbingan->file).'" class="btn btn-sm btn-success"><i class="fa fa-download"></i> '.$bimbingan->file.'</a>
				</div>';
			}else{
				$row[] = '<div class="button-group">
				<a href="'.base_url('bimbingan/download_filebimbingan/'.$dosen_role.'/'.$bimbingan->nim.'/'.$bimbingan->file).'" class="btn btn-sm btn-success"><i class="fa fa-download"></i> '.$bimbingan->file.'</a>
				</div>';
			}
			if ($bimbingan->oleh == "dosen") {
				$row[] = '<div class="button-group">
			<button class="btn btn-sm btn-warning" onClick="getlogbp('.$bimbingan->id.');" ><i class="fa fa-edit"></i></button>
	<button class="btn btn-sm btn-danger" onClick="deletelogbp('.$bimbingan->id.','.$bimbingan->nim.');" ><i class="fa fa-trash"></i></button>
	</div>';
			}else{
				$row[] ="";
			}
			$data[] = $row;
		}
		$output = array(
					"draw" => @$_POST['draw'],
					"recordsTotal" => $this->bimbingan->count_all(),
					"recordsFiltered" => $this->bimbingan->count_filtered($id,$dosen_id),
					"data" => $data,
				);
		// output to json format
		echo json_encode($output);
	}

	function tabel_bimbingandosen_pem1($id,$dosen_role) {
		if ($dosen_role == "Pembimbing_1_Skripsi/TA") {
			$mahasiswa = "mahasiswa_pem1";
		}else {
			$mahasiswa = "mahasiswa_pem2";
		}
		$dosen_id = userdata()->user_id;
		$list = $this->bimbingan2->get_datatables($id,$dosen_id);
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $bimbingan) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = custom_date('d-m-Y',$bimbingan->tanggal);
			$row[] = $bimbingan->bimbingan;
			$row[] = $bimbingan->status;
			$row[] = $bimbingan->oleh;
			if ($bimbingan->oleh == "mahasiswa") {
				$row[] = '<div class="button-group">
				<a href="'.base_url('bimbingan/download_filebimbingan/'.$mahasiswa.'/'.$bimbingan->nim.'/'.$bimbingan->file).'" class="btn btn-sm btn-success"><i class="fa fa-download"></i> '.$bimbingan->file.'</a>
				</div>';
			}else{
				$row[] = '<div class="button-group">
				<a href="'.base_url('bimbingan/download_filebimbingan/'.$dosen_role.'/'.$bimbingan->nim.'/'.$bimbingan->file).'" class="btn btn-sm btn-success"><i class="fa fa-download"></i> '.$bimbingan->file.'</a>
				</div>';
			}
			if ($bimbingan->oleh == "dosen") {
				$row[] = '<div class="button-group">
			<button class="btn btn-sm btn-warning" onClick="getlogbp2('.$bimbingan->id.');" ><i class="fa fa-edit"></i></button>
	<button class="btn btn-sm btn-danger" onClick="deletelogbp2('.$bimbingan->id.','.$bimbingan->nim.');" ><i class="fa fa-trash"></i></button>
	</div>';
			}else{
				$row[] ="";
			}
			$data[] = $row;
		}
		$output = array(
					"draw" => @$_POST['draw'],
					"recordsTotal" => $this->bimbingan->count_all(),
					"recordsFiltered" => $this->bimbingan->count_filtered($id,$dosen_id),
					"data" => $data,
				);
		// output to json format
		echo json_encode($output);
	}

	function tabel_bimbingandosen_pnj1($id,$dosen_role) {
		if ($dosen_role == "Penguji_1_Skirpsi/TA") {
			$mahasiswa = "mahasiswa_pnj1";
		}else {
			$mahasiswa = "mahasiswa_pnj2";
		}
		$dosen_id = userdata()->user_id;
		$list = $this->bimbingan2->get_datatables($id,$dosen_id);
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $bimbingan) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = custom_date('d-m-Y',$bimbingan->tanggal);
			$row[] = $bimbingan->bimbingan;
			$row[] = $bimbingan->status;
			$row[] = $bimbingan->oleh;
			if ($bimbingan->oleh == "mahasiswa") {
				$row[] = '<div class="button-group">
				<a href="'.base_url('bimbingan/download_filebimbingan/'.$mahasiswa.'/'.$bimbingan->nim.'/'.$bimbingan->file).'" class="btn btn-sm btn-success"><i class="fa fa-download"></i> '.$bimbingan->file.'</a>
				</div>';
			}else{
				$row[] = '<div class="button-group">
				<a href="'.base_url('bimbingan/download_filebimbingan/'.$dosen_role.'/'.$bimbingan->nim.'/'.$bimbingan->file).'" class="btn btn-sm btn-success"><i class="fa fa-download"></i> '.$bimbingan->file.'</a>
				</div>';
			}
			if ($bimbingan->oleh == "dosen") {
				$row[] = '<div class="button-group">
			<button class="btn btn-sm btn-warning" onClick="getlogbp2('.$bimbingan->id.');" ><i class="fa fa-edit"></i></button>
	<button class="btn btn-sm btn-danger" onClick="deletelogbp2('.$bimbingan->id.','.$bimbingan->nim.');" ><i class="fa fa-trash"></i></button>
	</div>';
			}else{
				$row[] ="";
			}
			$data[] = $row;
		}
		$output = array(
					"draw" => @$_POST['draw'],
					"recordsTotal" => $this->bimbingan->count_all(),
					"recordsFiltered" => $this->bimbingan->count_filtered($id,$dosen_id),
					"data" => $data,
				);
		// output to json format
		echo json_encode($output);
	}

	function tabel_bimbingandosen_pnj1_prop($id,$dosen_role) {
		if ($dosen_role == "Penguji_1_Proposal") {
			$mahasiswa = "mahasiswa_pnj1_prop";
		}else {
			$mahasiswa = "mahasiswa_pnj2_prop";
		}
		$dosen_id = userdata()->user_id;
		$list = $this->bimbingan->get_datatables($id,$dosen_id);
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $bimbingan) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = custom_date('d-m-Y',$bimbingan->tanggal);
			$row[] = $bimbingan->bimbingan;
			$row[] = $bimbingan->status;
			$row[] = $bimbingan->oleh;
			if ($bimbingan->oleh == "mahasiswa") {
				$row[] = '<div class="button-group">
				<a href="'.base_url('bimbingan/download_filebimbingan/'.$mahasiswa.'/'.$bimbingan->nim.'/'.$bimbingan->file).'" class="btn btn-sm btn-success"><i class="fa fa-download"></i> '.$bimbingan->file.'</a>
				</div>';
			}else{
				$row[] = '<div class="button-group">
				<a href="'.base_url('bimbingan/download_filebimbingan/'.$dosen_role.'/'.$bimbingan->nim.'/'.$bimbingan->file).'" class="btn btn-sm btn-success"><i class="fa fa-download"></i> '.$bimbingan->file.'</a>
				</div>';
			}
			if ($bimbingan->oleh == "dosen") {
				$row[] = '<div class="button-group">
			<button class="btn btn-sm btn-warning" onClick="getlogbp('.$bimbingan->id.');" ><i class="fa fa-edit"></i></button>
	<button class="btn btn-sm btn-danger" onClick="deletelogbp('.$bimbingan->id.','.$bimbingan->nim.');" ><i class="fa fa-trash"></i></button>
	</div>';
			}else{
				$row[] ="";
			}
			$data[] = $row;
		}
		$output = array(
					"draw" => @$_POST['draw'],
					"recordsTotal" => $this->bimbingan->count_all(),
					"recordsFiltered" => $this->bimbingan->count_filtered($id,$dosen_id),
					"data" => $data,
				);
		// output to json format
		echo json_encode($output);
	}

	function tabel_bimbingandosen_p2($id,$dosen_id,$dosen_role) {
		if ($dosen_role == "Pembimbing_1_Proposal") {
			$mahasiswa = "mahasiswa_p1";
		}else {
			$mahasiswa = "mahasiswa_p2";
		}
		$list = $this->bimbingan->get_datatables($id,$dosen_id);
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $bimbingan) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = custom_date('d-m-Y',$bimbingan->tanggal);
			$row[] = $bimbingan->bimbingan;
			$row[] = $bimbingan->status;
			$row[] = $bimbingan->oleh;
			if ($bimbingan->oleh == "mahasiswa") {
				$row[] = '<div class="button-group">
				<a href="'.base_url('bimbingan/download_filebimbingan/'.$mahasiswa.'/'.$bimbingan->nim.'/'.$bimbingan->file).'" class="btn btn-sm btn-success"><i class="fa fa-download"></i> '.$bimbingan->file.'</a>
				</div>';
			}else{
				$row[] = '<div class="button-group">
				<a href="'.base_url('bimbingan/download_filebimbingan/'.$dosen_role.'/'.$bimbingan->nim.'/'.$bimbingan->file).'" class="btn btn-sm btn-success"><i class="fa fa-download"></i> '.$bimbingan->file.'</a>
				</div>';
			}
			if ($bimbingan->oleh == "dosen" && userdata()->user_id == $dosen_id ) {
				$row[] = '<div class="button-group">
			<button class="btn btn-sm btn-warning" onClick="getlogbp2('.$bimbingan->id.');" ><i class="fa fa-edit"></i></button>
	<button class="btn btn-sm btn-danger" onClick="deletelogbp('.$bimbingan->id.','.$bimbingan->nim.');" ><i class="fa fa-trash"></i></button>
	</div>';
			}else{
				$row[] ="";
			}
			$data[] = $row;
		}
		$output = array(
					"draw" => @$_POST['draw'],
					"recordsTotal" => $this->bimbingan->count_all(),
					"recordsFiltered" => $this->bimbingan->count_filtered($id,$dosen_id),
					"data" => $data,
				);
		// output to json format
		echo json_encode($output);
	}

	function tabel_bimbingandosen_pem2($id,$dosen_id,$dosen_role) {
		if ($dosen_role == "Pembimbing_1_Skripsi/TA") {
			$mahasiswa = "mahasiswa_pem1";
		}else {
			$mahasiswa = "mahasiswa_pem2";
		}
		$list = $this->bimbingan2->get_datatables($id,$dosen_id);
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $bimbingan) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = custom_date('d-m-Y',$bimbingan->tanggal);
			$row[] = $bimbingan->bimbingan;
			$row[] = $bimbingan->status;
			$row[] = $bimbingan->oleh;
			if ($bimbingan->oleh == "mahasiswa") {
				$row[] = '<div class="button-group">
				<a href="'.base_url('bimbingan/download_filebimbingan/mahasiswa_pem2/'.$bimbingan->nim.'/'.$bimbingan->file).'" class="btn btn-sm btn-success"><i class="fa fa-download"></i> '.$bimbingan->file.'</a>
				</div>';
			}else{
				$row[] = '<div class="button-group">
				<a href="'.base_url('bimbingan/download_filebimbingan/'.$dosen_role.'/'.$bimbingan->nim.'/'.$bimbingan->file).'" class="btn btn-sm btn-success"><i class="fa fa-download"></i> '.$bimbingan->file.'</a>
				</div>';
			}
			if ($bimbingan->oleh == "dosen" && userdata()->user_id == $dosen_id ) {
				$row[] = '<div class="button-group">
			<button class="btn btn-sm btn-warning" onClick="getlogbp('.$bimbingan->id.');" ><i class="fa fa-edit"></i></button>
	<button class="btn btn-sm btn-danger" onClick="deletelogbp2('.$bimbingan->id.','.$bimbingan->nim.');" ><i class="fa fa-trash"></i></button>
	</div>';
			}else{
				$row[] ="";
			}
			$data[] = $row;
		}
		$output = array(
					"draw" => @$_POST['draw'],
					"recordsTotal" => $this->bimbingan2->count_all(),
					"recordsFiltered" => $this->bimbingan2->count_filtered($id,$dosen_id),
					"data" => $data,
				);
		// output to json format
		echo json_encode($output);
	}


	function tabel_bimbingandosen_pnj2($id,$dosen_id,$dosen_role) {
		if ($dosen_role == "Penguji_1_Skripsi/TA") {
			$mahasiswa = "mahasiswa_pnj1";
		}else {
			$mahasiswa = "mahasiswa_pnj2";
		}
		$list = $this->bimbingan2->get_datatables($id,$dosen_id);
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $bimbingan) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = custom_date('d-m-Y',$bimbingan->tanggal);
			$row[] = $bimbingan->bimbingan;
			$row[] = $bimbingan->status;
			$row[] = $bimbingan->oleh;
			if ($bimbingan->oleh == "mahasiswa") {
				$row[] = '<div class="button-group">
				<a href="'.base_url('bimbingan/download_filebimbingan/'.$mahasiswa.'/'.$bimbingan->nim.'/'.$bimbingan->file).'" class="btn btn-sm btn-success"><i class="fa fa-download"></i> '.$bimbingan->file.'</a>
				</div>';
			}else{
				$row[] = '<div class="button-group">
				<a href="'.base_url('bimbingan/download_filebimbingan/'.$dosen_role.'/'.$bimbingan->nim.'/'.$bimbingan->file).'" class="btn btn-sm btn-success"><i class="fa fa-download"></i> '.$bimbingan->file.'</a>
				</div>';
			}
			if ($bimbingan->oleh == "dosen" && userdata()->user_id == $dosen_id ) {
				$row[] = '<div class="button-group">
			<button class="btn btn-sm btn-warning" onClick="getlogbp('.$bimbingan->id.');" ><i class="fa fa-edit"></i></button>
	<button class="btn btn-sm btn-danger" onClick="deletelogbp2('.$bimbingan->id.','.$bimbingan->nim.');" ><i class="fa fa-trash"></i></button>
	</div>';
			}else{
				$row[] ="";
			}
			$data[] = $row;
		}
		$output = array(
					"draw" => @$_POST['draw'],
					"recordsTotal" => $this->bimbingan2->count_all(),
					"recordsFiltered" => $this->bimbingan2->count_filtered($id,$dosen_id),
					"data" => $data,
				);
		// output to json format
		echo json_encode($output);
	}

	function tabel_bimbingandosen_pnj2_prop($id,$dosen_id,$dosen_role) {
		if ($dosen_role == "Penguji_1_Proposal") {
			$mahasiswa = "mahasiswa_pnj1_prop";
		}else {
			$mahasiswa = "mahasiswa_pnj2_prop";
		}
		$list = $this->bimbingan->get_datatables($id,$dosen_id);
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $bimbingan) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = custom_date('d-m-Y',$bimbingan->tanggal);
			$row[] = $bimbingan->bimbingan;
			$row[] = $bimbingan->status;
			$row[] = $bimbingan->oleh;
			if ($bimbingan->oleh == "mahasiswa") {
				$row[] = '<div class="button-group">
				<a href="'.base_url('bimbingan/download_filebimbingan/mahasiswa_pnj2/'.$bimbingan->nim.'/'.$bimbingan->file).'" class="btn btn-sm btn-success"><i class="fa fa-download"></i> '.$bimbingan->file.'</a>
				</div>';
			}else{
				$row[] = '<div class="button-group">
				<a href="'.base_url('bimbingan/download_filebimbingan/'.$dosen_role.'/'.$bimbingan->nim.'/'.$bimbingan->file).'" class="btn btn-sm btn-success"><i class="fa fa-download"></i> '.$bimbingan->file.'</a>
				</div>';
			}
			if ($bimbingan->oleh == "dosen" && userdata()->user_id == $dosen_id ) {
				$row[] = '<div class="button-group">
			<button class="btn btn-sm btn-warning" onClick="getlogbp('.$bimbingan->id.');" ><i class="fa fa-edit"></i></button>
	<button class="btn btn-sm btn-danger" onClick="deletelogbp('.$bimbingan->id.','.$bimbingan->nim.');" ><i class="fa fa-trash"></i></button>
	</div>';
			}else{
				$row[] ="";
			}
			$data[] = $row;
		}
		$output = array(
					"draw" => @$_POST['draw'],
					"recordsTotal" => $this->bimbingan->count_all(),
					"recordsFiltered" => $this->bimbingan->count_filtered($id,$dosen_id),
					"data" => $data,
				);
		// output to json format
		echo json_encode($output);
	}

	
	private function _configUpload($path)
{
	$config['upload_path'] = $path;
	$config['allowed_types'] = 'doc|docx';
	$this->load->library('upload');
	$this->upload->initialize($config);
}
  
function set_folder($role,$username=null){
	if (!$username) {
		$username = $this->input->post('username');
	}

	// mahasiswa
	if ($role == "mahasiswa_p1") {
	if (!file_exists('assets/file/bimbingan/'.$username)) {
		mkdir('assets/file/bimbingan/'.$username);
	}
	if (!file_exists('assets/file/bimbingan/'.$username.'/mahasiswa_p1')) {
		mkdir('assets/file/bimbingan/'.$username.'/mahasiswa_p1');
	}
	return $path = FCPATH.'assets/file/bimbingan/'.$username.'/mahasiswa_p1';
	}

 if ($role == "mahasiswa_p2") {
	 if (!file_exists('assets/file/bimbingan/'.$username)) {
		mkdir('assets/file/bimbingan/'.$username);
	}
	if (!file_exists('assets/file/bimbingan/'.$username.'/mahasiswa_p2')) {
		mkdir('assets/file/bimbingan/'.$username.'/mahasiswa_p2');
	}
	return $path = FCPATH.'assets/file/bimbingan/'.$username.'/mahasiswa_p2';
 }
 if ($role == "mahasiswa_pnj1_prop") {
	if (!file_exists('assets/file/bimbingan/'.$username)) {
	   mkdir('assets/file/bimbingan/'.$username);
   }
   if (!file_exists('assets/file/bimbingan/'.$username.'/mahasiswa_pnj1_prop')) {
	   mkdir('assets/file/bimbingan/'.$username.'/mahasiswa_pnj1_prop');
   }
   return $path = FCPATH.'assets/file/bimbingan/'.$username.'/mahasiswa_pnj1_prop';
}


if ($role == "mahasiswa_pnj2_prop") {
	if (!file_exists('assets/file/bimbingan/'.$username)) {
	   mkdir('assets/file/bimbingan/'.$username);
   }
   if (!file_exists('assets/file/bimbingan/'.$username.'/mahasiswa_pnj2_prop')) {
	   mkdir('assets/file/bimbingan/'.$username.'/mahasiswa_pnj2_prop');
   }
   return $path = FCPATH.'assets/file/bimbingan/'.$username.'/mahasiswa_pnj2_prop';
}

 if ($role == "mahasiswa_pem1") {
	if (!file_exists('assets/file/bimbingan/'.$username)) {
	   mkdir('assets/file/bimbingan/'.$username);
   }
   if (!file_exists('assets/file/bimbingan/'.$username.'/mahasiswa_pem1')) {
	   mkdir('assets/file/bimbingan/'.$username.'/mahasiswa_pem1');
   }
   return $path = FCPATH.'assets/file/bimbingan/'.$username.'/mahasiswa_pem1';
}

if ($role == "mahasiswa_pem2") {
	if (!file_exists('assets/file/bimbingan/'.$username)) {
	   mkdir('assets/file/bimbingan/'.$username);
   }
   if (!file_exists('assets/file/bimbingan/'.$username.'/mahasiswa_pem2')) {
	   mkdir('assets/file/bimbingan/'.$username.'/mahasiswa_pem2');
   }
   return $path = FCPATH.'assets/file/bimbingan/'.$username.'/mahasiswa_pem2';
}


if ($role == "mahasiswa_pnj1") {
	if (!file_exists('assets/file/bimbingan/'.$username)) {
	   mkdir('assets/file/bimbingan/'.$username);
   }
   if (!file_exists('assets/file/bimbingan/'.$username.'/mahasiswa_pnj1')) {
	   mkdir('assets/file/bimbingan/'.$username.'/mahasiswa_pnj1');
   }
   return $path = FCPATH.'assets/file/bimbingan/'.$username.'/mahasiswa_pnj1';
}


if ($role == "mahasiswa_pnj2") {
	if (!file_exists('assets/file/bimbingan/'.$username)) {
	   mkdir('assets/file/bimbingan/'.$username);
   }
   if (!file_exists('assets/file/bimbingan/'.$username.'/mahasiswa_pnj2')) {
	   mkdir('assets/file/bimbingan/'.$username.'/mahasiswa_pnj2');
   }
   return $path = FCPATH.'assets/file/bimbingan/'.$username.'/mahasiswa_pnj2';
}
//  dosen
 if ($role == "Pembimbing_1_Proposal") {
	 if (!file_exists('assets/file/bimbingan/'.$username)) {
		mkdir('assets/file/bimbingan/'.$username);
	}
	if (!file_exists('assets/file/bimbingan/'.$username.'/Pembimbing_1_Proposal')) {
		mkdir('assets/file/bimbingan/'.$username.'/Pembimbing_1_Proposal');
	}
	return $path = FCPATH.'assets/file/bimbingan/'.$username.'/Pembimbing_1_Proposal';
 }

 if ($role == "Pembimbing_2_Proposal") {
	 if (!file_exists('assets/file/bimbingan/'.$username)) {
		mkdir('assets/file/bimbingan/'.$username);
	}
	if (!file_exists('assets/file/bimbingan/'.$username.'/Pembimbing_2_Proposal')) {
		mkdir('assets/file/bimbingan/'.$username.'/Pembimbing_2_Proposal');
	}
	return $path = FCPATH.'assets/file/bimbingan/'.$username.'/Pembimbing_2_Proposal';
 }

 if ($role == "Penguji_1_Proposal") {
	if (!file_exists('assets/file/bimbingan/'.$username)) {
	   mkdir('assets/file/bimbingan/'.$username);
   }
   if (!file_exists('assets/file/bimbingan/'.$username.'/Penguji_1_Proposal')) {
	   mkdir('assets/file/bimbingan/'.$username.'/Penguji_1_Proposal');
   }
   return $path = FCPATH.'assets/file/bimbingan/'.$username.'/Penguji_1_Proposal';
}

if ($role == "Penguji_2_Proposal") {
	if (!file_exists('assets/file/bimbingan/'.$username)) {
	   mkdir('assets/file/bimbingan/'.$username);
   }
   if (!file_exists('assets/file/bimbingan/'.$username.'/Penguji_2_Proposal')) {
	   mkdir('assets/file/bimbingan/'.$username.'/Penguji_2_Proposal');
   }
   return $path = FCPATH.'assets/file/bimbingan/'.$username.'/Penguji_2_Proposal';
}

 if ($role == "Pembimbing_1_Skripsi/TA" || $role == "Pembimbing_1_Skripsi") {
	if (!file_exists('assets/file/bimbingan/'.$username)) {
	   mkdir('assets/file/bimbingan/'.$username);
   }
   if (!file_exists('assets/file/bimbingan/'.$username.'/Pembimbing_1_Skripsi')) {
	   mkdir('assets/file/bimbingan/'.$username.'/Pembimbing_1_Skripsi');
   }
   return $path = FCPATH.'assets/file/bimbingan/'.$username.'/Pembimbing_1_Skripsi';
}

if ($role == "Pembimbing_2_Skripsi/TA" || $role == "Pembimbing_2_Skripsi") {
	if (!file_exists('assets/file/bimbingan/'.$username)) {
	   mkdir('assets/file/bimbingan/'.$username);
   }
   if (!file_exists('assets/file/bimbingan/'.$username.'/Pembimbing_2_Skripsi')) {
	   mkdir('assets/file/bimbingan/'.$username.'/Pembimbing_2_Skripsi');
   }
   return $path = FCPATH.'assets/file/bimbingan/'.$username.'/Pembimbing_2_Skripsi';
}

if ($role == "Penguji_1_Skripsi/TA" || $role == "Penguji_1_Skripsi") {
	if (!file_exists('assets/file/bimbingan/'.$username)) {
	   mkdir('assets/file/bimbingan/'.$username);
   }
   if (!file_exists('assets/file/bimbingan/'.$username.'/Penguji_1_Skripsi')) {
	   mkdir('assets/file/bimbingan/'.$username.'/Penguji_1_Skripsi');
   }
   return $path = FCPATH.'assets/file/bimbingan/'.$username.'/Penguji_1_Skripsi';
}

if ($role == "Penguji_2_Skripsi/TA" || $role == "Penguji_2_Skripsi") {
	if (!file_exists('assets/file/bimbingan/'.$username)) {
	   mkdir('assets/file/bimbingan/'.$username);
   }
   if (!file_exists('assets/file/bimbingan/'.$username.'/Penguji_2_Skripsi')) {
	   mkdir('assets/file/bimbingan/'.$username.'/Penguji_2_Skripsi');
   }
   return $path = FCPATH.'assets/file/bimbingan/'.$username.'/Penguji_2_Skripsi';
}


}





public function logbimbingan(){
	$role = $this->input->post('role_folder');
	$path = $this->set_folder($role);
	
		 // file Upload
		 if (!empty($_FILES['file']['name'])) {
            $this->_configUpload($path);

            if ($this->upload->do_upload('file')) {
				
                $file = $this->upload->data();
                $input['file'] = $file['file_name'];
				$input['tanggal'] = date("Y-m-d");
                $input['bimbingan'] = $this->input->post('bimbingan');
                $input['mahasiswa_id'] = $this->input->post('mahasiswa_id');
                $input['dosen_id'] = $this->input->post('dosen_id');
                $input['role_id'] = $this->input->post('role_id');
				$this->main->insert('bimbingan_proposal',$input);
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



public function logbimbingan2(){
	$role = $this->input->post('role_folder');
	$path = $this->set_folder($role);
	
		 // file Upload
		 if (!empty($_FILES['file']['name'])) {
            $this->_configUpload($path);

            if ($this->upload->do_upload('file')) {
				
                $file = $this->upload->data();
                $input['file'] = $file['file_name'];
				$input['tanggal'] = date("Y-m-d");
                $input['bimbingan'] = $this->input->post('bimbingan');
                $input['mahasiswa_id'] = $this->input->post('mahasiswa_id');
                $input['dosen_id'] = $this->input->post('dosen_id');
                $input['role_id'] = $this->input->post('role_id');
				$this->main->insert('bimbingan_skripsi',$input);
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

public function check(){
	echo json_encode($this->input->post(null,true));
}

public function download_filebimbingan($role,$nim,$file){
	$this->load->helper('download');
	$path = $this->set_folder($role,$nim).'/'.$file;
	if (is_file($path)) {
		force_download($path, NULL);
	};

	echo $path;
	
}

function delete_bimbingan(){
	$id = $this->input->post('id');
	$nim = $this->input->post('nim');
	$role = $this->input->post('role');
	$bimbingan = $this->main->get_where('bimbingan_proposal',['id' => $id]);
	$file = $this->set_folder($role,$nim).'/'. $bimbingan->file;
	if (is_file($file)) {
		unlink($file);
	}
	$response = array(
		'status' => 'success',
	);
	$this->main->delete('bimbingan_proposal',['id' => $id]);
	echo json_encode($response);
}      

function delete_bimbingan2(){
	$id = $this->input->post('id');
	$nim = $this->input->post('nim');
	$role = $this->input->post('role');
	$bimbingan = $this->main->get_where('bimbingan_skripsi',['id' => $id]);
	$file = $this->set_folder($role,$nim).'/'. $bimbingan->file;
	if (is_file($file)) {
		unlink($file);
	}
	$response = array(
		'status' => 'success',
	);
	$this->main->delete('bimbingan_skripsi',['id' => $id]);
	echo json_encode($response);
}  

    

public function getlogbimbingan(){
	$id = $this->input->post('id',true);
	$where = [
		'id' => $id
	];
	$bimbingan = $this->main->get_where('bimbingan_proposal',$where);
	$response = array(
		'status' => 'success',
		'bimbingan' => $bimbingan->bimbingan,
		'file' => $bimbingan->file,
	);
	echo json_encode($response);
}

public function getlogbimbingan2(){
	$id = $this->input->post('id',true);
	$where = [
		'id' => $id
	];
	$bimbingan = $this->main->get_where('bimbingan_skripsi',$where);
	$response = array(
		'status' => 'success',
		'bimbingan' => $bimbingan->bimbingan,
		'file' => $bimbingan->file,
	);
	echo json_encode($response);
}


public function editlogbimbingan(){
	$id = $this->input->post('id');
	$where = [
		'id' => $id
	];
	$bimbingan = $this->main->get_where('bimbingan_proposal',$where);
	$where2 = [
		'user_id' => $bimbingan->mahasiswa_id
	];
	$mahasiswa = $this->main->get_where('users',$where2);
	$role = $this->input->post('role');
	$path = $this->set_folder($role,$mahasiswa->username);
	$file = $path.'/'.$bimbingan->file;

		 // file Upload
		 if (!empty($_FILES['file']['name'])) {
			if (is_file($file)) {
				unlink($file);
			}
            $this->_configUpload($path);

            if ($this->upload->do_upload('file')) {
				
                $file = $this->upload->data();
                $input['file'] = $file['file_name'];
				$input['bimbingan'] = $this->input->post('bimbingan');
				$this->main->update('bimbingan_proposal',$input,$where);
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
			$input['bimbingan'] = $this->input->post('bimbingan');
			$this->main->update('bimbingan_proposal',$input,$where);
			$response = array(
				'status' => 'success',
				'message' => setMsg('success','File','berhasil di Upload'),
			);
		}
	
        echo json_encode($response);
}


public function editlogbimbingan2(){
	$id = $this->input->post('id');
	$where = [
		'id' => $id
	];
	$bimbingan = $this->main->get_where('bimbingan_skripsi',$where);
	$where2 = [
		'user_id' => $bimbingan->mahasiswa_id
	];
	$mahasiswa = $this->main->get_where('users',$where2);
	$role = $this->input->post('role');
	$path = $this->set_folder($role,$mahasiswa->username);
	$file = $path.'/'.$bimbingan->file;
		 // file Upload
		 if (!empty($_FILES['file']['name'])) {
			if (is_file($file)) {
				unlink($file);
			}
            $this->_configUpload($path);

            if ($this->upload->do_upload('file')) {
				
                $file = $this->upload->data();
                $input['file'] = $file['file_name'];
				$input['bimbingan'] = $this->input->post('bimbingan');
				$this->main->update('bimbingan_skripsi',$input,$where);
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
			$input['bimbingan'] = $this->input->post('bimbingan');
			$this->main->update('bimbingan_skripsi',$input,$where);
			$response = array(
				'status' => 'success',
				'message' => setMsg('success','File','berhasil di Upload'),
			);
		}
	
        echo json_encode('tes');
}





public function info_mahasiswa($mahasiswa_id)
{
	$get_pembimbing = $this->main->get_pembimbingprop_bymahasiswa($mahasiswa_id);
	$row=[];
	foreach ($get_pembimbing as $p) {
		if ($p->user_id == userdata()->user_id) {
			$row[0] = $p;
		}else{
			$row[1] = $p;
		}
	}

$jadwal = $this->main->get_where('events',['mahasiswa_id' => $mahasiswa_id,'keterangan' => "seminar proposal"]);
if ($jadwal) {
	if ($jadwal->status == 'selesai') {
		$data['jadwal'] = $jadwal;
	}else {
		$data['jadwal'] = '';
	}
}else {
	$data['jadwal'] = '';
}
	$data["mahasiswa"] = $this->main->get_mahasiswa($mahasiswa_id);
	$data["pembimbing"] = $row;
	$data["absen"] = $this->main->get_where('absen',['mahasiswa_id' => $mahasiswa_id,'jenis_kegiatan' => 'seminar proposal']);
	$data["proposal"] = $this->main->get_where('proposal',['mahasiswa_id' => $mahasiswa_id]);
	$data["role"] = $this->main->get('role');
	$data["judul"] = "SIF-OKe";
	$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
	<li class="breadcrumb-item"><a href="">Bimbingan</a></li>
	<li class="breadcrumb-item"><a href="">'.$data["mahasiswa"]->nama.'</a></li>
	';
	$this->tmp->view('templates/_header','dosen/info_mahasiswa',$data); 
                
}


public function info_mahasiswa3($mahasiswa_id)
{
	$get_pembimbing = $this->main->get_pembimbingskrip_bymahasiswa($mahasiswa_id);
	$row=[];
	foreach ($get_pembimbing as $p) {
		if ($p->user_id == userdata()->user_id) {
			$row[0] = $p;
		}else{
			$row[1] = $p;
		}
	}

$jadwal = $this->main->get_where('events',['mahasiswa_id' => $mahasiswa_id,'keterangan' => 'sidang skripsi']);
if ($jadwal) {
	if ($jadwal->status == 'selesai') {
		$data['jadwal'] = $jadwal;
	}else {
		$data['jadwal'] = '';
	}
}else {
	$data['jadwal'] = '';
}

$data["absen"] = $this->main->get_where('absen',['mahasiswa_id' => $mahasiswa_id,'jenis_kegiatan' => 'sidang skripsi']);
	$data["mahasiswa"] = $this->main->get_mahasiswa($mahasiswa_id);
	$data["pembimbing"] = $row;
	$data["skripsi"] = $this->main->get_where('skripsi',['mahasiswa_id' => $mahasiswa_id]);
	$data["role"] = $this->main->get('role');
	$data["judul"] = "SIF-OKe";
	$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
	<li class="breadcrumb-item"><a href="">Bimbingan</a></li>
	<li class="breadcrumb-item"><a href="">'.$data["mahasiswa"]->nama.'</a></li>
	';
	$this->tmp->view('templates/_header','dosen/info_mahasiswa3',$data); 
                
}


public function info_mahasiswa2($mahasiswa_id)
{
	$get_penguji = $this->main->get_pengujiprop_bymahasiswa($mahasiswa_id);
	$row=[];
	foreach ($get_penguji as $p) {
		if ($p->user_id == userdata()->user_id) {
			$row[0] = $p;
		}else{
			$row[1] = $p;
		}
	}

	$jadwal = $this->main->get_where('events',['mahasiswa_id' => $mahasiswa_id,'keterangan' => "seminar proposal"]);

	if ($row[0]->role == "Penguji 1 Proposal") {
		$proposal = $this->main->get_where('proposal',['mahasiswa_id' => $mahasiswa_id]);
		$data['keputusan'] = $proposal->status_pnj1;
	}else{
		$proposal = $this->main->get_where('proposal',['mahasiswa_id' => $mahasiswa_id]);
		$data['keputusan'] = $proposal->status_pnj2;
	}
	$data["absen"] = $this->main->get_where('absen',['mahasiswa_id' => $mahasiswa_id,'jenis_kegiatan' => 'seminar proposal']);
	$data["mahasiswa"] = $this->main->get_mahasiswa($mahasiswa_id);
	$data["penguji"] = $row;
	$data["proposal"] = $this->main->get_where('proposal',['mahasiswa_id' => $mahasiswa_id]);
	$data["role"] = $this->main->get('role');
	$data["jadwal"] = $jadwal;
	$data["judul"] = "SIF-OKe";
	$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
	<li class="breadcrumb-item"><a href="">Bimbingan</a></li>
	<li class="breadcrumb-item"><a href="">'.$data["mahasiswa"]->nama.'</a></li>
	';
	$this->tmp->view('templates/_header','dosen/info_mahasiswa2',$data); 
                
}



public function info_mahasiswa4($mahasiswa_id)
{
	$get_penguji = $this->main->get_pengujiskrip_bymahasiswa($mahasiswa_id);
	$row=[];
	foreach ($get_penguji as $p) {
		if ($p->user_id == userdata()->user_id) {
			$row[0] = $p;
		}else{
			$row[1] = $p;
		}
	}
	$jadwal = $this->main->get_where('events',['mahasiswa_id' => $mahasiswa_id,'keterangan' => 'sidang skripsi']);
	if ($row[0]->role == "Penguji 1 Skripsi/TA") {
		$skripsi = $this->main->get_where('skripsi',['mahasiswa_id' => $mahasiswa_id]);
		$data['keputusan'] = $skripsi->status_pnj1;
	}else{
		$skripsi = $this->main->get_where('skripsi',['mahasiswa_id' => $mahasiswa_id]);
		$data['keputusan'] = $skripsi->status_pnj2;
	}
	$data["absen"] = $this->main->get_where('absen',['mahasiswa_id' => $mahasiswa_id,'jenis_kegiatan' => 'sidang skripsi']);
	$data["mahasiswa"] = $this->main->get_mahasiswa($mahasiswa_id);
	$data["penguji"] = $row;
	$data["skripsi"] = $this->main->get_where('skripsi',['mahasiswa_id' => $mahasiswa_id]);
	$data["role"] = $this->main->get('role');
	$data["jadwal"] = $jadwal;
	$data["judul"] = "SIF-OKe";
	$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
	<li class="breadcrumb-item"><a href="">Bimbingan</a></li>
	<li class="breadcrumb-item"><a href="">'.$data["mahasiswa"]->nama.'</a></li>
	';
	$this->tmp->view('templates/_header','dosen/info_mahasiswa4',$data); 
                
}

public function acc_proposal(){
	$id = $this->input->post('id');
	$status = $this->input->post('status');
	$where = array('id' => $id);
	$statusdata = array( $status =>'ACC');
	$this->main->update('proposal',$statusdata,$where);
	echo json_encode('success');
}

public function acc_skripsi(){
	$id = $this->input->post('id');
	$status = $this->input->post('status');
	$where = array('id' => $id);
	$statusdata = array( $status =>'ACC');
	$this->main->update('skripsi',$statusdata,$where);
	echo json_encode('success');
}

public function batal_proposal(){
	$id = $this->input->post('id');
	$status = $this->input->post('status');
	$where = array('id' => $id);
	$statusdata = array( $status =>'belum ACC');
	$this->main->update('proposal',$statusdata,$where);
	echo json_encode('success');
}

public function batal_skripsi(){
	$id = $this->input->post('id');
	$status = $this->input->post('status');
	$where = array('id' => $id);
	$statusdata = array( $status =>'belum ACC');
	$this->main->update('skripsi',$statusdata,$where);
	echo json_encode('success');
}
}
        

        
    /* End of file  bimbingan.php */
        
                            