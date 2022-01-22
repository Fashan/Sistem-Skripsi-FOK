<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class PA extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		check_role(['PA']);
	}
	

public function index()
{
                
}

function tabel_judulmahasiswa() {
	$list = $this->judul_mahasiswa2->get_datatables();
	$data = array();
	$no = @$_POST['start'];
	foreach ($list as $judul) {
		$no++;
		$row = array();
		$row[] = $no;
		$row[] = $judul->nama;
		$row[] = $judul->judul;
		$row[] = $judul->abstrak;
		$row[] = $judul->status;
		$row[] = '<div class="button-group">
<button class="btn btn-sm btn-danger" onClick="getid('.$judul->id.');"><i class="far fa-times-circle"></i> tolak</button>
<a href="#" class="btn btn-sm btn-warning" onClick="infojudul('.$judul->id.');"><i class="fa fa-info"></i> detail</a>
<button class="btn btn-sm btn-success" onClick="acc_pa('.$judul->id.')" ><i class="fa fa-edit"></i> ACC</button>
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

public function acc($id){
	$where = [
		'id' => $id
	];
	$update =[
		'status' => 'ACC',
		'catatan' => ''
	];
	setFlashMsg('success','Judul','berhasil di ACC');
	$this->main->update('ide_skripsi',$update,$where);
	
	redirect('dashboard');
	

}
}
        
    /* End of file  PA.php */
        
                            