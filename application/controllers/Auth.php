<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin');
		$this->load->model('M_warga');
	}

	function index()
	{
		$data['title'] = 'Login - Desa Cikande';
		$this->load->view('login/admin', $data);
	}

	function cek_login()
	{
		$email = $this->input->post('email', TRUE);
		$password = $this->input->post('password', TRUE);

		$admin = $this->M_admin->cari_admin($email);
		if ($admin->num_rows() > 0) {
			$data_admin = $admin->row();
			if (password_verify($password, $data_admin->password)) {
				if ($data_admin->status == 1) {
					$session = [
						'id' 		=> $data_admin->id_admin,
						'email' 	=> $data_admin->email,
						'role' 		=> '1'
					];
					$this->session->set_userdata($session);
					redirect('admin');
				} else {
					$this->session->set_flashdata('gagal', "Akun anda sedang tidak aktif. Silahkan hubungi admin yang lain.");
					redirect('adm');
				}
			} else {
				$this->session->set_flashdata('gagal', "Password yang anda masukan tidak sesuai.");
				redirect('adm');
			}
		} else {
			$this->session->set_flashdata('gagal', "User tidak ditemukan.");
			redirect('adm');
		}
	}

	function login_warga()
	{
		$nik = $this->input->post('nik', TRUE);
		$password = $this->input->post('password', TRUE);

		$warga = $this->M_warga->cari_warga($nik);
		if ($warga->num_rows() > 0) {
			$data_warga = $warga->row();
			if (password_verify($password, $data_warga->password)) {
				if ($data_warga->status == 1) {
					$session = [
						'id' 		=> $data_warga->id_warga,
						'nik' 		=> $data_warga->nik,
						'logged'	=> true
					];
					$this->session->set_userdata($session);
					redirect('/');
				} else {
					$this->session->set_flashdata('gagal', "Status kewargaan tidak aktif. Silahkan hubungi admin desa.");
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('gagal', "Password yang anda masukan tidak sesuai.");
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('gagal', "NIK tidak ditemukan. Silahkan hubungi admin desa.");
			redirect('login');
		}
	}

	function cek_session()
	{
		if ($this->session->role == 1) {
			redirect('admin');
		} else {
			$this->session->set_flashdata('gagal', "Anda harus login terlebih dahulu.");
			redirect('adm');
		}
	}

	function logout()
	{
		if (!$this->session->id) {
			redirect('auth/cek_session');
		}

		$session = ['id', 'email', 'role'];
		$this->session->unset_userdata($session);
		$this->session->set_flashdata('berhasil', "Anda berhasil melakukan logout");
		redirect('adm');
	}

	function logout_warga()
	{
		if (!$this->session->nik) {
			redirect('auth/cek_session');
		}

		$session = ['id', 'nik', 'logged'];
		$this->session->unset_userdata($session);
		redirect('/');
	}
}
