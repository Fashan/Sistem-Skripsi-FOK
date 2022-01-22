<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Kaprodi extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		check_role(['kaprodi','PA']);
	}
	

public function index()
{
                
}

function tabel_judulmahasiswa() {
	$list = $this->judul_mahasiswa->get_datatables();
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
		if ($judul->status=="ACC" && $judul->bukti != null) {
			$row[] = '<div class="button-group">
<button class="btn btn-sm btn-warning" onClick="infojudul('.$judul->id.');"><i class="fa fa-info"></i> detail</button>
<a href="'.base_url("kaprodi/bukti_acc/".$judul->mahasiswa_id).'" class="btn btn-sm btn-warning"><i class="fa fa-info"></i> Bukti</a>
<a href="'.base_url("kaprodi/menu_pembimbing/".$judul->mahasiswa_id).'" class="btn btn-sm btn-success"  ><i class="fa fa-edit"></i> Pembimbing</a>
<a href="'.base_url("kaprodi/menu_penguji/".$judul->mahasiswa_id).'" class="btn btn-sm btn-success"  ><i class="fa fa-edit"></i> Penguji</a>
</div>';
		}else {
			$row[] = '<div class="button-group">
<a href="#" class="btn btn-sm btn-warning" onClick="infojudul('.$judul->id.');"><i class="fa fa-info"></i> detail</a>
<button  class="btn btn-sm btn-warning" disabled><i class="fa fa-info"></i> Bukti</button>
<button  class="btn btn-sm btn-success"  disabled><i class="fa fa-edit"></i> </button>
<button  class="btn btn-sm btn-success"  disabled><i class="fa fa-edit"></i> </button>
</div>';
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

public function tolakjudul(){
	$id = $this->input->post('id',true);
	$input = $this->input->post(null,true);
	$this->main->update('ide_skripsi',$input,['id' => $id]); 
	$response = array(
				'status' => 'success',
				'message' => setMsg('success','Judul','mahasiswa berhasil di tolak')
			);
	  echo json_encode($response);
}

public function get_infojudul(){
	$id = $this->input->post('id',true);
	$this->db->select('ide_skripsi.*,users.nama');
	$this->db->from('ide_skripsi');
	$this->db->join('users', 'ide_skripsi.mahasiswa_id = users.user_id AND ide_skripsi.id = '.$id);
	$query =$this->db->get();
	$judul = $query->row();
	echo json_encode($judul);
}


public function menu_pembimbing($id){
	$data["judul"] = "SIF-OKe";
	$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
	<li class="breadcrumb-item"><a href="">ACC</a></li>
	';

	$this->db->select('ide_skripsi.*,users.nama,users.user_id');
	$this->db->from('ide_skripsi');
	$this->db->join('users', 'ide_skripsi.mahasiswa_id = users.user_id AND users.user_id ='.$id);
	$query = $this->db->get();
	$data['mahasiswa'] = $query->row();

	$data['prodi'] = $this->main->get('prodi');
	$data['role'] = $this->main->get('role');
	// var_dump($data);
	$this->tmp->view('templates/_header','kaprodi/pilih_pembimbing',$data); 
}

public function menu_penguji($id){
	$data["judul"] = "SIF-OKe";
	$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
	<li class="breadcrumb-item"><a href="">ACC</a></li>
	';

	$this->db->select('ide_skripsi.*,users.nama,users.user_id');
	$this->db->from('ide_skripsi');
	$this->db->join('users', 'ide_skripsi.mahasiswa_id = users.user_id AND users.user_id ='.$id);
	$query = $this->db->get();
	$data['mahasiswa'] = $query->row();

	$data['prodi'] = $this->main->get('prodi');
	$data['role'] = $this->main->get('role');
	// var_dump($data);
	$this->tmp->view('templates/_header','kaprodi/pilih_penguji',$data); 
}

public function get_dosen(){
	$id = $this->input->post('prodi_id',true);
	$this->db->select('users.*,role.role');
	$this->db->from('users');
	$this->db->join('role', 'users.prodi_id ='.$id.' AND users.role_id = role.id AND role.role = "PA"
	OR users.prodi_id ='.$id.' AND users.role_id = role.id AND role.role = "kaprodi"
	OR users.prodi_id ='.$id.' AND users.role_id = role.id AND role.role = "dosen"
	');
	$query =  $this->db->get();
	$query = $query->result();
	echo json_encode($query);
}

public function get_dosen_noajax($id){
	$this->db->select('users.*,role.role');
	$this->db->from('users');
	$this->db->join('role', 'users.prodi_id ='.$id.' AND users.role_id = role.id AND role.role = "PA"
	OR users.prodi_id ='.$id.' AND users.role_id = role.id AND role.role = "kaprodi"
	OR users.prodi_id ='.$id.' AND users.role_id = role.id AND role.role = "dosen"
	');
	$query =  $this->db->get();
	$query = $query->result();
	return $query;
}

public function bukti_acc($id){
 $ide_skripsi = $this->main->get_where('ide_skripsi',['mahasiswa_id' =>$id]);
 $data['ide_skripsi'] = $ide_skripsi;
 $this->load->view('pdf',$data);
}     

public function acc($id){
	$input = $this->input->post(null,true);
	$mhs_id = $id;

	//memasukkan catatan
	$catatan = [
		'catatan' => $input['catatan']
	];
	$where = [
		'mahasiswa_id' => $mhs_id
	];
	$this->main->update('ide_skripsi',$catatan,$where);
	$this->main->update('users',['status' => 'bimbingan proposal'],['user_id' => $mhs_id]);

	// memasukkan pembimbing dan penguji
	$this->main->insert('pembimbing',['mahasiswa_id' => $mhs_id,'dosen_id' => $input['p1'],'role_id' => $input['p1_role'],'status' => 'belum']);
	$this->main->insert('pembimbing',['mahasiswa_id' => $mhs_id,'dosen_id' => $input['p2'],'role_id' => $input['p2_role'],'status' => 'belum']);


	// memasukkan ke tabel proposal
	$proposal = [
		'mahasiswa_id' => $mhs_id,
		'judul' => $input['judul'],
		'abstrak' => $input['abstrak'],
		'status_p1' => "belum ACC",
		'status_p2' => "belum ACC",
		'status_pnj1' => "belum ACC",
		'status_pnj2' => "belum ACC"

	];
	$this->main->insert('proposal',$proposal);
	setFlashMsg('success','Judul','telah di ACC');
	redirect('dashboard');
}


public function tentukan_penguji($id){
	$input = $this->input->post(null,true);
	$mhs_id = $id;
	// memasukkan penguji
	$this->main->insert('pembimbing',['mahasiswa_id' => $mhs_id,'dosen_id' => $input['p1'],'role_id' => $input['p1_role'],'status' => 'belum']);
	$this->main->insert('pembimbing',['mahasiswa_id' => $mhs_id,'dosen_id' => $input['p2'],'role_id' => $input['p2_role'],'status' => 'belum']);

	setFlashMsg('success','Penguji','telah di simpan');
	redirect('dashboard');
}

public function print(){
	require_once FCPATH . '/vendor/autoload.php';
	$data['judul'] = "SIF-OKe";
	$data['dosen'] = $this->get_dosen_noajax(userdata()->prodi_id);
	$html = $this->load->view('kaprodi/cetak_laporan',$data,TRUE);
 

	$mpdf = new \Mpdf\Mpdf();
	$mpdf->WriteHTML($html);
	$mpdf->Output('Laporan_dosen.pdf',"D");
}

public function tampilan_print(){

	$this->load->view('kaprodi/cetak_laporan',[]);
}

public function menu_asidedosen(){
	$dosen_id = $this->input->post('dosen_id');
	$data['dosen_id'] = $dosen_id;
	$data['pembimbing1proposal'] = count($this->main->statistik_dosen_proposal($dosen_id,'Pembimbing 1 Proposal'));
	$data['pembimbing2proposal'] = count($this->main->statistik_dosen_proposal($dosen_id,'Pembimbing 2 Proposal'));
	$data['penguji1proposal'] = count($this->main->statistik_dosen_proposal($dosen_id,'Penguji 1 Proposal'));
	$data['penguji2proposal'] = count($this->main->statistik_dosen_proposal($dosen_id,'Penguji 2 Proposal'));
	$data['pembimbing1skripsi'] = count($this->main->statistik_dosen_skripsi($dosen_id,'Pembimbing 1 Skripsi/TA'));
	$data['pembimbing2skripsi'] = count($this->main->statistik_dosen_skripsi($dosen_id,'Pembimbing 2 Skripsi/TA'));
	$data['penguji1skripsi'] = count($this->main->statistik_dosen_skripsi($dosen_id,'Penguji 1 Skripsi/TA'));
	$data['penguji2skripsi'] = count($this->main->statistik_dosen_skripsi($dosen_id,'Penguji 2 Skripsi'));
	echo json_encode($data);
}

public function detail_dosen($dosen_id){
	$data["judul"] = "SIF-OKe";
	$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="'.base_url('dashboard').'"><i class="fas fa-home"></i></a></li>
	<li class="breadcrumb-item"><a href="">Detail Dosen</a></li>
	';
	$this->tmp->view('templates/_header','kaprodi/statistik_dosen',$data); 
}
}
        
    /* End of file  kaprodi.php */
        
                            