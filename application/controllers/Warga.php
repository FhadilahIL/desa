<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Warga extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_warga');
    }

    function update_profile_warga()
    {
        $data = [
            'nama_warga'    => $this->input->post('nama', TRUE),
            'rt'            => $this->input->post('rt', TRUE),
            'email_warga'   => $this->input->post('email', TRUE),
            'alamat'        => $this->input->post('alamat', TRUE)
        ];

        $nik = $this->input->post('nik', TRUE);

        if ($this->M_warga->ubah_warga($nik, $data)) {
            $this->session->set_flashdata('berhasil', 'Profile Berhasil Diubah');
        } else {
            $this->session->set_flashdata('gagal', 'Profile gagal Diubah');
        }
        redirect('profile');
    }

    function aktifkan($id_warga)
    {
        $data = ['status' => '1'];

        if ($this->M_warga->reset_password($id_warga, $data)) {
            $this->session->set_flashdata('berhasil', 'Status warga berhasil diaktifkan');
            redirect('admin/data_warga');
        } else {
            $this->session->set_flashdata('berhasil', 'Status warga gagal diaktifkan');
            redirect('admin/data_warga');
        }
    }

    function nonaktifkan($id_warga)
    {
        $data = ['status' => '0'];

        if ($this->M_warga->reset_password($id_warga, $data)) {
            $this->session->set_flashdata('berhasil', 'Status warga berhasil dinonaktifkan');
            redirect('admin/data_warga');
        } else {
            $this->session->set_flashdata('berhasil', 'Status warga gagal dinonaktifkan');
            redirect('admin/data_warga');
        }
    }

    function reset_password($id_warga)
    {
        $data_warga = $this->M_warga->cari_warga($id_warga)->row();
        $password = 'warga#' . substr($data_warga->nik, 10);
        $data = ['password' => password_hash($password, PASSWORD_DEFAULT)];

        if ($this->M_warga->reset_password($id_warga, $data)) {
            $this->session->set_flashdata('berhasil', 'Password Berhasil Direset');
            redirect('admin/data_warga');
        } else {
            $this->session->set_flashdata('gagal', 'Password Gagal Direset');
            redirect('admin/data_warga');
        }
    }
}
