<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'My Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['userDetail'] = $this->db->get_where('user_detail', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('profil/index', $data);
        $this->load->view('templates/footer');
    }


    public function ubah()
    {
        $data['title'] = 'ubah Profil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['userDetail'] = $this->db->get_where('user_detail', ['email' => $this->session->userdata('email')])->row_array();
		$data['unit'] = $this->db->get('funitkerja')->result_array();
		// Validasi Form
		$this->form_validation->set_rules('nama', 'Nama Tanpa Gelar', 'required|trim');
		$this->form_validation->set_rules('nik', 'NIK', 'required|trim');
		$this->form_validation->set_rules('nbp', 'NBP', 'required|trim');
		$this->form_validation->set_rules('agama', 'agama', 'required|trim');
		$this->form_validation->set_rules('jenisKelamin', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('tempatLahir', 'Tempat Lahir', 'required|trim');
		$this->form_validation->set_rules('tglLahir', 'Tanggal Lahir', 'required|trim');
		$this->form_validation->set_rules('noHp', 'No Hp', 'required|trim');
		$this->form_validation->set_rules('statusPegawai', 'Status Pegawai', 'required|trim');
		$this->form_validation->set_rules('jabatan', 'jabatan', 'required|trim');
		$this->form_validation->set_rules('unitKerja', 'Unit Kerja', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat Rumah', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('profil/ubahProfil', $data);
            $this->load->view('templates/footer');
        } else {

			$email = $this->session->userdata('email');
			$nik =$this->input->post('nik');
			$nama =$this->input->post('nama');
			$nbp =$this->input->post('nbp');
			$gelarDepan =$this->input->post('gelarDepan');
			$gelarBelakang =$this->input->post('gelarBelakang');
			$agama =$this->input->post('agama');
			$jenisKelamin =$this->input->post('jenisKelamin');
			$tempatLahir =$this->input->post('tempatLahir');
			$tglLahir =$this->input->post('tglLahir');
			$noHp =$this->input->post('noHp');
			$statusPegawai =$this->input->post('statusPegawai');
			$jabatan =$this->input->post('jabatan');
			$unitKerja =$this->input->post('unitKerja');
			$alamat =$this->input->post('alamat');

			$this->db->set('nik', $nik);
			$this->db->set('nbp', $nbp);
			$this->db->set('agama', $agama);
			$this->db->set('gelarDepan', $gelarDepan);
			$this->db->set('gelarBelakang', $gelarBelakang);
			$this->db->set('jenisKelamin', $jenisKelamin);
			$this->db->set('tempatLahir', $tempatLahir);
			$this->db->set('tglLahir', $tglLahir);
			$this->db->set('noHp', $noHp);
			$this->db->set('statusPegawai', $statusPegawai);
			$this->db->set('jabatan', $jabatan);
			$this->db->set('unitKerja', $unitKerja);
			$this->db->set('alamat', $alamat);
            $this->db->where('email', $email);
            $this->db->update('user_detail');


			$this->db->set('nama', $nama);
			$this->db->where('email', $email);
			$this->db->update('user');
			
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Terima Kasih! Data Berhasil Di simpan.</div>');
            redirect('profil');
        }
	}
	

	public function upload()
    {
        $data['title'] = 'Upload Photo';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		 $email = $this->session->userdata('email');

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
				$config['upload_path'] = './assets/img/';
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('profil');
        
    }



    public function ubahPassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('profil/ubahPassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('profil/ubahPassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                    redirect('profil/ubahPassword');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
                    redirect('profil/ubahPassword');
                }
            }
        }
	}
	
	public function viewUser($email)
    {
		$data['title'] = 'Lihat Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['userDetail'] = $this->db->get_where('user_detail', ['email' => $this->session->userdata('email')])->row_array();
		$data['x'] = $this->db->get_where('user', ['email' => $email])->row_array();
		$data['y'] = $this->db->get_where('user_detail', ['email' =>  $email])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('profil/viewProfil', $data);
        $this->load->view('templates/footer');
    }

}
