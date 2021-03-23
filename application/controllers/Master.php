<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		is_logged_in();
		
	}
	
	public function pengguna()
    {
        $data['title'] = 'Master Pengguna';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pengguna'] = $this->db->get('user')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/pengguna', $data);
        $this->load->view('templates/footer');
	}

	public function unit()
    {
        $data['title'] = 'Master Pengguna';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['unitKerja'] = $this->db->get('funitKerja')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/unit', $data);
        $this->load->view('templates/footer');
	}

	public function aktif($email)
    {
		$is_active=1;
		$this->db->set('is_active', $is_active);
		$this->db->where('email', $email);
		$this->db->update('user');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun Berhasil Diaktifkan</div>');
        redirect('master/pengguna');
	}

	public function nonAktif($email)
    {
		$is_active=0;
		$this->db->set('is_active', $is_active);
		$this->db->where('email', $email);
		$this->db->update('user');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun Berhasil Diaktifkan</div>');
        redirect('master/pengguna');
	}

	
	public function tambahPengguna()
    {
		$passwordKu = "umsu123abc";

		
$data = [
	'email' => $this->input->post('email'),
	'nama' => $this->input->post('nama'),
	'image' =>"default.jpg",
	'role_id' => 2,
	'is_active' => 1,
	'password' => password_hash($passwordKu, PASSWORD_DEFAULT),
	'date_created' => time()
];

		
$data2 = [
	'email' => $this->input->post('email'),
	'cutiUmum' => "12",
	'cutiHamil' =>"0",
	'cutiUmroh' =>"10"
];

$this->db->insert('user', $data);

$this->db->insert('user_detail', $data2);


$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambah Pengguna</div>');
redirect('master/pengguna');
	}

	public function resetPassword($email)
    {
	  	$resets="umsu1234";
		$password_hash = password_hash($resets, PASSWORD_DEFAULT);
		$this->db->set('password', $password_hash);
		$this->db->where('email', $email);
		$this->db->update('user');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Reset Password = umsu1234</div>');
		redirect('master/pengguna');
	}

	
   
}
   
