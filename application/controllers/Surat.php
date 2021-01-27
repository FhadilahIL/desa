<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_surat');
        if ($this->session->role != 1) {
            redirect('auth/cek_session');
        }
    }

    function tambah_surat()
    {
        if ($_FILES['file_surat']['name']) {
            $config['upload_path']          = './assets/file/';
            $config['allowed_types']        = 'doc|docx';
            $config['file_name']            = str_replace(' ', '-', strtolower($this->input->post('nama_surat', TRUE)));
            $config['max_size']             = 2048;
            $config['overwrite']            = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file_surat')) {
                $this->session->set_flashdata('gagal', $this->upload->display_errors());
                redirect('admin/data_surat');
            } else {
                $dataUpload = $this->upload->data();
            }
            $file_surat = $dataUpload['file_name'];
        }

        $data = [
            'nama_surat' => str_replace(' ', '-', strtolower($this->input->post('nama_surat', TRUE))),
            'file_surat' => $file_surat,
            'id_admin' => $this->session->id,
            'upload_time' => date('Y-m-d H:i:s')
        ];

        if ($this->M_surat->tambah_surat($data)) {
            $this->session->set_flashdata('berhasil', 'Berhasil Mengupload Surat');
            redirect('admin/data_surat');
        } else {
            $this->session->set_flashdata('gagal', 'Gagal Mengupload Surat');
            redirect('admin/data_surat');
        }
    }

    function edit_surat($id)
    {
        if ($_FILES['file_surat']['name']) {
            $data_surat = $this->M_surat->detail_surat($id)->row();
            unlink('./assets/file/' . $data_surat->file_surat);

            $config['upload_path']          = './assets/file/';
            $config['allowed_types']        = 'doc|docx';
            $config['file_name']            = str_replace(' ', '-', strtolower($this->input->post('nama_surat', TRUE)));
            $config['max_size']             = 2048;
            $config['overwrite']            = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file_surat')) {
                $this->session->set_flashdata('gagal', $this->upload->display_errors());
                redirect('admin/data_surat');
            } else {
                $dataUpload = $this->upload->data();
            }
            $file_surat = $dataUpload['file_name'];
        }

        $data = [
            'file_surat' => $file_surat,
            'id_admin' => $this->session->id,
            'upload_time' => date('Y-m-d H:i:s')
        ];

        if ($this->M_surat->ubah_surat($id, $data)) {
            $this->session->set_flashdata('berhasil', 'Berhasil Mengupload Surat');
            redirect('admin/data_surat');
        } else {
            $this->session->set_flashdata('gagal', 'Gagal Mengupload Surat');
            redirect('admin/data_surat');
        }
    }

    function hapus_surat($id)
    {
        $data_surat = $this->M_surat->detail_surat($id)->row();

        if ($this->M_surat->hapus_surat($id)) {
            if ($data_surat->file_surat) {
                unlink('./assets/file/' . $data_surat->file_surat);
            }
            $this->session->set_flashdata('berhasil', 'Berhasil Menghapus Surat');
            redirect('admin/data_surat');
        } else {
            $this->session->set_flashdata('gagal', 'Gagal Menghapus Surat');
            redirect('admin/data_surat');
        }
    }
}
