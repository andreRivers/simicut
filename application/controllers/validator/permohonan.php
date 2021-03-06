<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permohonan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		is_logged_in();
		$this->load->model('Permohonan_Model');
    } 
	
	public function tolak($id_cuti)
    {
        $data['title'] = 'Penolakan Permohononan Form Cuti';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['detail'] = $this->db->get_where('user_detail', ['email' => $this->session->userdata('email')])->row_array();
		$data['batal'] = $this->Permohonan_Model->batalCuti($id_cuti);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan/tolak', $data);
        $this->load->view('templates/footer');
	}

	public function tolakGo()
    {
        $data['title'] = 'Batal  Permohononan Form Cuti';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
	
			$jenisCuti = $this->input->post('jenisCuti');	

			if ($jenisCuti == "Cuti Umum") {
			$id_cuti = $this->input->post('id_cuti');
			$email = $this->input->post('email');
			$cutiDiambil = $this->input->post('cutiDiambil');
			$pesan = $this->input->post('pesan');
			$date = date("Y-m-d H:i:s");
			$sts = 4;
		
			$this->Permohonan_Model->tolakCutiUmum($email, $cutiDiambil);

			$this->db->set('sts', $sts);
			$this->db->set('pesan', $pesan);
			$this->db->set('tglTolak', $date);
			$this->db->where('id_cuti', $id_cuti);
			$this->db->update('permohonan');
			
		} elseif ($jenisCuti == "Cuti Umroh") {
			$id_cuti = $this->input->post('id_cuti');
			$email = $this->input->post('email');
			$cutiDiambil = $this->input->post('cutiDiambil');
			$pesan = $this->input->post('pesan');
			$date = date("Y-m-d H:i:s");
			$sts = 4;
		
			$this->Permohonan_Model->tolakCutiUmroh($email, $cutiDiambil);

			$this->db->set('sts', $sts);
			$this->db->set('pesan', $pesan);
			$this->db->set('tglTolak', $date);
			$this->db->where('id_cuti', $id_cuti);
			$this->db->update('permohonan');
			
		} elseif ($jenisCuti == "Cuti Hamil") {
			$id_cuti = $this->input->post('id_cuti');
			$email = $this->input->post('email');
			$cutiDiambil = $this->input->post('cutiDiambil');
			$pesan = $this->input->post('pesan');
			$date = date("Y-m-d H:i:s");
			$sts = 4;
		
			$this->Permohonan_Model->tolakCutiHamil($email, $cutiDiambil);

			$this->db->set('sts', $sts);
			$this->db->set('pesan', $pesan);
			$this->db->set('tglTolak', $date);
			$this->db->where('id_cuti', $id_cuti);
			$this->db->update('permohonan');
			
		} 

		

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permohonan Berhasil Ditolak</div>');
            redirect('permohonan/listCuti');
		}


		public function proses($id_cuti)
		{
			$data['title'] = 'Penolakan Permohononan Form Cuti';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['detail'] = $this->db->get_where('user_detail', ['email' => $this->session->userdata('email')])->row_array();

			$date = date("Y-m-d H:i:s");
			$sts = 2;
			$this->db->set('sts', $sts);
			$this->db->set('tglProses', $date);
			$this->db->where('id_cuti', $id_cuti);
			$this->db->update('permohonan');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permohonan Berhasil Ditolak</div>');
            redirect('permohonan/listCuti');
		}

		public function viewMasuk()
		{
			$data['title'] = 'List Permohonan Cuti';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['permohonan'] = $this->Permohonan_Model->listCutiMasuk();
	
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('permohonan/viewMasuk', $data);
			$this->load->view('templates/footer');
		}

		public function viewProses()
		{
			$data['title'] = 'List Permohonan Cuti Diproses';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['permohonan'] = $this->Permohonan_Model->listCutiProses();
	
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('permohonan/viewProses', $data);
			$this->load->view('templates/footer');
		}

		public function viewDisetujui()
		{
			$data['title'] = 'List Permohonan Cuti Diproses';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['permohonan'] = $this->Permohonan_Model->listCutiDisetujui();
	
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('permohonan/viewDisetujui', $data);
			$this->load->view('templates/footer');
		}

		
		public function viewDitolak()
		{
			$data['title'] = 'List Permohonan Cuti Ditolak';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['permohonan'] = $this->Permohonan_Model->listCutiDitolak();
	
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('permohonan/viewDitolak', $data);
			$this->load->view('templates/footer');
		}


	
}
   