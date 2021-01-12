<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Permohonan_Model extends CI_Model
{

    function listCuti()
    {
		$login = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$tes = $login['role_id'];
		$tesi = $login['email'];
		if ($tes == '2') {
			$hasil = $this->db->query("SELECT * FROM permohonan 
			LEFT JOIN user ON user.email = permohonan.email 
			LEFT JOIN user_detail ON user_detail.email=permohonan.email where permohonan.email='$tesi'");
			return $hasil->result_array();
		} else {
			$hasil = $this->db->query("SELECT * FROM permohonan 
			LEFT JOIN user ON permohonan.email = user.email
			LEFT JOIN user_detail ON permohonan.email=user_detail.email");
			return $hasil;
		}
    }

	function batalCuti($id_cuti)
    {

	$hasil = $this->db->query("SELECT * FROM permohonan 
			LEFT JOIN user ON user.email = permohonan.email 
			LEFT JOIN user_detail ON user_detail.email=permohonan.email where permohonan.id_cuti='$id_cuti'");
			return $hasil->row_array();
	
	}
	
	
	function ubahCuti($id_cuti)
    {

	$hasil = $this->db->query("SELECT * FROM permohonan 
			LEFT JOIN user ON user.email = permohonan.email 
			LEFT JOIN user_detail ON user_detail.email=permohonan.email where permohonan.id_cuti='$id_cuti'");
			return $hasil->row_array();
	
    }
   
}
