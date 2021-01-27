<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin');
		$this->load->model('M_pengaduan');
		$this->load->model('M_berita');
		$this->load->model('M_surat');
		$this->load->model('M_warga');
		if ($this->session->role != 1) {
			redirect('auth/cek_session');
		}
	}

	function index()
	{
		$data['title'] = 'Dashboard - Desa Cikande';
		$data['profile'] = $this->M_admin->detail_admin(md5($this->session->userdata('id')))->row();
		$data['active'] = ['active', '', '', '', '', ''];
		$data['admin_aktif'] = $this->M_admin->tampil_admin_aktif()->num_rows();
		$data['berita_pertahun'] = $this->M_berita->tampil_berita_tahun_ini(date('Y'))->num_rows();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('admin/index');
		$this->load->view('templates/footer');
	}

	function pengaduan_perbulan()
	{
		$bulan = range(1, 12);
		foreach ($bulan as $banyak) {
			$data[] = $this->M_pengaduan->tampil_pengaduan_perbulan($banyak, date('Y'))->num_rows();
		}
		echo json_encode($data);
	}

	function data_admin()
	{
		$data['title'] = 'Data Admin - Desa Cikande';
		$data['profile'] = $this->M_admin->detail_admin(md5($this->session->userdata('id')))->row();
		$data['active'] = ['', 'active', '', '', '', ''];
		$data['tampil_admin'] = $this->M_admin->tampil_admin()->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('admin/data_admin');
		$this->load->view('templates/footer');
	}

	function data_warga()
	{
		$data['title'] = 'Data Warga - Desa Cikande';
		$data['profile'] = $this->M_admin->detail_admin(md5($this->session->userdata('id')))->row();
		$data['active'] = ['', '', 'active', '', '', ''];
		$data['tampil_warga'] = $this->M_warga->tampil_warga()->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('admin/data_warga');
		$this->load->view('templates/footer');
	}

	function data_pengaduan()
	{
		$data['title'] = 'Data Pengaduan - Desa Cikande';
		$data['profile'] = $this->M_admin->detail_admin(md5($this->session->userdata('id')))->row();
		$data['active'] = ['', '', '', 'active', '', ''];
		$data['tampil_pengaduan'] = $this->M_pengaduan->tampil_pengaduan()->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('admin/data_pengaduan');
		$this->load->view('templates/footer');
	}

	function data_surat()
	{
		$data['title'] = 'Data Surat - Desa Cikande';
		$data['profile'] = $this->M_admin->detail_admin(md5($this->session->userdata('id')))->row();
		$data['active'] = ['', '', '', '', 'active', ''];
		$data['tampil_surat'] = $this->M_surat->tampil_surat()->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('admin/data_surat');
		$this->load->view('templates/footer');
	}

	function data_berita()
	{
		$data['title'] = 'Data Berita - Desa Cikande';
		$data['profile'] = $this->M_admin->detail_admin(md5($this->session->userdata('id')))->row();
		$data['active'] = ['', '', '', '', '', 'active'];
		$data['tampil_berita'] = $this->M_berita->tampil_berita()->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('admin/data_berita');
		$this->load->view('templates/footer');
	}

	function tambah_admin()
	{
		$email = $this->input->post('email', TRUE);
		$nama = $this->input->post('nama', TRUE);
		$strEmail = explode('@', $email);
		$pass = 'admin#' . $strEmail[0];

		$cari_email = $this->M_admin->cari_admin($email)->num_rows();

		if ($cari_email > 0) {
			$this->session->set_flashdata('gagal', "Email sudah terdaftar. Silahkan coba email lain.");
			redirect('admin/data_admin');
		} else {
			$data = [
				'email'			=> $email,
				'password'		=> password_hash($pass, PASSWORD_DEFAULT),
				'foto'			=> 'default.jpg',
				'nama'			=> $nama,
				'date_created'	=> date('Y-m-d H:i:s')
			];

			if ($this->M_admin->tambah_admin($data)) {
				$this->session->set_flashdata('berhasil', "Data Admin Telah Ditambahkan.");
				redirect('admin/data_admin');
			} else {
				$this->session->set_flashdata('gagal', "Data Admin Tidak Berhasil Ditambahkan.");
				redirect('admin/data_admin');
			}
		}
	}

	function detail_admin($id)
	{
		$data['active'] = ['', 'active', '', '', '', ''];
		$data['data_admin'] = $this->M_admin->detail_admin($id)->row();
		$data['profile'] = $this->M_admin->detail_admin(md5($this->session->userdata('id')))->row();
		$data['title'] = 'Detail Admin - ' . $data['data_admin']->nama;
		$data['nama'] = $data['data_admin']->nama;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('admin/detail_admin');
		$this->load->view('templates/footer');
	}

	function detail_aduan($id)
	{
		$data['active'] = ['', '', 'active', '', '', ''];
		$data['profile'] = $this->M_admin->detail_admin(md5($this->session->id))->row();
		$data['data_pengaduan'] = $this->M_pengaduan->detail_pengaduan($id)->row();
		$data['title'] = 'Detail Pengaduan';
		$data['id_pengaduan'] = $data['data_pengaduan']->id_pengaduan;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('admin/detail_aduan');
		$this->load->view('templates/footer');
	}

	function detail_berita($id)
	{
		$data['title'] = 'Detail Berita';
		$data['profile'] = $this->M_admin->detail_admin(md5($this->session->userdata('id')))->row();
		$data['active'] = ['', '', '', '', '', 'active'];
		$data['data_berita'] = $this->M_berita->detail_berita($id)->row();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('admin/detail_berita');
		$this->load->view('templates/footer');
	}

	function ubah_admin($id)
	{
		$data['active'] = ['', 'active', '', '', '', ''];
		$data['data_admin'] = $this->M_admin->detail_admin($id)->row();
		$data['profile'] = $this->M_admin->detail_admin(md5($this->session->userdata('id')))->row();
		$data['title'] = 'Ubah Data Admin - ' . $data['data_admin']->nama;
		$data['nama'] = $data['data_admin']->nama;

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('admin/ubah_admin');
		$this->load->view('templates/footer');
	}

	function my_profile()
	{
		$data['active'] = ['', '', '', '', '', ''];
		$data['data_admin'] = $this->M_admin->detail_admin(md5($this->session->userdata('id')))->row();
		$data['profile'] = $this->M_admin->detail_admin(md5($this->session->userdata('id')))->row();
		$data['title'] = 'My Profile';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('admin/my_profile');
		$this->load->view('templates/footer');
	}

	function ubah_berita($id)
	{
		$data['title'] = 'Ubah Data Berita';
		$data['active'] = ['', '', '', '', '', 'active'];
		$data['profile'] = $this->M_admin->detail_admin(md5($this->session->userdata('id')))->row();
		$data['data_berita'] = $this->M_berita->detail_berita($id)->row();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('admin/ubah_berita');
		$this->load->view('templates/footer');
	}

	function edit_admin($id)
	{
		if ($id != md5($this->session->id)) {
			$status = $this->input->post('status', TRUE);
			$data = ['status' => $status];

			if ($this->M_admin->ubah_admin($id, $data)) {
				$this->session->set_flashdata('berhasil', "Berhasil mengubah data admin.");;
				redirect('admin/data_admin');
			} else {
				$this->session->set_flashdata('gagal', "Gagal mengubah data admin.");;
				redirect('admin/data_admin');
			}
		} else {
			$email = $this->input->post('email', TRUE);
			$nama = $this->input->post('nama', TRUE);
			$password = $this->input->post('password', TRUE);
			$confirmPassword = $this->input->post('confirmPassword', TRUE);
			$data_admin = $this->M_admin->detail_admin($id)->row();
			if (($id == md5($data_admin->id_admin)) && ($email == $data_admin->email)) {
				$data = [
					'nama'		=> $nama
				];

				if ($password != '') {
					if ($password == $confirmPassword) {
						$dataPassword = ['password' => password_hash($password, PASSWORD_DEFAULT)];
						$data = array_merge($data, $dataPassword);
					} else {
						$this->session->set_flashdata('gagal', "Password yang anda masukan tidak sama.");;
						redirect('admin/data_admin');
					}
				}

				if ($_FILES['foto_profile']['name']) {
					$config['upload_path']          = './assets/img/profile/';
					$config['allowed_types']        = 'jpeg|jpg|png';
					$config['max_size']             = 2048;
					$config['encrypt_name']			= TRUE;

					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('foto_profile')) {
						$this->session->set_flashdata('gagal', $this->upload->display_errors());
						redirect('admin/data_admin');
					} else {
						if ($data_admin->foto != 'default.jpg') {
							unlink('./assets/img/profile/' . $data_admin->foto);
						}
						$dataUpload = $this->upload->data();
						$config['image_library'] = 'gd2';
						$config['source_image'] = './assets/img/profile/' . $dataUpload['file_name'];
						$config['width'] = 300;
						$config['height'] = 400;
						$config['maintain_ratio'] = FALSE;
						$config['new_image'] = './assets/img/profile/' . $dataUpload['file_name'];
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();
						$dataFoto = ['foto' => $dataUpload['file_name']];
						$data = array_merge($data, $dataFoto);
					}
				}

				if ($this->M_admin->ubah_admin($id, $data)) {
					$this->session->set_flashdata('berhasil', "Berhasil mengubah data admin.");;
					redirect('admin/data_admin');
				} else {
					$this->session->set_flashdata('gagal', "Gagal mengubah data admin.");;
					redirect('admin/data_admin');
				}
			} else {
				$this->session->set_flashdata('gagal', "ID Admin dan Email Tidak Sesuai");
				redirect('admin/data_admin');
			}
		}
	}

	function edit_profile($id)
	{
		if ($id != md5($this->session->id)) {
			$status = $this->input->post('status', TRUE);
			$data = ['status' => $status];

			if ($this->M_admin->ubah_admin($id, $data)) {
				$this->session->set_flashdata('berhasil', "Berhasil mengubah data admin.");;
				redirect('admin/my_profile');
			} else {
				$this->session->set_flashdata('gagal', "Gagal mengubah data admin.");;
				redirect('admin/my_profile');
			}
		} else {
			$email = $this->input->post('email', TRUE);
			$nama = $this->input->post('nama', TRUE);
			$password = $this->input->post('password', TRUE);
			$confirmPassword = $this->input->post('confirmPassword', TRUE);
			$data_admin = $this->M_admin->detail_admin($id)->row();
			if (($id == md5($data_admin->id_admin)) && ($email == $data_admin->email)) {
				$data = [
					'nama'		=> $nama
				];

				if ($password != '') {
					if ($password == $confirmPassword) {
						$dataPassword = ['password' => password_hash($password, PASSWORD_DEFAULT)];
						$data = array_merge($data, $dataPassword);
					} else {
						$this->session->set_flashdata('gagal', "Password yang anda masukan tidak sama.");;
						redirect('admin/my_profile');
					}
				}

				if ($_FILES['foto_profile']['name']) {
					$config['upload_path']          = './assets/img/profile/';
					$config['allowed_types']        = 'jpeg|jpg|png';
					$config['max_size']             = 2048;
					$config['encrypt_name']			= TRUE;

					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('foto_profile')) {
						$this->session->set_flashdata('gagal', $this->upload->display_errors());
						redirect('admin/my_profile');
					} else {
						if ($data_admin->foto != 'default.jpg') {
							unlink('./assets/img/profile/' . $data_admin->foto);
						}
						$dataUpload = $this->upload->data();
						$config['image_library'] = 'gd2';
						$config['source_image'] = './assets/img/profile/' . $dataUpload['file_name'];
						$config['width'] = 300;
						$config['height'] = 400;
						$config['maintain_ratio'] = FALSE;
						$config['new_image'] = './assets/img/profile/' . $dataUpload['file_name'];
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();
						$dataFoto = ['foto' => $dataUpload['file_name']];
						$data = array_merge($data, $dataFoto);
					}
				}

				if ($this->M_admin->ubah_admin($id, $data)) {
					$this->session->set_flashdata('berhasil', "Berhasil mengubah data profile.");
					redirect('admin/my_profile');
				} else {
					$this->session->set_flashdata('gagal', "Gagal mengubah data profile.");
					redirect('admin/my_profile');
				}
			} else {
				$this->session->set_flashdata('gagal', "ID Admin dan Email Tidak Sesuai");
				redirect('admin/my_profile');
			}
		}
	}

	function reset_password($id)
	{
		$detail_admin = $this->M_admin->detail_admin($id)->row();
		$srtEmail = explode('@', $detail_admin->email);
		$password_reset = 'admin#' . $srtEmail[0];
		$data = ['password' => password_hash($password_reset, PASSWORD_DEFAULT)];
		if ($this->M_admin->ubah_admin($id, $data)) {
			$this->session->set_flashdata('berhasil', "Password admin berhasil direset");
			redirect('admin/data_admin');
		} else {
			$this->session->set_flashdata('gagal', "Password admin gagal direset");
			redirect('admin/data_admin');
		}
	}
}
