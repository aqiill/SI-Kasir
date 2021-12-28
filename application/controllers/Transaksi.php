<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('cart');
        $this->load->model('m_barang');
        $this->load->model('m_transaksi');
        $this->cek_login();
    }

  public function cek_login(){
    if(!$this->session->userdata('username')){
      redirect(base_url());
    }
    elseif (date('Y-m-d')=='2021-09-17') {
      echo "<center><h1>Lisensi Expired</h1><h4>Hubungi Developer untuk Aktivasi!</h4><a href='https://api.whatsapp.com/send?phone=6283180119574&text=hi%20aqil,%0ASaya%20mau%20Request%20License%20App%20Penjualan' target='v_blank'>Klik disini</><center>";
    }
  }
  
	public function index()
	{

		$data = array(
			'isi'		=> 'transaksi/v_proses',
			'title'		=> 'Barang'
		);
		$this->load->view('layout/wrapper',$data);
	}

	public function keranjang()
	{
		$this->form_validation->set_rules('kode_barang', 'kode_barang', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            redirect('transaksi?kode_barang');
        }
        else
        {
           $kode_barang = $this->input->post('kode_barang');

           $databarang = $this->m_barang->detail('tb_barang',$kode_barang)->row_array();

           $datatransaksi = array(
            'id'      => $databarang['id_barang'],
            'qty'     => 1,
            'price'   => $databarang['harga_jual'],
            'name'    => $databarang['nama_barang']
           );
           // echo "<pre>";
           // print_r($datatransaksi);
           // echo "</pre>";

           $this->cart->insert($datatransaksi);
           redirect('transaksi');
        }
	}

  public function unset($id)
  {
    $data = array(
            'rowid' => $id,
            'qty'   => 0
    );

    $this->cart->update($data);
    redirect('transaksi');
  }

  public function qtykurang($id)
  {
    $qty = $_GET['qty']-1;

    $data = array(
            'rowid' => $id,
            'qty'   => $qty
    );

    $this->cart->update($data);
    redirect('transaksi');
  }

  public function qtytambah($id)
  {
    $qty = $_GET['qty']+1;
    
    $data = array(
            'rowid' => $id,
            'qty'   => $qty
    );

    $this->cart->update($data);
    redirect('transaksi');
  }

  public function pembayaran()
  {
    date_default_timezone_set('Asia/Jakarta');
    $total  = $this->input->post('total');
    $tgl    = date('Y-m-d H:i:s');
    
    if ($total == 0) {
      $this->session->set_flashdata('gagal', 'Tidak Ada Nominal Yang Harus Dibayar!');
      redirect(base_url('transaksi'));
    }
    else{

      foreach ($this->cart->contents() as $value) {
        $barang[] = array(
          'id_barang'  => $value['id'],
          'jumlah'     => $value['qty']
        );
      }

      foreach ($barang as $item) {
          $stok   = $this->m_barang->detailID('tb_barang',$item['id_barang'])->result();

          foreach ($stok as $value) {
            $kurang = $value->stok - $item['jumlah'];
            if ($kurang < 0) {
              $this->session->set_flashdata('gagal','Stock Barang Kurang!');
              redirect(base_url('transaksi'));
            }
            else
            {
              $totalstok = array('stok' => $kurang);
              $edit = $this->m_barang->stokedit('tb_barang',$totalstok,$item['id_barang']);
            }
          }            
      }

      $data = array(
        'id_user'   => $this->session->userdata('id_user'),
        'tgl'       => $tgl,
        'total'     => $total
      );

      $pembayaran = $this->m_transaksi->bayar('tb_bayar',$data);

      if ($pembayaran) {
        $id_bayar   = $this->m_transaksi->transaksi('tb_bayar')->row_array();
        foreach ($this->cart->contents() as $cart) {
          $transaksi[] = array(
            'id_bayar'   => $id_bayar['id_bayar'],
            'id_barang'  => $cart['id'],
            'jumlah'     => $cart['qty']
          );
        }

        $transaksi = $this->m_transaksi->barangdibeli('tb_transaksi',$transaksi);

        if ($transaksi) {
          $this->cart->destroy();
          $this->session->set_flashdata('sukses','Transaksi Berhasil');
          redirect('transaksi');
        }
        else{
          $this->session->set_flashdata('gagal', 'Transaksi Gagal');
          redirect(base_url('transaksi'));
        }
      }
      else{
        $this->session->set_flashdata('gagal','Pembayaran Gagal!');
        redirect(base_url('transaksi'));
      }

    }
  }

}
