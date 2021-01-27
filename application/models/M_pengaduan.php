<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pengaduan extends CI_Model
{

    function cari_pengaduan($nik)
    {
        $this->db->where('nik_pengadu', $nik);
        return $this->db->get('tb_pengaduan');
    }

    function tampil_pengaduan()
    {
        $this->db->select('jenis_pengaduan, isi_pengaduan, tb_pengaduan.id_warga, nama_warga, nik, email_warga, tb_pengaduan.status, id_pengaduan');
        $this->db->join('tb_warga', 'tb_pengaduan.id_warga = tb_warga.id_warga', 'inner');
        $this->db->order_by('tb_pengaduan.status', 'ASC');
        return $this->db->get('tb_pengaduan');
    }

    function tampil_pengaduan_perbulan($bulan, $tahun)
    {
        $this->db->where('year(waktu_pengaduan)', $tahun);
        $this->db->where('month(waktu_pengaduan)', $bulan);
        return $this->db->get('tb_pengaduan');
    }

    function tambah_pengaduan($data)
    {
        return $this->db->insert('tb_pengaduan', $data);
    }

    function reply_pengaduan($data)
    {
        return $this->db->insert('tb_reply_pengaduan', $data);
    }

    function detail_pengaduan($id)
    {
        return $this->db->query("SELECT tb_pengaduan.id_pengaduan, tb_warga.nama_warga, tb_warga.email_warga, nik, rt, jenis_pengaduan, isi_pengaduan, tb_pengaduan.status, tb_pengaduan.waktu_pengaduan, tb_admin.nama, pesan, reply_time FROM `tb_pengaduan` LEFT JOIN tb_reply_pengaduan ON tb_reply_pengaduan.id_pengaduan = tb_pengaduan.id_pengaduan LEFT JOIN tb_admin ON tb_reply_pengaduan.id_admin = tb_admin.id_admin INNER JOIN tb_warga ON tb_pengaduan.id_warga = tb_warga.id_warga WHERE md5(tb_pengaduan.id_pengaduan) = '$id'");
    }

    function ubah_pengaduan($id, $data)
    {
        $this->db->where('md5(id_pengaduan)', $id);
        return $this->db->update('tb_pengaduan', $data);
    }

    function hapus_pengaduan($id)
    {
        $this->db->where('md5(id_pengaduan)', $id);
        return $this->db->delete('tb_pengaduan');
    }
}
