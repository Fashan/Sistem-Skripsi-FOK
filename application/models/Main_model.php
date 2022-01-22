<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {

	  public function get($table, $desc_column = null)
    {
        if ($desc_column != null) {
            $this->db->order_by($desc_column, 'desc');
        }
        return $this->db->get($table)->result();
    }

    public function get_where($table, $where, $object = false)
    {
        $query = $this->db->get_where($table, $where);

        if ($query->num_rows() <= 1 && $object == false) {
            return $query->row();
        } else {
            return $query->result();
        }
    }
	

    public function insert($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function insert_batch($table, $data)
    {
        return $this->db->insert_batch($table, $data);
    }

    public function update($table, $data, $where)
    {
        return $this->db->update($table, $data, $where);
    }

    public function delete($table, $where)
    {
        return $this->db->delete($table, $where);
    }

	public function get_user($email)
    {
		$this->db->select('users.*, role.role');
        $this->db->from('users');
        $this->db->join('role', 'role.id = users.role_id AND users.email ='.$email);
		$query = $this->db->get();
        return $query->row();
    }

	public function get_pembimbing_byrole($role){
		$role2 ="-";
		if ($role == 'Pembimbing 1 Proposal') {
			$role2 = "Pembimbing 1 Skripsi/TA";
		}
		if ($role == 'Pembimbing 2 Proposal') {
			$role2 = "Pembimbing 2 Skripsi/TA";
		}
		if ($role == 'Penguji 1 Proposal') {
			$role2 = "Penguji 1 Skripsi/TA";
		}
		if ($role == 'Penguji 2 Proposal') {
			$role2 = "Penguji 2 Skripsi/TA";
		}

	$id = userdata()->user_id;
	$this->db->select('users.*,role.role');
	$this->db->from('pembimbing');
	$this->db->join('users','pembimbing.dosen_id = users.user_id AND mahasiswa_id='.$id);
	$this->db->join('role','pembimbing.role_id = role.id');
	$this->db->like('role.role',''.$role.'');
	$this->db->or_like('role.role',''.$role2.'');
	$query = $this->db->get();
	// return $role2;
	return $query->row();

	}

	public function get_pembimbing_byidandrole($id,$role){
		$role2 ="-";
		if ($role == 'Pembimbing 1 Proposal') {
			$role2 = "Pembimbing 1 Skripsi/TA";
		}
		if ($role == 'Pembimbing 2 Proposal') {
			$role2 = "Pembimbing 2 Skripsi/TA";
		}
		if ($role == 'Penguji 1 Proposal') {
			$role2 = "Penguji 1 Skripsi/TA";
		}
		if ($role == 'Penguji 2 Proposal') {
			$role2 = "Penguji 2 Skripsi/TA";
		}

	$this->db->select('users.*,role.role');
	$this->db->from('pembimbing');
	$this->db->join('users','pembimbing.dosen_id = users.user_id AND mahasiswa_id='.$id);
	$this->db->join('role','pembimbing.role_id = role.id');
	$this->db->like('role.role',''.$role.'');
	$this->db->or_like('role.role',''.$role2.'');
	$query = $this->db->get();
	// return $role2;
	return $query->row();

	}
	

	public function get_mahasiswa($mahasiswa_id){
		$this->db->select('users.*,users.username as nim, ide_skripsi.judul,ide_skripsi.abstrak');
		$this->db->from('ide_skripsi');
		$this->db->join('users', 'users.user_id = ide_skripsi.mahasiswa_id AND ide_skripsi.mahasiswa_id ='.$mahasiswa_id);
		$query = $this->db->get();
		return $query->row();	
	}

	public function get_pembimbingprop_bymahasiswa($mahasiswa_id){
	$this->db->select('users.*,role.role');
	$this->db->from('pembimbing');
	$this->db->join('users','pembimbing.dosen_id = users.user_id AND mahasiswa_id='.$mahasiswa_id);
	$this->db->join('role','pembimbing.role_id = role.id');
	$this->db->like('role.role','Pembimbing 1 proposal');
	$this->db->or_like('role.role','Pembimbing 2 Proposal');
	$query = $this->db->get();
	return $query->result();
	}

	public function get_pembimbingskrip_bymahasiswa($mahasiswa_id){
		$this->db->select('users.*,role.role');
		$this->db->from('pembimbing');
		$this->db->join('users','pembimbing.dosen_id = users.user_id AND mahasiswa_id='.$mahasiswa_id);
		$this->db->join('role','pembimbing.role_id = role.id');
		$this->db->like('role.role','Pembimbing 1 Skripsi/TA');
		$this->db->or_like('role.role','Pembimbing 2 Skripsi/TA');
		$query = $this->db->get();
		return $query->result();
		}

	public function get_pengujiprop_bymahasiswa($mahasiswa_id){
		$this->db->select('users.*,role.role');
		$this->db->from('pembimbing');
		$this->db->join('users','pembimbing.dosen_id = users.user_id AND mahasiswa_id='.$mahasiswa_id);
		$this->db->join('role','pembimbing.role_id = role.id');
		$this->db->like('role.role','Penguji 1 proposal');
		$this->db->or_like('role.role','Penguji 2 Proposal');
		$query = $this->db->get();
		return $query->result();
		}

		public function get_pengujiskrip_bymahasiswa($mahasiswa_id){
			$this->db->select('users.*,role.role');
			$this->db->from('pembimbing');
			$this->db->join('users','pembimbing.dosen_id = users.user_id AND mahasiswa_id='.$mahasiswa_id);
			$this->db->join('role','pembimbing.role_id = role.id');
			$this->db->like('role.role','Penguji 1 Skripsi/TA');
			$this->db->or_like('role.role','Penguji 2 Skripsi/TA');
			$query = $this->db->get();
			return $query->result();
			}

	public function check_moderator($nim){
		$this->db->select('moderator.*');
		$this->db->where('moderator.nim ='.$nim);
		$this->db->from('moderator');
		$query = $this->db->get();
		return $query->num_rows();
	}

	// data mahasiswa yang pernah di uji atau di bimbing proposal
	public function get_mahasiswa_prop($dosen_id,$role){
		$role2 ="-";
		if ($role == 'Pembimbing 1 Proposal') {
			$role2 = "Pembimbing 1 Skripsi/TA";
		}
		if ($role == 'Pembimbing 2 Proposal') {
			$role2 = "Pembimbing 2 Skripsi/TA";
		}
		if ($role == 'Penguji 1 Proposal') {
			$role2 = "Penguji 1 Skripsi/TA";
		}
		if ($role == 'Penguji 2 Proposal') {
			$role2 = "Penguji 2 Skripsi/TA";
		}

	$id = userdata()->user_id;
	$this->db->select('users.*,role.role,proposal.judul');
	$this->db->from('pembimbing');
	$this->db->join('users','pembimbing.mahasiswa_id = users.user_id AND dosen_id='.$dosen_id);
	$this->db->join('role','pembimbing.role_id = role.id');
	$this->db->join('proposal','proposal.mahasiswa_id = users.user_id');
	$this->db->like('role.role',''.$role.'');
	$this->db->or_like('role.role',''.$role2.'');
	$query = $this->db->get();
	return $query->result();

	}

	public function get_mahasiswa_skripsi($dosen_id,$role){
	$id = userdata()->user_id;
	$this->db->select('users.*,role.role,skripsi.judul');
	$this->db->from('pembimbing');
	$this->db->join('users','pembimbing.mahasiswa_id = users.user_id AND dosen_id='.$dosen_id);
	$this->db->join('role','pembimbing.role_id = role.id');
	$this->db->join('skripsi','skripsi.mahasiswa_id = users.user_id');
	$this->db->like('role.role',''.$role.'');
	$query = $this->db->get();
	return $query->result();

	}


// untuk data statistik dosen
	public function statistik_dosen_proposal($dosen_id,$role){
	$this->db->select('users.*,role.role,proposal.judul');
	$this->db->from('pembimbing');
	$this->db->join('users','pembimbing.mahasiswa_id = users.user_id AND pembimbing.status = "belum" AND dosen_id='.$dosen_id);
	$this->db->join('role','pembimbing.role_id = role.id');
	$this->db->join('proposal','proposal.mahasiswa_id = users.user_id');
	$this->db->like('role.role',''.$role.'');
	$query = $this->db->get();
	return $query->result();

	}

	public function statistik_dosen_skripsi($dosen_id,$role){
	$id = userdata()->user_id;
	$this->db->select('users.*,role.role,skripsi.judul');
	$this->db->from('pembimbing');
	$this->db->join('users','pembimbing.mahasiswa_id = users.user_id AND pembimbing.status = "belum" AND dosen_id='.$dosen_id);
	$this->db->join('role','pembimbing.role_id = role.id');
	$this->db->join('skripsi','skripsi.mahasiswa_id = users.user_id');
	$this->db->like('role.role',''.$role.'');
	$query = $this->db->get();
	return $query->result();

	}
}

/* End of file Main_model.php */
/* Location: ./application/models/Main_model.php */
