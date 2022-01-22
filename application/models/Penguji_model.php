<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Penguji_model extends CI_Model {
                        
                       
                   
// start datatables
var $column_order = array(null,'users.nama','proposal.judul','role.role'); //set column field database for datatable orderable
var $column_search = array('users.nama','proposal.judul','role.role'); //set column field database for datatable searchable
var $order = array('id' => 'asc'); // default order 

private function _get_datatables_query() {
	$id = userdata()->user_id;
	$this->db->select('pembimbing.*,users.nama,proposal.judul,role.role');
	$this->db->from('pembimbing');
	$this->db->join('role', 'pembimbing.role_id = role.id AND pembimbing.status = "belum" AND pembimbing.dosen_id='.$id);
	$this->db->like('role.role','Penguji 1');
	$this->db->or_like('role.role','Penguji 2');
	$this->db->join('users', 'pembimbing.mahasiswa_id = users.user_id');
	$this->db->join('proposal', 'pembimbing.mahasiswa_id = proposal.mahasiswa_id');
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
function get_datatables() {
	$this->_get_datatables_query();
	if(@$_POST['length'] != -1)
	$this->db->limit(@$_POST['length'], @$_POST['start']);
	$query = $this->db->get();
	return $query->result();
}
function count_filtered() {
	$this->_get_datatables_query();
	$query = $this->db->get();
	return $query->num_rows();
}
function count_all() {
	$this->db->from('pembimbing');
	return $this->db->count_all_results();
}
// end datatables
							 
  
                        
                            
                        
}
                        
/* End of file penguji.php */
    
                        