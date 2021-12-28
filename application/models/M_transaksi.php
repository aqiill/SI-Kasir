<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model {
    public function __construct()
    {
        parent:: __construct();
        $this->load->database();
        $this->load->library('form_validation');
    }

    public function bayar($table,$data)
    {
        return $this->db->insert($table,$data);
    }

    public function transaksi($table)
    {
        $this->db->select('id_bayar');
        $this->db->from($table);
        $this->db->order_by('id_bayar', 'DESC');
        return $this->db->get();
    }

    public function barangdibeli($table,$barang)
    {
        return $this->db->insert_batch($table,$barang);
    }

}

?>