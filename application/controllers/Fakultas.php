<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Fakultas extends CI_Controller {

public function __construct()
{
	parent::__construct();
	check_role(['admin']);
}

	public function index()
	{
		$data['judul'] = 'SIF-OKe';
		$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
	<li class="breadcrumb-item"><a href="">FOK</a></li>
	';
		$this->tmp->view('templates/_header','fakultas',$data);             
	}
        
}
        
    /* End of file  fakultas.php */
        
                            