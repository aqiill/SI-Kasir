<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_barang');
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
		$barang = $this->m_barang->daftar('tb_barang')->result();

		$data = array(
			'isi'		=> 'barang/v_daftar',
			'title'		=> 'Barang',
			'barang'	=> $barang
		);
		$this->load->view('layout/wrapper',$data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('kode_barang', 'kode_barang', 'required|alpha_numeric|is_unique[tb_barang.kode_barang]');
		$this->form_validation->set_rules('nama_barang', 'nama_barang', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('stok', 'stok', 'required|numeric');
    $this->form_validation->set_rules('harga', 'harga', 'required|numeric');
		$this->form_validation->set_rules('harga_jual', 'harga jual', 'required|numeric');

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect(base_url('barang'));
        }
        else
        {
           $kode_barang = $this->input->post('kode_barang');
           $nama_barang = $this->input->post('nama_barang');
           $stok 		= $this->input->post('stok');
           $harga     = $this->input->post('harga');
           $harga_jual 		= $this->input->post('harga_jual');

           $data= array(
           		'kode_barang' 	=> $kode_barang,
           		'nama_barang' 	=> $nama_barang,
           		'stok' 			=> $stok,
              'harga'     => $harga,
           		'harga_jual' 		=> $harga_jual
           );

           $this->m_barang->tambah('tb_barang',$data);
           redirect('barang');
        }
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('nama_barang', 'nama_barang', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('stok', 'stok', 'required|numeric');
		$this->form_validation->set_rules('harga', 'harga', 'required|numeric');
    $this->form_validation->set_rules('harga_jual', 'harga jual', 'required|numeric');

        if ($this->form_validation->run() == FALSE)
        {
          $this->session->set_flashdata('gagal', validation_errors());
          redirect('barang');
        }
        else
        {
           $nama_barang = $this->input->post('nama_barang');
           $stok 		= $this->input->post('stok');
           $harga     = $this->input->post('harga');
           $harga_jual 		= $this->input->post('harga_jual');

           $data= array(
           		'nama_barang' 	=> $nama_barang,
           		'stok' 			=> $stok,
              'harga'     => $harga,
           		'harga_jual' 		=> $harga_jual
           );

           $this->m_barang->edit('tb_barang',$data,$id);
           redirect('barang');
        }
	}

  public function download()
  {
      header("Content-type: application/vnd-ms-excel");
      header("Content-Disposition: attachment; filename=Data Barang.xls");
      $data = $this->m_barang->daftar('tb_barang')->result();
          echo " 
      <table border=1>
        <tr>
          <th>No</th>
          <th>Nama Barang</th>
          <th>Kode</th>
          <th>Harga Modal</th>
          <th>Harga Jual</th>
          <th>Barcode</th>
        </tr>";
        $no=1;
        foreach ($data as $value) {
          echo "
        <tr>
          <td style='text-align:center;'>$no</td>
          <td style='text-align:left;'>$value->nama_barang</td>
          <td style='text-align:center;'>$value->kode_barang</td>
          <td style='text-align:center;'>$value->harga</td>
          <td style='text-align:center;'>$value->harga_jual</td>
          <td style='text-align:center;'><img src=".base_url('php-barcode-master/barcode.php?text='.$value->kode_barang)."></td>
        </tr>";
        $no++;
        }
          echo "
      </table>
    </body>
    </html>
          ";
      exit;
  }

  public function print($id_barang)
  {
      $barang = $this->m_barang->detailID('tb_barang',$id_barang)->row_array();

      $data = array(
        'barang'  => $barang,
        'tipe'    => 'per'
      );
      $this->load->view('barang/v_print',$data);
  }

  public function printall()
  {
      $barang = $this->m_barang->daftar('tb_barang')->result();

      $data = array(
        'barang'  => $barang,
        'tipe'    => 'all'
      );
      $this->load->view('barang/v_print',$data);
  }

  public function hapus($id)
  {
    $this->m_barang->hapus('tb_barang',$id);
    redirect('barang');
  }
}
