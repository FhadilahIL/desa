<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_warga extends CI_Model
{

    function cari_warga($nik)
    {
        $this->db->where('nik', $nik);
        $this->db->or_where('md5(id_warga)', $nik);
        return $this->db->get('tb_warga');
    }

    function tampil_warga()
    {
        return $this->db->get('tb_warga');
    }

    function tampil_warga_aktif()
    {
        $this->db->where('status', 1);
        return $this->db->get('tb_warga');
    }

    function tambah_warga($data)
    {
        return $this->db->insert('tb_warga', $data);
    }

    function detail_warga($id)
    {
        $this->db->where('md5(id_warga)', $id);
        return $this->db->get('tb_warga');
    }

    function ubah_warga($nik, $data)
    {
        $this->db->where('nik', $nik);
        return $this->db->update('tb_warga', $data);
    }

    function reset_password($id, $data)
    {
        $this->db->where('md5(id_warga)', $id);
        return $this->db->update('tb_warga', $data);
    }

    function hapus_warga($id)
    {
        $this->db->where('md5(id_warga)', $id);
        return $this->db->delete('tb_warga');
    }
}
