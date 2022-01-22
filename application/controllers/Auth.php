<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		if (userdata()) redirect('dashboard');
        $data['judul'] = "Login";
        $this->tmp->view('templates/_header','login',$data);
	}


     public function signup()
    {
        if (userdata()) redirect('dashboard');

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
				  'desa' => [
                    'field'    => 'desa_id',
                     'label'   => 'Desa',
                     'rules'   => 'required',
                     'errors'    => [
                        'required' => 'Mohon memilih {field}',
                     ]
                  ],

                  'email' => [
                    'field'    => 'email',
                     'label'   => 'Email',
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
                     ]
                  ],
                  'password2' => [
                    'field'    => 'password2',
                     'label'   => 'Confirm Password',
                     'rules'   => 'required|trim|matches[password]',
                     'errors'    => [
                        'required' => 'kolom {field} wajib diisi',
                        'matches' => 'kolom {field} tidak sama',
                     ]
                  ]
             
            ];


        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == false) {
             $response = array(
                'status' => 'error',
                'message' => array(
                    'nama' => strip_tags(form_error('username')),
                    'email' => strip_tags(form_error('email')),
                    'desa' => strip_tags(form_error('desa_id')),
                    'password' => strip_tags(form_error('password')),
                    'password2' => strip_tags(form_error('password2')),
                ),
            );
        } else {

            $response = array(
                'status' => 'success',
            );
            $input = $this->input->post(null, true);
            $user = $input['username'];

            unset($input['password2']);
            $input['password'] = password_hash($input['password'], PASSWORD_DEFAULT);
            $input['role'] = 'member';
            $this->main->insert('users', $input);

            //membuat session user
            $getUser = $this->main->get_where('users', ['username' => $user]);
            $this->session->set_userdata('user_session', $getUser->user_id);

        }
        echo json_encode($response);
    }


    public function login(){

        
         $config = [
               'email' => [
                    'field'    => 'email',
                     'label'   => 'Email',
                     'rules'   => 'required|trim',
                     'errors'    => [
                        'required' => 'kolom {field} wajib disi',
                     ]
                  ],
                   'password' => [
                    'field'    => 'password',
                     'label'   => 'Password',
                     'rules'   => 'required|trim',
                     'errors'    => [
                        'required' => 'kolom {field} wajib diisi',
                     ]
                  ],
              ];
            $this->form_validation->set_rules($config);


        if ($this->form_validation->run() == false) {
             $response = array(
                'status' => 'error',
                'message' => array(
                    'email' => strip_tags(form_error('email')),
                    'password' => strip_tags(form_error('password')),
                ),
            );
        } else {
            //pengambilan data
            $input = $this->input->post(null, true);
            $email = '"'.$input['email'].'"';
            $pass = $input['password'];
			
            $getUser = $this->main->get_user($email);
           
           //pengecekan user
		   if ($getUser) {
			// pengecekan password
			if (password_verify($pass, $getUser->password)) {
				$this->session->set_userdata('user_session', $getUser->user_id);
				if ($getUser->role == "mahasiswa") {
					//diarahkan ke post
					   $response = array(
						'status' => 'success',
						'url'    => base_url().'dashboard'
					);
				} else {
					//diarahkan ke dashboard
					  $response = array(
						'status' => 'success',
						'url'    => base_url().'dashboard'
					);
				}
			} else {
				 $response = array(
						'status' => 'error',
						'message' => array(
						'password_salah' => setMsg('danger','Maaf Password','anda salah')
						 ),
					);
			}
			} else {
			//user belum terdaftar
			  $response = array(
						'status' => 'error',
						'message' => array(
						'notregister' =>  setMsg('warning','Maaf Email','belum terdaftar')
						 ),
					);
		}
        }
         echo json_encode($response);
    }


    public function signout()
    {
        $this->session->unset_userdata('user_session');
        redirect('auth');
    }

	public function get_data()
{
	$data = file_get_contents('assets/setting.json');
	echo $data;             
}

public function get_desa()
{
	$data = $this->main->get('ref_desa');
	echo json_encode($data);             
}

}



/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */
