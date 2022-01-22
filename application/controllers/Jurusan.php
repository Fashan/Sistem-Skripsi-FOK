<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Jurusan extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		check_role(['admin']);
	}
	

public function index()
{
        
}
        

function get_ajax() {
	$list = $this->jrn->get_datatables();
	$data = array();
	$no = @$_POST['start'];
	foreach ($list as $jurusan) {
		$no++;
		$row = array();
		$row[] = $no;
		$row[] = $jurusan->jurusan;
		$row[] = '<div class="button-group">
<a href="#" class="btn btn-sm btn-danger" onClick="deletejurusan('.$jurusan->id.');"><i class="fa fa-trash"></i></a>
<a href="#" class="btn btn-sm btn-warning" onClick="getjurusan('.$jurusan->id.');" ><i class="fa fa-edit"></i></a>
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



function addjurusan(){
	$config = [
			  'Jurusan' => [
				   'field'    => 'nama_jurusan',
					'label'   => 'Nama Jurusan',
					'rules'   => 'required|trim|is_unique[jurusan.nama_jurusan]',
					'errors'    => [
					   'required' => 'mohon mengisi {field} ',
					   'is_unique' => 'nama jurusan sudah tersedia'
					]
				 ],
				
			
		   ];
		   $this->form_validation->set_rules($config);
		   if ($this->form_validation->run() == false) {
				$response = array(
				   'status' => 'error',
				   'message' => array(
					   'namajurusan' => strip_tags(form_error('nama_jurusan')),
					   
				   ),
			   );
		   } else {
   
			   $response = array(
				   'status' => 'success',
			   );
			   $input = $this->input->post(null,true);
			   $this->main->insert('jurusan',$input);
	
		   }
   
   
   echo json_encode($response);
}


function deletejurusan(){
	$id = $this->input->post('id',true);
	$this->main->delete('jurusan',['id' => $id]); 
	$response = array(
				'status' => 'success',
			);
	  echo json_encode($response);
}


function getjurusan(){
	$id = $this->input->post('id',true);
 $where = [
	 'id' => $id
 ];
 $data = $this->main->get_where('jurusan',$where);
 echo json_encode($data);
}

function editjurusan(){
	$id = $this->input->post('id',true);
	$input = $this->input->post(null,true);
	
 $where = [
	 'id' => $id
 ];


	$this->main->update('jurusan',$input,$where);
	$response = array(
		'status' => 'success',
		'message' => setMsg('success','Jurusan','berhasil di ubah'),
	);

	echo json_encode($response);
}
  
}
        
    /* End of file  jurusan.php */
        
                            