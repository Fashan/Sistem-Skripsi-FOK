<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Prodi extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		check_role(['admin']);
	}
	
public function index()
{
                
}

function get_ajax() {
	$list = $this->prodi->get_datatables();
	$data = array();
	$no = @$_POST['start'];
	foreach ($list as $prodi) {
		$no++;
		$row = array();
		$row[] = $no;
		$row[] = $prodi->prodi;
		$row[] = '<div class="button-group">
<a href="#" class="btn btn-sm btn-danger" onClick="deleteprodi('.$prodi->id.');"><i class="fa fa-trash"></i></a>
<a href="#" class="btn btn-sm btn-warning" onClick="getprodi('.$prodi->id.');" ><i class="fa fa-edit"></i></a>
</div>';
		$data[] = $row;
	}
	$output = array(
				"draw" => @$_POST['draw'],
				"recordsTotal" => $this->user->count_all(),
				"recordsFiltered" => $this->user->count_filtered(),
				"data" => $data,
			);
	// output to json format
	echo json_encode($output);
}

function addprodi(){
	$config = [
			  'Prodi' => [
				   'field'    => 'nama_prodi',
					'label'   => 'Nama Prodi',
					'rules'   => 'required|trim|is_unique[prodi.nama_prodi]',
					'errors'    => [
					   'required' => 'mohon mengisi {field} ',
					   'is_unique' => 'nama prodi sudah tersedia'
					]
				 ],
				
			
		   ];
		   $this->form_validation->set_rules($config);
		   if ($this->form_validation->run() == false) {
				$response = array(
				   'status' => 'error',
				   'message' => array(
					   'namaprodi' => strip_tags(form_error('nama_prodi')),
					   
				   ),
			   );
		   } else {
   
			   $response = array(
				   'status' => 'success',
			   );
			   $input = $this->input->post(null,true);
			   $this->main->insert('prodi',$input);
	
		   }
   
   
   echo json_encode($response);
}


function deleteprodi(){
	$id = $this->input->post('id',true);
	$this->main->delete('prodi',['id' => $id]); 
	$response = array(
				'status' => 'success',
			);
	  echo json_encode($response);
}


function getprodi(){
	$id = $this->input->post('id',true);
 $where = [
	 'id' => $id
 ];
 $data = $this->main->get_where('prodi',$where);
 echo json_encode($data);
}

function editprodi(){
	$id = $this->input->post('id',true);
	$input = $this->input->post(null,true);
	
 $where = [
	 'id' => $id
 ];


	$this->main->update('prodi',$input,$where);
	$response = array(
		'status' => 'success',
		'message' => setMsg('success','Jurusan','berhasil di ubah'),
	);

	echo json_encode($response);
}
        
}
        
    /* End of file  prodi.php */
        
                            