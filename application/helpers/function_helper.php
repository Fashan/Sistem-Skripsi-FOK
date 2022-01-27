<?php

function get_category($id = null)
{
    $ci = get_instance();

    if ($id == null) {
        return $ci->main->get('category');
    } else {
        $query = $ci->main->get_where('category', ['category_id' => $id]);
        return $query->category_name;
    }
}


function setMsg($type, $strong, $msg)
{
    $ci = get_instance();

    // Alert
    $text = "";
    $text .= "<div class='alert alert-{$type} alert-dismissible show animate__animated animate__slideInDown' role='alert'>";
    $text .= "<strong>{$strong}</strong> ".$msg;
    $text .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>';
    $text .= "</div>";
    return $text;
}

function setFlashMsg($type, $strong, $msg)
{
    $ci = get_instance();

    // Alert
    $text = "";
    $text .= "<div class='alert alert-{$type} alert-dismissible show animate__animated animate__slideInDown' role='alert'>";
    $text .= "<strong>{$strong}</strong> ".$msg;
    $text .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>';
    $text .= "</div>";
    return $ci->session->set_flashdata('msg', $text);
}

function userdata()
{
    $ci = get_instance();

    $user_id = $ci->session->userdata("user_session");
    $user = $ci->main->get_where("users", ["user_id" => $user_id]);
	if ($user) {
		$userdata = $ci->main->get_user('"'.$user->email.'"');
		return $userdata;
	}

   
}
 
function active_menu($page)
{
    $ci = get_instance();
    $uri = $ci->uri->segment(1);

    return $uri == $page ? "active" : "";
}

function check($data1, $data2, $result = "active")
{
    return $data1 == $data2 ? $result : "";
}

function user_initial($name)
{
    return substr($name, 0, 1);
}

function custom_date($format, $date)
{
    return date($format, strtotime($date));
}

function check_session()
{
    if (!userdata()) {
        setFlashMsg('danger', 'Access Denied! ', 'harap login untuk masuk ke dashboard');
        redirect('auth');
    }
}

function check_role($role = [])
{
    check_session();

    if (!in_array(userdata()->role, $role)) {
        redirect('dashboard');
    }
}

function get_proposal(){
	$ci = get_instance();
	$user_id = $ci->session->userdata("user_session");
	$proposal = $ci->main->get_where('proposal', ['mahasiswa_id' => $user_id]);
	return $proposal;
	
}

function get_skripsi(){
	$ci = get_instance();
	$user_id = $ci->session->userdata("user_session");
	$skripsi = $ci->main->get_where('skripsi', ['mahasiswa_id' => $user_id]);
	return $skripsi;
	
}


// sudut pandang mahasiswa
function check_pembimbing_p(){
	$ci = get_instance();
	$check = $ci->main->get_pembimbingprop_bymahasiswa(userdata()->user_id);
	if ($check) {
		return true;
	}else {
		return false;
	}
}

function check_seminar(){
	$ci = get_instance();
	$check = $ci->main->get_where('events',['mahasiswa_id' => userdata()->user_id,'keterangan'=>'seminar proposal','status' => 'selesai']);
	if ($check) {
		return true;
	}else {
		return false;
	}
}

function check_sidang(){
	$ci = get_instance();
	$check = $ci->main->get_where('events',['mahasiswa_id' => userdata()->user_id,'keterangan'=>'sidang skripsi','status'=> 'selesai']);
	if ($check) {
		return true;
	}else {
		return false;
	}
}

// sudut pandang mahasiswa
function check_pembimbing_s(){
	$ci = get_instance();
	$check = $ci->main->get_pembimbingskrip_bymahasiswa(userdata()->user_id);
	if ($check) {
		return true;
	}else {
		return false;
	}
}


// sudut pandang mahasiswa
function check_acc_proposal(){
	$ci = get_instance();
	$user_id = $ci->session->userdata("user_session");
	$proposal = $ci->main->get_where('proposal', ['mahasiswa_id' => $user_id]);
	if ($proposal) {
		if ($proposal->status_p1 == "ACC" && $proposal->status_p2 == "ACC") {
			return true;
		}else {
			return false;
		}
	}else {
		return false;
	} 
}




// sudut pandang mahasiswa
function check_acc_skripsi(){
	$ci = get_instance();
	$user_id = $ci->session->userdata("user_session");
	$skripsi = $ci->main->get_where('skripsi', ['mahasiswa_id' => $user_id]);
	if ($skripsi) {
		if ($skripsi->status_pem1 == "ACC" && $skripsi->status_pem2 == "ACC") {
			return true;
		}else {
			return false;
		}
	}else {
		return false;
	} 
}


// check role by id
function check_role_by_id($id){
	$ci = get_instance();
	$role = $ci->main->get_where('role',['id' => $id]);
	return $role;
}

function check_status_mahasiswa($id){
	$ci = get_instance();
	$mahasiswa = $ci->main->get_where('users',['user_id' => $id]);
	if ($mahasiswa) {
		if ($mahasiswa->status) {
			return true;
		}else {
			return false;
		}
	}else {
		return "tidak ada data";
	}
}

