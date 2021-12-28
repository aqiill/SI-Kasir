<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

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

		$data = $this->m_barang->laporan()->result();

		$data = array(
			'isi'		=> 'laporan/v_daftar',
			'title'		=> 'Laporan',
			'data'		=> $data
		);
		$this->load->view('layout/wrapper',$data);
	}

	public function export()
	{
		$this->form_validation->set_rules('tgl1', 'Tanggal 1', 'required');
		$this->form_validation->set_rules('tgl2', 'Tanggal 2', 'required');

        if ($this->form_validation->run() == FALSE)
        {
        	$this->session->set_flashdata('gagal', validation_errors());
           	redirect(base_url('laporan'));
        }
        else
        {
        	$tgl1 = $this->input->post('tgl1');
        	$tgl2 = $this->input->post('tgl2');

        	$data = $this->m_barang->daftar_pertanggal('tb_bayar',$tgl1,$tgl2)->result();
        	
    		header("Content-type: application/vnd-ms-excel");
			header("Content-Disposition: attachment; filename=Laporan Penjualan.xls");


			echo " 
	<table border=1>
		<tr>
			<th>No</th>
			<th>Petugas</th>
			<th>Tanggal Transaksi</th>
			<th>Jumlah</th>
		</tr>";
		$no=1;
		foreach ($data as $value) {
			echo "
		<tr>
			<td style='text-align:center;'>$no</td>
			<td style='text-align:left;'>$value->nama_user</td>
			<td style='text-align:center;'>$value->tgl</td>
			<td style='text-align:center;'>$value->total</td>
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
	}
}
