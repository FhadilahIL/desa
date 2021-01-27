<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_berita extends CI_Model
{

    function jumlah_berita()
    {
        return $this->db->get('tb_berita');
    }

    function tampil_berita()
    {
        $this->db->join('tb_admin', 'tb_berita.id_admin = tb_admin.id_admin', 'inner');
        return $this->db->get('tb_berita');
    }

    function tampil_berita_tahun_ini($year)
    {
        $this->db->where('year(news_created)', $year);
        $this->db->join('tb_admin', 'tb_berita.id_admin = tb_admin.id_admin', 'inner');
        return $this->db->get('tb_berita');
    }

    function tampil_berita_home($limit, $offset)
    {
        $this->db->join('tb_admin', 'tb_berita.id_admin = tb_admin.id_admin', 'inner');
        return $this->db->get('tb_berita', $limit, $offset);
    }

    function tampil_detail_berita($judul)
    {
        $this->db->join('tb_admin', 'tb_berita.id_admin = tb_admin.id_admin', 'inner');
        $this->db->where('judul_berita', $judul);
        return $this->db->get('tb_berita');
    }

    function tambah_berita($data)
    {
        return $this->db->insert('tb_berita', $data);
    }

    function detail_berita($id)
    {
        $this->db->join('tb_admin', 'tb_berita.id_admin = tb_admin.id_admin', 'inner');
        $this->db->where('md5(id_berita)', $id);
        return $this->db->get('tb_berita');
    }

    function ubah_berita($id, $data)
    {
        $this->db->where('md5(id_berita)', $id);
        return $this->db->update('tb_berita', $data);
    }

    function hapus_berita($id)
    {
        $this->db->where('md5(id_berita)', $id);
        return $this->db->delete('tb_berita');
    }
}
