<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{

    function cari_admin($email)
    {
        $this->db->where('email', $email);
        return $this->db->get('tb_admin');
    }

    function tampil_admin()
    {
        return $this->db->get('tb_admin');
    }

    function tampil_admin_aktif()
    {
        $this->db->where('status', 1);
        return $this->db->get('tb_admin');
    }

    function tambah_admin($data)
    {
        return $this->db->insert('tb_admin', $data);
    }

    function detail_admin($id)
    {
        $this->db->where('md5(id_admin)', $id);
        return $this->db->get('tb_admin');
    }

    function ubah_admin($id, $data)
    {
        $this->db->where('md5(id_admin)', $id);
        return $this->db->update('tb_admin', $data);
    }

    function hapus_admin($id)
    {
        $this->db->where('md5(id_admin)', $id);
        return $this->db->delete('tb_admin');
    }
}
