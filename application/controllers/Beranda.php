<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_barang');
        $this->load->model('m_login');
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
		date_default_timezone_set('Asia/Jakarta');

		$jlmbarang = $this->m_barang->daftar('tb_barang')->num_rows();

		$barang_hampir_habis = $this->m_barang->daftar_barang_hampir_habis('tb_barang')->num_rows();

		$hariini = date('Y-m-d');
		$data_hariini = $this->m_barang->daftar_hariini('tb_bayar',$hariini)->result();
		$pendapatan=0;
		foreach ($data_hariini as $value) {
			$pendapatan += $value->total;
		}

        $time_sekarang = time();
        $sebulan_sebelumnya = date("Y-m-d", strtotime("-30 days", $time_sekarang));	

		$data_sebulan_sebelumnya = $this->m_barang->daftar_sebulan_sebelumnya('tb_bayar',$sebulan_sebelumnya)->result();
		$pendapatan_sebulan_sebelumnya=0;
		foreach ($data_sebulan_sebelumnya as $value) {
			$pendapatan_sebulan_sebelumnya += $value->total;
		}
		
		$modal = 0;
		$sisamodal = $this->m_barang->daftar('tb_barang')->result();
		foreach ($sisamodal as $value) {
			$modal += $value->harga * $value->stok;
		}

		$data = array(
			'isi'					=> 'beranda',
			'title'					=> 'Beranda',
			'jlmbarang'				=> $jlmbarang,
			'barang_hampir_habis'	=> $barang_hampir_habis,
			'hariini'				=> $pendapatan,
			'modal'					=> $modal,
			'sebulan_sebelumnya'	=> $pendapatan_sebulan_sebelumnya
		);
		$this->load->view('layout/wrapper',$data);
	}

	public function gantipassword()
	{
		$this->form_validation->set_rules('passwordlama', 'kode_barang', 'required|min_length[5]');
		$this->form_validation->set_rules('passwordbaru', 'nama_barang', 'required|min_length[5]');

		if ($this->form_validation->run() == FALSE)
		{
		  $data = array(
		    'isi'                 => 'gantipassword',
		    'title'               => 'Ganti Password'
		  );
		  $this->load->view('layout/wrapper',$data);
		}
		else
		{
		  $id 			= $this->session->userdata('id_user');
		  $password     = $this->session->userdata('password');
		  $passwordlama = $this->input->post('passwordlama');
		  $passwordbaru = $this->input->post('passwordbaru');

		  if ($password != sha1($passwordlama)) {
		    $this->session->set_flashdata('gagal','Password Lama Salah');
		    redirect(base_url('beranda/gantipassword'));
		  }
		  else{
		  	$data = array(
		  		'password' => sha1($passwordbaru)
		  	);
		  	$this->m_login->edit('tb_user',$data,$id);
		  	redirect(base_url('login/logout'));
		  }
		}
	}
}
