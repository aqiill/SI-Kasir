<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_users extends CI_Model {
    public function __construct()
    {
        parent:: __construct();
        $this->load->database();
        $this->load->library('form_validation');
    }

    public function daftar($table)
    {
        return $this->db->get($table);
    }

    public function tambah($table,$data)
    {
        return $this->db->insert($table,$data);
    }

    public function edit($table,$data,$id)
    {
        return $this->db->update($table,$data,array('id_user' => $id));
    }

    public function stokedit($table,$totalstok,$id)
    {
        return $this->db->update($table,$totalstok,array('id_user' => $id));
    }

    public function hapus($table,$id)
    {
        return $this->db->delete($table,array('id_user' => $id));
    }

    public function laporan()
    {
        $this->db->select('*');
        $this->db->from('tb_bayar');
        $this->db->join('tb_user', 'tb_bayar.id_user = tb_user.id_user');
        $this->db->order_by('tgl','DESC');
        return $this->db->get();
    }

}

?>