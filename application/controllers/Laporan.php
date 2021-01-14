<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		is_logged_in();
		$this->load->model('Permohonan_Model');
    }

    public function cuti()
    {
        $data['title'] = 'Laporan Izin Cuti';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('cetak/cuti', $data);
        $this->load->view('templates/footer');
	}

	public function keluar()
    {
        $data['title'] = 'Laporan Izin Cuti';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('cetak/keluar', $data);
        $this->load->view('templates/footer');
	}
	
	public function cutiGo()
	{
		$dateAwal = $this->input->post('dateAwal');	
		$dateSelesai = $this->input->post('dateSelesai');	
		$jenisCuti = $this->input->post('jenisCuti');	
	
				$data['cetak'] = $this->Permohonan_Model->laporanCutiCetak($dateAwal, $dateSelesai, $jenisCuti);
				$data['tgl1'] = $dateAwal;
				$data['tgl2'] = $dateSelesai;
				$data['jns'] = $jenisCuti;


				$this->load->view('cetak/pCuti',$data);
		
			}

	
}
   