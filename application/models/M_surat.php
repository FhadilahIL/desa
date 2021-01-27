<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_surat extends CI_Model
{

    function get_surat()
    {
        return $this->db->get('tb_surat');
    }

    function tampil_surat()
    {
        $this->db->join('tb_admin', 'tb_surat.id_admin = tb_admin.id_admin', 'inner');
        return $this->db->get('tb_surat');
    }

    function tambah_surat($data)
    {
        return $this->db->insert('tb_surat', $data);
    }

    function detail_surat($id)
    {
        $this->db->where('md5(id_surat)', $id);
        return $this->db->get('tb_surat');
    }

    function ubah_surat($id, $data)
    {
        $this->db->where('md5(id_surat)', $id);
        return $this->db->update('tb_surat', $data);
    }

    function hapus_surat($id)
    {
        $this->db->where('md5(id_surat)', $id);
        return $this->db->delete('tb_surat');
    }
}
