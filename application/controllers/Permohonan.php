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

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan/index', $data);
        $this->load->view('templates/footer');
	}
	
	public function cutiUmum()
    {
        $data['title'] = 'Form Cuti Umum';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['detail'] = $this->db->get_where('user_detail', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('cutiDiambil', 'Lamanya Cuti', 'required|trim');
		$this->form_validation->set_rules('tglCuti', 'Tanggal Mulai Cuti', 'required|trim');
		$this->form_validation->set_rules('tglSelesaiCuti', 'Tanggal Selesai Cuti', 'required|trim');
		$this->form_validation->set_rules('tglMasuk', 'Tanggal Masuk', 'required|trim');
		$this->form_validation->set_rules('alasan', 'Alasan', 'required|trim');

		if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan/fcutiUmum', $data);
		$this->load->view('templates/footer');
		} else {
			$sisaCuti = $this->input->post('sisaCuti');
			if ($sisaCuti < 0){
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf Cuti Anda Tidak Cukup</div>');
				redirect('permohonan/cutiUmum');
			} else {
			$email = $this->input->post('email');
			$date = date("Y-m-d H:i:s");
			
            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['scan']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
				$config['upload_path'] = './assets/scan/';
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('scan')) {
                    $old_image = $data['permohonan']['scan'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/scan/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }


			$data = [
                'email' => $email,
                'jenisCuti' => "Cuti Umum",
                'cutiDiambil' => $this->input->post('cutiDiambil'),
                'alasan' => $this->input->post('alasan'),
				'sts' =>1,
				'tglCuti' => $this->input->post('tglCuti'),
				'tglSelesaiCuti' => $this->input->post('tglSelesaiCuti'),
				'tglMasuk' => $this->input->post('tglMasuk'),
				'tglPengajuan' => $date,
				'created_at' => $date,
				'scan' => $new_image
				
			];
		
			
			$this->db->insert('permohonan', $data);
			
			$this->db->set('cutiUmum', $sisaCuti);
			$this->db->where('email', $email);
			$this->db->update('user_detail');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permohonan Berhasil Dikirim</div>');
            redirect('permohonan/listCuti');
		}
		}
	}
	
	public function listCuti()
    {
        $data['title'] = 'List Cuti';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['permohonan'] = $this->Permohonan_Model->listCuti();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan/list', $data);
        $this->load->view('templates/footer');
	}

	public function viewAll()
    {
        $data['title'] = 'List Cuti';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['permohonan'] = $this->Permohonan_Model->listCutiAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan/list', $data);
        $this->load->view('templates/footer');
	}


	public function ubahCuti($id_cuti)
    {
        $data['title'] = 'Ubah Permohononan Form Cuti';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['ubahCuti'] = $this->Permohonan_Model->ubahCuti($id_cuti);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan/ubahCuti', $data);
        $this->load->view('templates/footer');
	}

	
	public function ubahCutiGo()
    {
        $data['title'] = 'Ubah Permohononan Form Cuti';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id_cuti = $this->input->post('id_cuti');
		$email = $this->input->post('email');
		$tglCuti = $this->input->post('tglCuti');
		$tglSelesaiCuti = $this->input->post('tglSelesaiCuti');
		$tglMasuk = $this->input->post('tglMasuk');
		$alasan = $this->input->post('alasan');
		$date = date("Y-m-d H:i:s");
			
            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['scan']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
				$config['upload_path'] = './assets/scan/';
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('scan')) {
                    $old_image = $data['permohonan']['scan'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/scan/' . $old_image);
                    }
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

			$this->db->set('tglCuti', $tglCuti);
			$this->db->set('tglSelesaiCuti', $tglSelesaiCuti);
			$this->db->set('tglMasuk', $tglMasuk);
			$this->db->set('alasan', $alasan);
			$this->db->where('id_cuti', $id_cuti);
			$this->db->update('permohonan');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permohonan Berhasil Dikirim</div>');
            redirect('permohonan/listCuti');

	}



	public function batal($id_cuti)
    {
        $data['title'] = 'Batal  Permohononan Form Cuti';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['detail'] = $this->db->get_where('user_detail', ['email' => $this->session->userdata('email')])->row_array();
		$data['batal'] = $this->Permohonan_Model->batalCuti($id_cuti);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan/batal', $data);
        $this->load->view('templates/footer');
	}

	public function batalGo($id_cuti)
    {
        $data['title'] = 'Batal  Permohononan Form Cuti';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['batal'] = $this->Permohonan_Model->batalCuti($id_cuti);
	
			$stok = $this->input->post('stok');

			if ($stok == "Cuti Umum"); {
			$jenisCuti = $this->input->post('jenisCuti');	
			$email = $this->input->post('email');
			$id_cuti = $this->input->post('id_cuti');
			$cutiDiambil = $this->input->post('cutiDiambil');
			$hasil = $cutiDiambil + $stok ;
			$date = date("Y-m-d H:i:s");
			$sts = 5;
			

			$data = [
                'id_cuti' => $id_cuti,
                'alasan' => $this->input->post('alasan'),
				'created_at' => $date

				
			];

			$this->db->insert('permohonan_batal', $data);
			
			$this->db->set('cutiUmum', $hasil);
			$this->db->where('email', $email);
			$this->db->update('user_detail');

			$this->db->set('sts', $sts);
			$this->db->where('id_cuti', $id_cuti);
			$this->db->update('permohonan');
			
		} 
		if ($stok == "Cuti Umrah") {
			$jenisCuti = $this->input->post('jenisCuti');	
			$email = $this->input->post('email');
			$id_cuti = $this->input->post('id_cuti');
			$cutiDiambil = $this->input->post('cutiDiambil');
			$hasil = $cutiDiambil + $stok ;
			$date = date("Y-m-d H:i:s");
			$sts = 5;
			

			$data = [
                'id_cuti' => $id_cuti,
                'alasan' => $this->input->post('alasan'),
				'created_at' => $date

				
			];

			$this->db->insert('permohonan_batal', $data);
			
			$this->db->set('cutiUmroh', $hasil);
			$this->db->where('email', $email);
			$this->db->update('user_detail');

			$this->db->set('sts', $sts);
			$this->db->where('id_cuti', $id_cuti);
			$this->db->update('permohonan');
		}


	if ($stok == "Cuti Hamil") {
		$jenisCuti = $this->input->post('jenisCuti');	
		$email = $this->input->post('email');
		$id_cuti = $this->input->post('id_cuti');
		$cutiDiambil = $this->input->post('cutiDiambil');
		$hasil = $cutiDiambil + $stok ;
		$date = date("Y-m-d H:i:s");
		$sts = 5;
		

		$data = [
			'id_cuti' => $id_cuti,
			'alasan' => $this->input->post('alasan'),
			'created_at' => $date

			
		];

		$this->db->insert('permohonan_batal', $data);
		
		$this->db->set('cutiHamil', $hasil);
		$this->db->where('email', $email);
		$this->db->update('user_detail');

		$this->db->set('sts', $sts);
		$this->db->where('id_cuti', $id_cuti);
		$this->db->update('permohonan');
	}


            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permohonan Berhasil Dibatalkan</div>');
            redirect('permohonan/listCuti');
		}

		// CUTI UMROH
		public function cutiUmroh()
    {
        $data['title'] = 'Form Cuti Umrah';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['detail'] = $this->db->get_where('user_detail', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('cutiDiambil', 'Lamanya Cuti', 'required|trim');
		$this->form_validation->set_rules('tglCuti', 'Tanggal Mulai Cuti', 'required|trim');
		$this->form_validation->set_rules('tglSelesaiCuti', 'Tanggal Selesai Cuti', 'required|trim');
		$this->form_validation->set_rules('tglMasuk', 'Tanggal Masuk', 'required|trim');
		$this->form_validation->set_rules('alasan', 'Alasan', 'required|trim');

		if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permohonan/fcutiUmroh', $data);
		$this->load->view('templates/footer');
		} else {
			$sisaCuti = $this->input->post('sisaCuti');
					if ($sisaCuti < 0){
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf Cuti Anda Tidak Cukup</div>');
						redirect('permohonan/cutiUmroh');
					} else {
			$email = $this->input->post('email');
			$date = date("Y-m-d H:i:s");
			
            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['scan']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
				$config['upload_path'] = './assets/scan/';
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('scan')) {
                    $old_image = $data['permohonan']['scan'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/scan/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }


			$data = [
                'email' => $email,
                'jenisCuti' => "Cuti Umroh",
                'cutiDiambil' => $this->input->post('cutiDiambil'),
                'alasan' => $this->input->post('alasan'),
				'sts' =>1,
				'tglCuti' => $this->input->post('tglCuti'),
				'tglSelesaiCuti' => $this->input->post('tglSelesaiCuti'),
				'tglMasuk' => $this->input->post('tglMasuk'),
				'tglPengajuan' => $date,
				'created_at' => $date,
				'scan' => $new_image
				
			];
		
			
			$this->db->insert('permohonan', $data);
			
			$this->db->set('cutiUmroh', $sisaCuti);
			$this->db->where('email', $email);
			$this->db->update('user_detail');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permohonan Berhasil Dikirim</div>');
            redirect('permohonan/listCuti');
		}
		}
	}

			// CUTI UMROH
			public function cutiHamil()
			{
				$data['title'] = 'Form Cuti Umrah';
				$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
				$data['detail'] = $this->db->get_where('user_detail', ['email' => $this->session->userdata('email')])->row_array();
		
				$this->form_validation->set_rules('email', 'Email', 'required|trim');
				$this->form_validation->set_rules('cutiDiambil', 'Lamanya Cuti', 'required|trim');
				$this->form_validation->set_rules('tglCuti', 'Tanggal Mulai Cuti', 'required|trim');
				$this->form_validation->set_rules('tglSelesaiCuti', 'Tanggal Selesai Cuti', 'required|trim');
				$this->form_validation->set_rules('tglMasuk', 'Tanggal Masuk', 'required|trim');
				$this->form_validation->set_rules('alasan', 'Alasan', 'required|trim');
		
				if ($this->form_validation->run() == false) {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('permohonan/fcutiHamil', $data);
				$this->load->view('templates/footer');
				} else {
					$sisaCuti = $this->input->post('sisaCuti');
					if ($sisaCuti < 0){
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf Cuti Anda Tidak Cukup</div>');
						redirect('permohonan/cutiHamil');
					} else {
					$email = $this->input->post('email');
					$date = date("Y-m-d H:i:s");
					
					// cek jika ada gambar yang akan diupload
					$upload_image = $_FILES['scan']['name'];
		
					if ($upload_image) {
						$config['allowed_types'] = 'gif|jpg|png';
						$config['max_size']      = '2048';
						$config['upload_path'] = './assets/scan/';
						$config['encrypt_name'] = TRUE;
		
						$this->load->library('upload', $config);
		
						if ($this->upload->do_upload('scan')) {
							$old_image = $data['permohonan']['scan'];
							if ($old_image != 'default.jpg') {
								unlink(FCPATH . 'assets/scan/' . $old_image);
							}
							$new_image = $this->upload->data('file_name');
						} else {
							echo $this->upload->display_errors();
						}
					}
		
		
					$data = [
						'email' => $email,
						'jenisCuti' => "Cuti Hamil",
						'cutiDiambil' => $this->input->post('cutiDiambil'),
						'alasan' => $this->input->post('alasan'),
						'sts' =>1,
						'tglCuti' => $this->input->post('tglCuti'),
						'tglSelesaiCuti' => $this->input->post('tglSelesaiCuti'),
						'tglMasuk' => $this->input->post('tglMasuk'),
						'tglPengajuan' => $date,
						'created_at' => $date,
						'scan' => $new_image
						
					];
				
					
					$this->db->insert('permohonan', $data);
					
					$this->db->set('cutiHamil', $sisaCuti);
					$this->db->where('email', $email);
					$this->db->update('user_detail');
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permohonan Berhasil Dikirim</div>');
					redirect('permohonan/listCuti');
		
				}
			}
			}

			public function cetak($id_cuti)
			{
				$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
				$data['detail'] = $this->db->get_where('user_detail', ['email' => $this->session->userdata('email')])->row_array();
				$data['cetak'] = $this->Permohonan_Model->listCutiCetak($id_cuti);

				$this->load->view('cetak/cetak',$data);
		
			}

	
}
   