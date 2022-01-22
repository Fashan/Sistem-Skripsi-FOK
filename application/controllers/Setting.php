<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Setting extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		check_session();
	}
	
	private function _configUpload($path)
{
	$config['upload_path'] = $path;
	$config['encrypt_name'] = TRUE;
	$config['allowed_types'] = 'png|jpg|jpeg';
	$this->load->library('upload');
	$this->upload->initialize($config);
}

	public function ubah_foto(){
		$path = FCPATH.'assets/img/user';
		$id = $this->input->post('id');
		$where = [
			'user_id' => $id
		];
		 // file Upload
		 if (!empty($_FILES['file']['name'])) {
			 $data = $this->main->get_where('users',$where);
			 $old_file = FCPATH.'assets/img/user/'.$data->avatar;
			 if (is_file($old_file)) {
				 unlink($old_file);
			 }
			$this->_configUpload($path);
	
			if ($this->upload->do_upload('file')) {
				$file = $this->upload->data();
				$input['avatar'] = $file['file_name'];
				$this->main->update('users',$input,$where);
				
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
        
	public function ubah_password(){
		$config = [
			'password_lama' => [
				 'field'    => 'password_lama',
				  'label'   => 'Password Lama',
				  'rules'   => 'required|trim',
				  'errors'    => [
					 'required' => 'kolom {field} wajib diisi',
				  ]
			   ],
				'password' => [
				 'field'    => 'password',
				  'label'   => 'Password',
				  'rules'   => 'required|trim|min_length[8]',
				  'errors'    => [
					 'required' => 'kolom {field} wajib diisi',
					 'min_length' => 'minimal 8 karakter',
				  ],
				],
				  'passwordconf' => [
					'field'    => 'passwordconf',
					 'label'   => 'Konfirmasi Password',
					 'rules'   => 'required|trim|matches[password]',
					 'errors'    => [
						'required' => 'kolom {field} wajib diisi',
						'matches' => 'kolom {field} tidak sama'
					 ],
			   ],
		   ];

		   $this->form_validation->set_rules($config);
		   if ($this->form_validation->run() == false) {
			$response = array(
			   'status' => 'error',
			   'message' => array(
				   'password_lama' => strip_tags(form_error('password_lama')),
				   'password' => strip_tags(form_error('password')),
				   'passwordconf' => strip_tags(form_error('passwordconf')),
			   ),
		   );
	   } else {
		   $id = $this->input->post('id');
		   $pass = $this->input->post('password_lama');
		   $pass_new = $this->input->post('password');
		   $user = $this->main->get_where('users',['user_id' => $id]);
		   if (password_verify($pass, $user->password) ) {
            $pass_new = password_hash($pass_new, PASSWORD_DEFAULT);
			$this->main->update('users',['password' => $pass_new],['user_id'=>$id]);
			$response = array(
				'status' => 'success',
				'message' => array(
					'success' => 'password berhasil di ubah',
				),
			);
		   }else {
			$response = array(
				'status' => 'failed',
				'message' => array(
					'failed' => 'Password Lama yang di input tidak sesuai',
				),
			);
		   }
	   }
	   echo json_encode($response);
	}
}
        
    /* End of file  setting.php */
        
                            