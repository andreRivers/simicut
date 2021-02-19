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
		} elseIf  ($tes == '1') {
			$hasil = $this->db->query("SELECT * FROM permohonan 
			LEFT JOIN user ON user.email = permohonan.email 
			LEFT JOIN user_detail ON user_detail.email=permohonan.email where permohonan.sts=1");
		return $hasil->result_array();
	   } elseIf  ($tes == '3') {
		$hasil = $this->db->query("SELECT * FROM permohonan 
		LEFT JOIN user ON user.email = permohonan.email 
		LEFT JOIN user_detail ON user_detail.email=permohonan.email where permohonan.sts=2");
	return $hasil->result_array();
	   }
	}

	function cutiku()
    {
	
		$email=$this->session->userdata('email');
		$hasil = $this->db->query("SELECT * FROM permohonan 
		LEFT JOIN user ON user.email = permohonan.email 
		LEFT JOIN user_detail ON user_detail.email=permohonan.email where permohonan.email='$email' ");
		return $hasil->result_array();
	   
	}

	function listCutiAll()
    {
	
	
		$hasil = $this->db->query("SELECT * FROM permohonan 
		LEFT JOIN user ON user.email = permohonan.email 
		LEFT JOIN user_detail ON user_detail.email=permohonan.email ");
		return $hasil->result_array();
	   
	}


	
    function cutiHariIni()
    {
		$date = date("Y-m-d");
		$hasil = $this->db->query("SELECT * FROM permohonan 
		LEFT JOIN user ON user.email = permohonan.email 
		LEFT JOIN user_detail ON user_detail.email=permohonan.email where permohonan.sts=3 AND permohonan.tglCuti='$date'");
		return $hasil->result_array();
	   
	}
	
	
    function listCutiCetak($id_cuti)
    {

			$hasil = $this->db->query("SELECT * FROM permohonan 
			LEFT JOIN user ON user.email = permohonan.email 
			LEFT JOIN user_detail ON user_detail.email=permohonan.email where permohonan.id_cuti='$id_cuti'");
			return $hasil->row_array();
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
	
	function tolakCutiUmum($email, $cutiDiambil)
    {

		$hasil = $this->db->query("UPDATE user_detail SET cutiUmum=(cutiUmum+'$cutiDiambil') WHERE email='$email'");
	
	}
	
	function tolakCutiUmroh($email, $cutiDiambil)
    {

		$hasil = $this->db->query("UPDATE user_detail SET cutiUmroh=(cutiUmroh+'$cutiDiambil') WHERE email='$email'");
	
	}
	
	function tolakCutiHamil($email, $cutiDiambil)
    {

		$hasil = $this->db->query("UPDATE user_detail SET cutiHamil=(cutiHamil+'$cutiDiambil') WHERE email='$email'");
	
    }
   

	function laporanCutiCetak($dateAwal, $dateSelesai, $jenisCuti)
    {

		$hasil = $this->db->query("SELECT * FROM permohonan 
		LEFT JOIN user ON user.email = permohonan.email 
		LEFT JOIN user_detail ON user_detail.email=permohonan.email where permohonan.sts=3 AND permohonan.jenisCuti='$jenisCuti' AND permohonan.tglCuti BETWEEN '$dateAwal' AND '$dateSelesai' ");
		return $hasil->result_array();
	
    }


	function listCutiMasuk()
    {

			$hasil = $this->db->query("SELECT * FROM permohonan 
			LEFT JOIN user ON user.email = permohonan.email 
			LEFT JOIN user_detail ON user_detail.email=permohonan.email where permohonan.sts=1");
			return $hasil->result_array();

	}

	function listCutiProses()
    {

			$hasil = $this->db->query("SELECT * FROM permohonan 
			LEFT JOIN user ON user.email = permohonan.email 
			LEFT JOIN user_detail ON user_detail.email=permohonan.email where permohonan.sts=2");
			return $hasil->result_array();

	}

	function listCutiDisetujui()
    {

			$hasil = $this->db->query("SELECT * FROM permohonan 
			LEFT JOIN user ON user.email = permohonan.email 
			LEFT JOIN user_detail ON user_detail.email=permohonan.email where permohonan.sts=3");
			return $hasil->result_array();

	}

	function listCutiDitolak()
    {

			$hasil = $this->db->query("SELECT * FROM permohonan 
			LEFT JOIN user ON user.email = permohonan.email 
			LEFT JOIN user_detail ON user_detail.email=permohonan.email where permohonan.sts=4");
			return $hasil->result_array();

	}
}
