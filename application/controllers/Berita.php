<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_berita');
		if ($this->session->role != 1) {
			redirect('auth/cek_session');
		}
	}

	function tambah_berita()
	{
		if ($_FILES['gambar_berita']['name']) {
			$config['upload_path']          = './assets/img/berita/';
			$config['allowed_types']        = 'jpeg|jpg|png';
			$config['max_size']             = 2048;
			$config['encrypt_name']			= TRUE;

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('gambar_berita')) {
				$this->session->set_flashdata('gagal', $this->upload->display_errors());
				redirect('admin/data_berita');
			} else {
				$dataUpload = $this->upload->data();
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/img/berita/' . $dataUpload['file_name'];
				$config['width'] = 432;
				$config['height'] = 216;
				$config['maintain_ratio'] = FALSE;
				$config['new_image'] = './assets/img/berita/' . $dataUpload['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
			}
			$gambar_berita = $dataUpload['file_name'];
		} else {
			$gambar_berita = 'default.jpg';
		}

		$data = [
			'judul_berita' => str_replace(' ', '-', strtolower($this->input->post('judul_berita', TRUE))),
			'gambar_berita' => $gambar_berita,
			'id_admin' => $this->session->id,
			'isi_berita' => $this->input->post('isi_berita', TRUE),
			'news_created' => date('Y-m-d H:i:s'),
		];

		if ($this->M_berita->tambah_berita($data)) {
			$this->session->set_flashdata('berhasil', 'Berhasil Menambahkan dan Mempublish Berita');
			redirect('admin/data_berita');
		} else {
			$this->session->set_flashdata('gagal', 'Gagal Menambahkan dan Mempublish Berita');
			redirect('admin/data_berita');
		}
	}

	function edit_berita($id)
	{
		if ($_FILES['gambar_berita']['name']) {
			$data_berita = $this->M_berita->detail_berita($id)->row();

			$config['upload_path']          = './assets/img/berita/';
			$config['allowed_types']        = 'jpeg|jpg|png';
			$config['max_size']             = 2048;
			$config['encrypt_name']			= TRUE;

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('gambar_berita')) {
				$this->session->set_flashdata('gagal', $this->upload->display_errors());
				redirect('admin/data_berita');
			} else {
				if ($data_berita->gambar_berita != 'default.jpg') {
					unlink('./assets/img/berita/' . $data_berita->gambar_berita);
				}
				$dataUpload = $this->upload->data();
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/img/berita/' . $dataUpload['file_name'];
				$config['width'] = 432;
				$config['height'] = 216;
				$config['maintain_ratio'] = FALSE;
				$config['new_image'] = './assets/img/berita/' . $dataUpload['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
			}
			$gambar_berita = $dataUpload['file_name'];
			$data = [
				'judul_berita' => str_replace(' ', '-', strtolower($this->input->post('judul_berita', TRUE))),
				'gambar_berita' => $gambar_berita,
				'id_admin' => $this->session->id,
				'isi_berita' => $this->input->post('isi_berita', TRUE),
				'news_created' => date('Y-m-d H:i:s'),
			];
		} else {
			$data = [
				'judul_berita' => str_replace(' ', '-', strtolower($this->input->post('judul_berita', TRUE))),
				'id_admin' => $this->session->id,
				'isi_berita' => $this->input->post('isi_berita', TRUE),
				'news_created' => date('Y-m-d H:i:s'),
			];
		}

		if ($this->M_berita->ubah_berita($id, $data)) {
			$this->session->set_flashdata('berhasil', 'Berhasil Menambahkan dan Mempublish Berita');
			redirect('admin/data_berita');
		} else {
			$this->session->set_flashdata('gagal', 'Gagal Menambahkan dan Mempublish Berita');
			redirect('admin/data_berita');
		}
	}

	function hapus_berita($id)
	{
		$data_berita = $this->M_berita->detail_berita($id)->row();

		if ($this->M_berita->hapus_berita($id)) {
			if ($data_berita->gambar_berita != 'default.jpg') {
				unlink('./assets/img/berita/' . $data_berita->gambar_berita);
			}
			$this->session->set_flashdata('berhasil', 'Berhasil Menghapus Data Berita');
			redirect('admin/data_berita');
		} else {
			$this->session->set_flashdata('gagal', 'Gagal Menghapus Data Berita');
			redirect('admin/data_berita');
		}
	}
}
