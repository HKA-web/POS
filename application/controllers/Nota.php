<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nota extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->library('template');
	}

	public function nota_jual()
	{
		$kode=$this->uri->segment(3);
		$query 		   ="SELECT a.*,b.*,c.kd_barang,c.nm_barang,d.* FROM penjualan as a iNNER JOIN penjualan_item as b ON a.no_penjualan=b.no_penjualan INNER JOIN barang as c ON b.kd_barang=c.kd_barang iNNER JOIN user_login as d ON d.id=a.userid WHERE a.no_penjualan='$kode'";

		//memanggil model crud fungsi view_query
		$config['data'] =$this->M_crud->view_query($query);
		//memanggil file v_nota_jual di folder admin
		$this->load->view('admin/v_nota_jual',$config);
	}

	public function nota_beli()
	{
		$kode=$this->input->get('kode');

		$query 		   ="SELECT a.*,b.*,c.kd_barang,c.nm_barang,d.*,e.* FROM pembelian as a iNNER JOIN pembelian_item as b ON a.no_pembelian=b.no_pembelian INNER JOIN barang as c ON b.kd_barang=c.kd_barang iNNER JOIN user_login as d ON d.id=a.userid INNER JOIN supplier as e ON e.kd_supplier=a.kd_supplier WHERE a.no_pembelian='$kode'";

		//memanggil model crud fungsi view_query
		$config['data'] =$this->M_crud->view_query($query);
		//memanggil file v_nota_beli di folder admin
		$this->load->view('admin/v_nota_beli',$config);
	}

}

/* End of file Nota.php */
/* Location: ./application/controllers/Nota.php */