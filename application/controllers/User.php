<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class User extends CI_Controller {

public function __construct()
{
	parent::__construct();
	check_role(['admin']);
}


public function index()
{
	$this->db->select('role.*');
	$this->db->from('role');
	$this->db->not_like('role.role','Pembimbing');
	$this->db->not_like('role.role','Penguji');
	$role = $this->db->get();
	$role = $role->result();

	$data['judul'] = 'SIF-OKe';
	$data['jurusan'] = $this->main->get('jurusan');
	$data['prodi'] = $this->main->get('prodi');
	$data['role'] = $role;
	$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
	<li class="breadcrumb-item"><a href="">User</a></li>
	';
    $this->tmp->view('templates/_header','admin/user',$data);           
}

function get_ajax() {
	$def_avatar = $this->config->item('user_avatar_default');
	$list = $this->user->get_datatables();
	$data = array();
	$no = @$_POST['start'];
	foreach ($list as $user) {
		$no++;
		$row = array();
		$row[] = $no;
		$row[] = $user->nama;
		$row[] = $user->username;
		$row[] = $user->email;
		$row[] = $user->prodi;
		$row[] = $user->jurusan;
		$row[] = $user->role;
		$row[] = '<div class="button-group">
<a href="#" class="btn btn-sm btn-danger" onClick="deleteuser('.$user->user_id.');"><i class="fa fa-trash"></i></a>
<a href="#" class="btn btn-sm btn-warning" onClick="getuser('.$user->user_id.');" ><i class="fa fa-edit"></i></a>
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


function deleteuser(){
	$id = $this->input->post('id',true);
	$this->main->delete('users',['user_id' => $id]); 
	$response = array(
				'status' => 'success',
			);
	  echo json_encode($response);
}

function adduser(){
	 $config = [
               'username' => [
                    'field'    => 'username',
                     'label'   => 'Username',
                     'rules'   => 'required|trim|min_length[6]',
                     'errors'    => [
                        'required' => 'kolom {field} wajib diisi',
                        'min_length' => 'minimal 6 karakter',
                     ]
                  ],
				  'nama' => [
                    'field'    => 'nama',
                     'label'   => 'Nama',
                     'rules'   => 'required|trim',
                     'errors'    => [
                        'required' => 'kolom {field} wajib diisi',
                        // 'min_length' => 'minimal 6 karakter',
                     ]
                  ],
				  'prodi' => [
                    'field'    => 'prodi_id',
                     'label'   => 'Prodi',
                     'rules'   => 'required',
                     'errors'    => [
                        'required' => 'Mohon memilih {field}',
                     ]
                  ],
				  'jurusan' => [
                    'field'    => 'jurusan_id',
                     'label'   => 'Jurusan',
                     'rules'   => 'required',
                     'errors'    => [
                        'required' => 'Mohon memilih {field}',
                     ]
                  ],
				  'role' => [
                    'field'    => 'role_id',
                     'label'   => 'Role',
                     'rules'   => 'required',
                     'errors'    => [
                        'required' => 'Mohon memilih {field}',
                     ]
                  ],

                  'email' => [
                    'field'    => 'email',
                     'label'   => 'Email',
                     'rules'   => 'required|trim|is_unique[users.email]',
                     'errors'    => [
                        'required' => 'kolom {field} wajib diisi',
						'is_unique' => '{field} sudah terdaftar'
                     ]
                  ],
                
             
             
            ];
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == false) {
				 $response = array(
					'status' => 'error',
					'message' => array(
						'nama' => strip_tags(form_error('nama')),
						'username' => strip_tags(form_error('username')),
						'email' => strip_tags(form_error('email')),
						'prodi' => strip_tags(form_error('prodi_id')),
						'jurusan' => strip_tags(form_error('jurusan_id')),
						'role' => strip_tags(form_error('role_id')),
					),
				);
			} else {
	
				$input = $this->input->post(null,true);
				$input['password'] = $input['username'];
				$role = check_role_by_id($input['role_id']);
				if ($role->role == 'mahasiswa') {
					$input['status'] = "belum mengajukan judul";
				}
				$input['password'] = password_hash($input['password'], PASSWORD_DEFAULT);
				$this->main->insert('users',$input);
					$response = array(
		'status' => 'success',
		'message' => setMsg('success','User','berhasil di tambah'),
	);
	
			}
	
	
	


	echo json_encode($response);
}

function getuser(){
	$id = $this->input->post('id',true);
 $where = [
	 'user_id' => $id
 ];

 $data = $this->main->get_where('users',$where);
 echo json_encode($data);
}

function edituser(){
	$id = $this->input->post('user_id',true);
	$input = $this->input->post(null,true);
	$data = [];
	$data['nama'] = $input['nama'];
	$data['username'] = $input['username'];
	$data['email'] = $input['email'];
	$data['prodi_id'] = $input['prodi_id'];
	$data['jurusan_id'] = $input['jurusan_id'];
	$data['role_id'] = $input['role_id'];
	$data['pa_id'] = $this->input->post('pa_id');
 $where = [
	 'user_id' => $id
 ];
 $role = check_role_by_id($input['role_id']);
 if ($role->role =='mahasiswa') {
	if (!check_status_mahasiswa($id)) {
		$data['status'] = "belum mengajukan judul";
	}
 }

 if ($input['password'] != '') {
	$data['password'] = password_hash($input['password'], PASSWORD_DEFAULT);
}

	$this->main->update('users',$data,$where);
	$response = array(
		'status' => 'success',
		'message' => setMsg('success','User','berhasil di ubah'),
	);

	echo json_encode($response);
}
    

public function get_pa(){
	$this->db->select('users.*,role.role');
	$this->db->from('users');
	$this->db->join('role', 'users.role_id = role.id AND role.role = "PA"');
	$query =  $this->db->get();
	$query = $query->result();
	echo json_encode($query);
}
}
        
    /* End of file  user.php */
        
                            