function check_nilai_proposal($id){
	$ci = get_instance();
	$absen = $ci->main->get_where('absen',['mahasiswa_id' => $id,'jenis_kegiatan' => 'seminar proposal']);
	$nilai = $ci->main->get_where('nilai_proposal',['mahasiswa_id' => $id]);
	if ($nilai) {
		if ($absen->pembimbing_1 != 'hadir') {
			if ($nilai->pembimbing_2 != '' && $nilai->penguji_1 != '' && $nilai->penguji_2 != '') {
				return true;
			}else {
				return false;
			}
		}

		if ($absen->pembimbing_2 != 'hadir') {
			if ($nilai->pembimbing_1 != '' && $nilai->penguji_1 != '' && $nilai->penguji_2 != '') {
				return true;
			}else {
				return false;
			}
		}

		if ($absen->penguji_1 != 'hadir') {
			if ($nilai->pembimbing_1 != '' && $nilai->pembimbing_2 != '' && $nilai->penguji_2 != '') {
				return true;
			}else {
				return false;
			}
		}

		if ($absen->penguji_2 != 'hadir') {
			if ($nilai->pembimbing_1 != '' && $nilai->pembimbing_2 != '' && $nilai->penguji_1 != '') {
				return true;
			}else {
				return false;
			}
		}

		if ($absen->pembimbing_1 == 'hadir' && $absen->pembimbing_2 == 'hadir' && $absen->penguji_1 == 'hadir' && $absen->penguji_2 == 'hadir') {
			if ($nilai->pembimbing_1 != '' && $nilai->pembimbing_2 != '' && $nilai->penguji_1 != '' && $nilai->penguji_2 != '') {
				return true;
			}else {
				return false;
			}
		}
	}else {
		return false;
	}
}

function check_nilai_skripsi($id){
	$ci = get_instance();
	$absen = $ci->main->get_where('absen',['mahasiswa_id' => $id,'jenis_kegiatan' => 'sidang skripsi']);
	$nilai = $ci->main->get_where('nilai_skripsi',['mahasiswa_id' => $id]);
	if ($nilai) {
		if ($absen->pembimbing_1 != 'hadir') {
			if ($nilai->pembimbing_2 != '' && $nilai->penguji_1 != '' && $nilai->penguji_2 != '') {
				return true;
			}else {
				return false;
			}
		}

		if ($absen->pembimbing_2 != 'hadir') {
			if ($nilai->pembimbing_1 != '' && $nilai->penguji_1 != '' && $nilai->penguji_2 != '') {
				return true;
			}else {
				return false;
			}
		}

		if ($absen->penguji_1 != 'hadir') {
			if ($nilai->pembimbing_1 != '' && $nilai->pembimbing_2 != '' && $nilai->penguji_2 != '') {
				return true;
			}else {
				return false;
			}
		}

		if ($absen->penguji_2 != 'hadir') {
			if ($nilai->pembimbing_1 != '' && $nilai->pembimbing_2 != '' && $nilai->penguji_1 != '') {
				return true;
			}else {
				return false;
			}
		}

		
		if ($absen->pembimbing_1 == 'hadir' && $absen->pembimbing_2 == 'hadir' && $absen->penguji_1 == 'hadir' && $absen->penguji_2 == 'hadir') {
			if ($nilai->pembimbing_1 != '' && $nilai->pembimbing_2 != '' && $nilai->penguji_1 != '' && $nilai->penguji_2 != '') {
				return true;
			}else {
				return false;
			}
		}
	}else {
		return false;
	}
}


function get_yudisium(){
	$ci = get_instance();
	$bulan = '"'.date("Y-m-d").'"';
	$ci->db->select('events.*');
	$ci->db->from('events');
	$ci->db->where('MONTH(tanggal) = MONTH('.$bulan.') AND keterangan = "yudisium"');
	$query = $ci->db->get();
	return $query->num_rows();
}

function get_bimbingan(){
	$ci = get_instance();
	$id = userdata()->user_id;
	$ci->db->select('pembimbing.*');
	$ci->db->from('pembimbing');
	$ci->db->join('role','dosen_id ='.$id.' AND pembimbing.role_id = role.id');
	$ci->db->group_by('mahasiswa_id');
	$ci->db->like('role.role','pembimbing');
	$query = $ci->db->get();
	return $query->num_rows();
}

function get_uji(){
	$ci = get_instance();
	$id = userdata()->user_id;
	$ci->db->select('pembimbing.*');
	$ci->db->from('pembimbing');
	$ci->db->join('role','dosen_id ='.$id.' AND pembimbing.role_id = role.id');
	$ci->db->like('role.role','penguji');
	$ci->db->group_by('mahasiswa_id');
	$query = $ci->db->get();
	return $query->num_rows();
}

function get_totalskripsi(){
	$ci = get_instance();
	$id = userdata()->user_id;
	$ci->db->select('users.*,ide_skripsi.judul');
	$ci->db->from('users');
	$ci->db->join('ide_skripsi','users.user_id = ide_skripsi.mahasiswa_id');
	$ci->db->not_like('users.status','belum mengajukan judul');
	$ci->db->not_like('users.status','mengajukan judul');
	$query = $ci->db->get();
	return $query->num_rows();
}
