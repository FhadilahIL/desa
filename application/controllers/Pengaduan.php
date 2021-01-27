<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_pengaduan');
    }

    function tambah_pengaduan()
    {
        $data = [
            'jenis_pengaduan'   => $this->input->post('jenis_pengaduan', TRUE),
            'id_warga'          => $this->input->post('id_warga', TRUE),
            'isi_pengaduan'     => $this->input->post('isi_pengaduan', TRUE),
            'status'            => 0,
            'waktu_pengaduan'   => date('Y-m-d H:i:s')
        ];

        if ($this->M_pengaduan->tambah_pengaduan($data)) {
            $this->session->set_flashdata('berhasil', 'Berhasil Menambahkan Data Pengaduan');
            redirect('admin/data_pengaduan');
            // if ($this->session->id) {
            // } else {
            //     $this->session->set_flashdata('berhasil', 'Data Pengaduan Berhasil Diajukan. Silahkan Menunggu Email Balasan Dari Admin.');
            //     redirect('form_pengaduan');
            // }
        } else {
            $this->session->set_flashdata('gagal', 'Gagal Menambahkan Data Pengaduan');
            redirect('admin/data_pengaduan');
            // if ($this->session->id) {
            // } else {
            //     $this->session->set_flashdata('gagal', 'Data Pengaduan Gagal Diajukan');
            //     redirect('form_pengaduan');
            // }
        }
    }

    function ajukan_pengaduan()
    {
        $data = [
            'jenis_pengaduan'   => $this->input->post('jenis_pengaduan', TRUE),
            'id_warga'          => $this->input->post('id_warga', TRUE),
            'isi_pengaduan'     => $this->input->post('isi_pengaduan', TRUE),
            'status'            => 0,
            'waktu_pengaduan'   => date('Y-m-d H:i:s')
        ];

        if ($this->M_pengaduan->tambah_pengaduan($data)) {
            $this->session->set_flashdata('berhasil', 'Data Pengaduan Berhasil Diajukan. Silahkan Menunggu Email Balasan Dari Admin.');
            redirect('form_pengaduan');
        } else {
            $this->session->set_flashdata('gagal', 'Data Pengaduan Gagal Diajukan');
            redirect('form_pengaduan');
        }
    }

    function edit_pengaduan($id)
    {
        if ($this->session->role != 1) {
            redirect('auth/cek_session');
        }

        $data = [
            'jenis_pengaduan'   => $this->input->post('jenis_pengaduan', TRUE),
            'isi_pengaduan'     => $this->input->post('isi_pengaduan', TRUE)
        ];

        if ($this->M_pengaduan->ubah_pengaduan($id, $data)) {
            $this->session->set_flashdata('berhasil', 'Berhasil Mengubah Data Pengaduan');
            redirect('admin/data_pengaduan');
        } else {
            $this->session->set_flashdata('gagal', 'Gagal Mengubah Data Pengaduan');
            redirect('admin/data_pengaduan');
        }
    }

    function reply_pengaduan($id)
    {
        if ($this->session->role != 1) {
            redirect('auth/cek_session');
        }

        $this->load->model('M_admin');

        $pesan = $this->input->post('reply_pengaduan', TRUE);
        $data_pengaduan = $this->M_pengaduan->detail_pengaduan(md5($id))->row();
        $data_admin = $this->M_admin->detail_admin(md5($this->session->id))->row();

        $data = [
            'id_admin'      => $this->session->id,
            'id_pengaduan'  => $id,
            'pesan'         => $pesan,
            'reply_time'    => date('Y-m-d H:i:s')
        ];

        $data_status = ['status' => 1];

        $email_nama = 'Admin Desa - ' . $data_admin->nama;
        $subject = 'Balasan - ' . $data_pengaduan->jenis_pengaduan;

        $config['protocol']     = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.googlemail.com';
        $config['smtp_port']    = '465';
        $config['smtp_user']    = 'desacikande2020@gmail.com';
        $config['smtp_pass']    = 'DesaCikande2002';
        $config['charset']      = 'utf-8';
        $config['newline']      = "\r\n";
        $config['mailtype']     = 'html';

        $this->email->initialize($config);

        $this->email->from('no-reply@desa-cikande.com', $email_nama);
        $this->email->to($data_pengaduan->email_warga);

        $this->email->subject($subject);
        $this->email->message($pesan);

        if ($this->M_pengaduan->reply_pengaduan($data) && $this->email->send()) {
            $this->M_pengaduan->ubah_pengaduan(md5($id), $data_status);
            $this->session->set_flashdata('berhasil', 'Email Balasan Berhasil Dikirim');
            redirect('admin/data_pengaduan');
        } else {
            $this->session->set_flashdata('gagal', 'Email Balasan Tidak Terkirim.');
            redirect('admin/data_pengaduan');
        }
    }
}
