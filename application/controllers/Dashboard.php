<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Dashboard extends CI_Controller {

public function index()
{
	check_session();
	$data['yudisium'] = get_yudisium();
	$data['bimbing'] = get_bimbingan();
	$data['uji'] = get_uji();
	$data['total_skripsi'] = get_totalskripsi();
	$data['judul'] = 'SIF-OKe';
	$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>';
    $this->tmp->view('templates/_header','dashboard',$data);          
}

        
}
        
    /* End of file  dashboard.php */
        
                            