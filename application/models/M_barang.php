<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_barang extends CI_Model {
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

    public function detail($table,$kode_barang)
    {
        return $this->db->get_where($table,array('kode_barang' => $kode_barang));
    }

    public function detailID($table,$id_barang)
    {
        return $this->db->get_where($table,array('id_barang' => $id_barang));
    }

    public function daftar_barang_hampir_habis($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('stok <=', '5');
        return $this->db->get();
    }

    public function daftar_pertanggal($table,$tgl1,$tgl2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join('tb_user', $table.'.id_user = tb_user.id_user');
        $this->db->where('DATE(tgl) >=',$tgl1);
        $this->db->where('DATE(tgl) <=',$tgl2);
        $this->db->order_by('tgl','DESC');
        return $this->db->get();
    }

    public function daftar_hariini($table,$hariini)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('DATE(tgl) >=',$hariini);
        return $this->db->get();
    }

    public function daftar_sebulan_sebelumnya($table,$sebulan_sebelumnya)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('tgl >=',$sebulan_sebelumnya);
        return $this->db->get();
    }

    public function tambah($table,$data)
    {
        return $this->db->insert($table,$data);
    }

    public function edit($table,$data,$id)
    {
        return $this->db->update($table,$data,array('id_barang' => $id));
    }

    public function stokedit($table,$totalstok,$id)
    {
        return $this->db->update($table,$totalstok,array('id_barang' => $id));
    }

    public function hapus($table,$id)
    {
        return $this->db->delete($table,array('id_barang' => $id));
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