<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_login');

    }

	public function proses()
	{
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == FALSE)
        {
			$this->load->view('login');
        }
        else
        {
            // $username = $_POST['username']
           $username 	= $this->input->post('username');
           $password 	= $this->input->post('password');


           $cek = $this->m_login->login('tb_user',$username,sha1($password))->row_array();

           if(count($cek)>0){
           	// print_r($cek['level']);
           	if($cek['level']=="admin"){
           		$data = array(
           			'username' 	=> $cek['username'],
           			'nama_user' => $cek['nama_user'],
                'id_user'   => $cek['id_user'],
           			'password' 	=> sha1($password),
           			'level' 	  => 'admin'
           		);

           		$this->session->set_userdata($data);
           		redirect(base_url('beranda'),'refresh');
           	}
           	elseif($cek['level']=="kasir"){
           		$data = array(
           			'username' 	=> $cek['username'],
           			'nama_user' => $cek['nama_user'],
           			'id_user' 	=> $cek['id_user'],
                'password'  => sha1($password),
           			'level' 	  => 'kasir'
           		);

           		$this->session->set_userdata($data);
           		redirect(base_url('transaksi'),'refresh');
           	}
           	else{
           		$this->session->set_flashdata('gagal','Permasalahan Akun');
           		redirect(base_url());
           	}
           }
           else{
           	$this->session->set_flashdata('gagal','Username atau Password Salah!');
           	redirect(base_url());
           }
        }

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
