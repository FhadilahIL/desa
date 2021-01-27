<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_berita');
        $this->load->model('M_surat');
        $this->load->model('M_warga');
    }

    function index()
    {
        $data['judul'] = 'Beranda';
        $this->load->view('home/header', $data);
        $this->load->view('home/index');
        $this->load->view('home/footer');
    }

    function login()
    {
        $this->load->view('home/login');
    }

    function struktur_organisasi()
    {
        $data['judul'] = 'Struktur Organisasi';
        $this->load->view('home/header', $data);
        $this->load->view('home/struktur_organisasi');
        $this->load->view('home/footer');
    }

    function visi_misi()
    {
        $data['judul'] = 'Visi dan Misi';
        $this->load->view('home/header', $data);
        $this->load->view('home/visi_misi');
        $this->load->view('home/footer');
    }

    function lokasi()
    {
        $data['judul'] = 'Letak Geografis';
        $this->load->view('home/header', $data);
        $this->load->view('home/lokasi_geografis');
        $this->load->view('home/footer');
    }

    function info_rw_dan_kejaroan()
    {
        $data['judul'] = 'Info RW dan Kejaroan';
        $this->load->view('home/header', $data);
        $this->load->view('home/info_rw_jaro');
        $this->load->view('home/footer');
    }

    function berita()
    {
        $data['judul'] = 'Berita Terkini';
        $banyak_berita = $this->M_berita->jumlah_berita()->num_rows();

        $this->load->library('pagination');
        $config['base_url'] = base_url('home/berita');
        $config['total_rows'] = $banyak_berita;
        $config['per_page'] = 9;
        $from = $this->uri->segment(3);
        $config['next_link'] = 'Selanjutnya';
        $config['prev_link'] = 'Sebelumnya';
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir';
        $config['full_tag_open'] = '<ul class="pagination justify-content-end">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item page-link">';
        $config['num_tag_close'] = '</a></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item page-link">';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item page-link">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item page-link">';
        $config['last_tag_open'] = '<li>';
        $config['first_tag_open'] = '<li class="page-item page-link">';
        $config['first_tag_open'] = '<li>';
        $this->pagination->initialize($config);

        $data['tampil_berita'] = $this->M_berita->tampil_berita_home($config['per_page'], $from)->result();

        $this->load->view('home/header', $data);
        $this->load->view('home/berita');
        $this->load->view('home/footer');
    }

    function tampil_berita($judul)
    {
        $data['tampil_berita'] = $this->M_berita->tampil_detail_berita($judul)->row();
        $data['judul'] = ucwords(str_replace('-', ' ', $data['tampil_berita']->judul_berita));

        $this->load->view('home/header', $data);
        $this->load->view('home/tampil_berita');
        $this->load->view('home/footer');
    }

    function dokumen_surat()
    {
        $data['tampil_surat'] = $this->M_surat->get_surat()->result();
        $data['judul'] = 'Dokumen Surat';
        $this->load->view('home/header', $data);
        $this->load->view('home/surat');
        $this->load->view('home/footer');
    }

    function form_pengaduan()
    {
        $data['judul'] = 'Form Pengaduan';
        $data['warga'] = $this->M_warga->cari_warga($this->session->nik)->row();
        if ($data['warga']->email_warga == '') {
            $this->session->set_flashdata('info', 'Silahkan lengkapi data diri anda di Menu Profile');
        }
        $this->load->view('home/header', $data);
        $this->load->view('home/pengaduan');
        $this->load->view('home/footer');
    }

    function profile()
    {
        $data['judul'] = 'My Profile';
        $data['warga'] = $this->M_warga->cari_warga($this->session->nik)->row();
        if ($data['warga']->email_warga == '') {
            $this->session->set_flashdata('info', 'Silahkan lengkapi data diri anda di form yang tertera');
        }
        $this->load->view('home/header', $data);
        $this->load->view('home/profile');
        $this->load->view('home/footer');
    }
}
