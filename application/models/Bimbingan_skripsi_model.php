<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Bimbingan_skripsi_model extends CI_Model {
                        
                       
                   
// start datatables
var $column_order = array(null,'tanggal','bimbingan','status','oleh'); //set column field database for datatable orderable
var $column_search = array('tanggal','bimbingan','status','oleh'); //set column field database for datatable searchable
var $order = array('id' => 'asc'); // default order 

private function _get_datatables_query($id,$dosen_id) {
	$this->db->select('bimbingan_skripsi.*,role.role as oleh,users.username as nim');
	$this->db->from('bimbingan_skripsi');
	$this->db->join('role', 'bimbingan_skripsi.role_id = role.id AND bimbingan_skripsi.mahasiswa_id = '.$id.' AND bimbingan_skripsi.dosen_id='.$dosen_id);
	$this->db->join('users', 'bimbingan_skripsi.mahasiswa_id = users.user_id');
	$i = 0;
	foreach ($this->column_search as $data) { // loop column 
		if(@$_POST['search']['value']) { // if datatable send POST for search
			if($i===0) { // first loop
				$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
				$this->db->like($data, $_POST['search']['value']);
			} else {
				$this->db->or_like($data, $_POST['search']['value']);
			}
			if(count($this->column_search) - 1 == $i) //last loop
				$this->db->group_end(); //close bracket
		}
		$i++;
	}
	 
	if(isset($_POST['order'])) { // here order processing
		$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	}
}
function get_datatables($id,$dosen_id) {
	$this->_get_datatables_query($id,$dosen_id);
	if(@$_POST['length'] != -1)
	$this->db->limit(@$_POST['length'], @$_POST['start']);
	$query = $this->db->get();
	return $query->result();
}
function count_filtered($id,$dosen_id) {
	$this->_get_datatables_query($id,$dosen_id);
	$query = $this->db->get();
	return $query->num_rows();
}
function count_all() {
	$this->db->from('bimbingan_skripsi');
	return $this->db->count_all_results();
}
// end datatables
							 
  
                        
                            
                        
}
                        
/* End of file bimbingan_skripsi.php */
    
                        