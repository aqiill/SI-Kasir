<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_users');
        $this->cek_login();
    }

  public function cek_login(){
    if($this->session->userdata('level')!="admin"){
      redirect(base_url());
    }
    elseif(!$this->session->userdata('username')){
      redirect(base_url());
    }
  }
  
	public function index()
	{
		$user = $this->m_users->daftar('tb_user')->result();

		$data = array(
			'isi'		  => 'users/v_daftar',
			'title'		=> 'Users',
			'user'	  => $user
		);
		$this->load->view('layout/wrapper',$data);
	}

	public function tambah()
	{
    $this->form_validation->set_rules('nama_user', 'nama_user', 'required');
		$this->form_validation->set_rules('username', 'username', 'required|is_unique[tb_user.username]');
		$this->form_validation->set_rules('password', 'password', 'required|min_length[5]');
		$this->form_validation->set_rules('email', 'email', 'required');
    $this->form_validation->set_rules('no_wa', 'no_wa', 'required|min_length[11]');
    $this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('level', 'level', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect(base_url('users'));
        }
        else
        {
           $nama_user = $this->input->post('nama_user');
           $username = $this->input->post('username');
           $password 		= $this->input->post('password');
           $email 		= $this->input->post('email');
           $no_wa     = $this->input->post('no_wa');
           $alamat     = $this->input->post('alamat');
           $level 		= $this->input->post('level');

           $data= array(
             'nama_user' => $nama_user,
             'username' 	=> $username,
             'password' 	=> $password,
             'email'     => $email,
             'no_wa'     => $no_wa,
             'alamat' 		=> $alamat,
             'level' 		=> $level
           );

           $this->m_users->tambah('tb_user',$data);
           redirect('users');
        }
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('nama_user', 'nama_user', 'required');
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
    $this->form_validation->set_rules('no_wa', 'no_wa', 'required');
    $this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('level', 'level', 'required');

        if ($this->form_validation->run() == FALSE)
        {
          $this->session->set_flashdata('gagal', validation_errors());
          redirect(base_url('users'));
        }
        else
        {
           $nama_user = $this->input->post('nama_user');
           $username = $this->input->post('username');
           $email 		= $this->input->post('email');
           $no_wa 		= $this->input->post('no_wa');
           $alamat    = $this->input->post('alamat');
           $level    = $this->input->post('level');

           $data= array(
             'nama_user' 	=> $nama_user,
             'username' 	=> $username,
             'email' 			=> $email,
             'no_wa'     => $no_wa,
             'alamat'     => $alamat,
             'level' 		=> $level
           );

           $this->m_users->edit('tb_user',$data,$id);
           redirect('users');
        }
	}

  public function hapus($id)
  {
    $this->m_users->hapus('tb_user',$id);
    redirect('users');
  }
}
