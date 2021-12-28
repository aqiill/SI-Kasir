<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model {
    public function __construct()
    {
        parent:: __construct();
        $this->load->database();
        $this->load->library('form_validation');
    }

    public function login($table,$username,$password)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        return $this->db->get();
        // return $this->db->query($table, array('username' => $username && 'password' =>$password));
    }

    public function edit($table,$data,$id)
    {
        return $this->db->update($table,$data,array('id_user' => $id));
    }
}

?>