<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->library('template');
	}
	public function index()
	{
		if ($this->session->userdata('uid') !='' && $this->session->userdata('nm') !='' && $this->session->userdata('lv') !='') 
		{
			//memanggil model crud fungsi view
			$config['data']=$this->M_crud->view('barang','kd_barang','DESC');
			$config['sup']=$this->M_crud->view('supplier','kd_supplier','DESC');
			$config['date']=date('Y-m-d');
			$config['uid']=$this->session->userdata('uid');
			$config['nm']=$this->session->userdata('nm');
			$config['lv']=$this->session->userdata('lv');
			//memanggil model crud fungsi view_query
			$query 		    ="SELECT a.nm_barang,a.harga_beli,a.harga_jual,a.diskon,a.stok,a.keterangan,a.kd_kategori,b.* FROM barang as a INNER JOIN tmp_pembelian as b ON a.kd_barang=b.kd_barang ORDER BY b.id DESC";
			
			$config['tmp'] 	=$this->M_crud->view_query($query);		
			//menggunakan library template
			$this->template->display_admin('admin/v_pembelian',$config); 
		}
		else
		{
			redirect('administrator','refresh');
		}
	}
	public function tambah()
	{
		//definisi variabel
		$config['kd_barang']=$this->input->post('kode');
		$config['harga_beli']=$this->input->post('beli');
		$config['qty']=$this->input->post('stk');

		//CEK APAKAH ADA KODE BARANG YANG SAMA DI KERANJANG
		$get_id=$this->input->post('kode');
		$query = $this->M_crud->view_data_where('tmp_pembelian','kd_barang',$get_id);
		$cek=$query->num_rows();
		$data=$query->row();

		if ($cek >= 1) 
		{
			//update stock di keranjang
			$jumlah_baru['qty']= $data->qty + $this->input->post('stk');
			//memanggil model crud fungsi update
			$this->M_crud->update($jumlah_baru, 'kd_barang', 'tmp_pembelian', $get_id);
		}
		else
		{
			//memanggil model crud fungsi insert
			$this->M_crud->insert($config, 'tmp_pembelian');
		}
	}
	public function edit_tmp()
	{
		//definisi variabel
		$get_id=$this->input->post('kode');
		//memanggil model M_crud fungsi view_data_where
		$query = $this->M_crud->view_data_where('tmp_pembelian','kd_barang',$get_id);
		$cek=$query->num_rows();
		$data=$query->row();

		if ($cek >= 1) 
		{
			$jumlah_baru['qty']= $data->qty + $this->input->post('qty');
			//memanggil model crud fungsi update
			$this->M_crud->update($jumlah_baru, 'kd_barang', 'tmp_pembelian', $get_id);
		}
	}
	public function data_keranjang_beli()
	{
		//Membuat query baru 
		$query 		="SELECT a.*,b.* FROM barang as a INNER JOIN tmp_pembelian as b ON a.kd_barang=b.kd_barang ORDER BY b.id DESC";
		//Membat query baru ke 2
		$query2 	="SELECT a.nm_barang,a.harga_beli,a.harga_jual,a.diskon,a.stok,a.keterangan,a.kd_kategori,b.* FROM barang as a INNER JOIN tmp_pembelian as b ON a.kd_barang=b.kd_barang WHERE b.qty!=0 ORDER BY b.id DESC";
		//Memanggil model M_crud  fungdi view_query
		$sql2		=$this->M_crud->view_query($query);
		//Menhitung jumlah baris yang ditemukan pada sql2
		$cek=$sql2->num_rows();

		if ($cek>=1) 
		{
			//Menghapus barang di tmp_pembelian yang jumlah qty=0
			$qry="DELETE FROM tmp_pembelian WHERE qty=0";
			$this->db->query($qry);				
		}

		//memanggil fungsi crud fungsi view_query
		$config['tmp'] 	=$this->M_crud->view_query($query);

		//memanggil file tmp_pembelian di folder data
		$this->load->view('data/tmp_pembelian', $config);
	}
	public function tmp_detail()
	{
		//definisi variabel
		$id=$this->input->get('kode');
		$kd=$this->input->get('brg');

		//memanggil model crud fungsi view_data_where
		$config['data']=$this->M_crud->view_data_where('tmp_pembelian','id',$id);
		//memanggil model crud fungsi view_data_where
		$config['data_stok']=$this->M_crud->view_data_where('barang','kd_barang',$kd);
		
		//memanggil file detail_tmp di folder data
		$this->load->view('data/detail_tmp', $config);
	}
	public function detail_hapus()
	{
		//definisi variabel
		$id=$this->input->get('kode');
		//memanggil fungsi crud fungsi view_data_where
		$config['data']=$this->M_crud->view_data_where('tmp_pembelian','id',$id);

		//memanggil file detail_hapus_tmp_pembelian di folder data
		$this->load->view('data/detail_hapus_tmp_pembelian', $config);
	}
	public function hapus_tmpBRG()
	{
		//definisi variabel
		$kdb=$this->input->post('kdb');
		$where['id']=$this->input->post('kode');

		//memanggil model crud fungsi delete
		$this->M_crud->delete($where,'tmp_pembelian');	
	}
	public function tmp_reset()
	{
		$data=$this->M_crud->view('tmp_pembelian','id','ASC');
	
		$qry="DELETE FROM tmp_pembelian";
		$this->db->query($qry);
	}
	public function tambah_pembelian()
	{
		//definisi variabel
		$kode=$this->M_id->getid("pembelian","no_pembelian");
		$config['no_pembelian']=$kode;
		$config['tgl_transaksi']=$this->input->post('tgl');
		$config['catatan']=$this->input->post('ct');
		$config['kd_supplier']=$this->input->post('sup');
		$config['total']=$this->input->post('t');
		$config['userid']=$this->input->post('uid');

		$this->M_crud->insert($config,'pembelian');

		$data=$this->M_crud->view('tmp_pembelian','id','ASC');
		
		
		foreach ($data->result_array() as $row) 
		{
			$get['no_pembelian']=$kode;
			$get['kd_barang']=$row['kd_barang'];
			$get['harga_beli']=$row['harga_beli'];
			$get['jumlah']=$row['qty'];
			$this->M_crud->insert($get,'pembelian_item');

			$kd_barang=$row['kd_barang'];
		    $jumlah_baru=$row['qty'];
		    $qry="UPDATE barang SET stok=(stok+$jumlah_baru) WHERE kd_barang='$kd_barang'";
		    $this->db->query($qry);
		}
		$qry="DELETE FROM tmp_pembelian";
		$this->db->query($qry);
	}
	public function data_beli()
	{
		$query 		   ="SELECT a.*,b.*,c.* FROM pembelian as a INNER JOIN supplier as b ON a.kd_supplier=b.kd_supplier INNER JOIN user_login as c ON a.userid=c.id ORDER BY a.no_pembelian DESC";
		//memanggil fungsi crud fungsi view_query
		$config['data'] 	=$this->M_crud->view_query($query);

		//memanggil file pembelian di folder data
		$this->load->view('data/pembelian', $config);
	}
	public function btn_simpanTran()
	{

		$data=$this->M_crud->view('tmp_pembelian','id','DESC');
		$st=0;
      	$tot=0;
		foreach ($data->result_array() as $i) {
			$st=$i['harga_beli'] * $i['qty'];
            $tot=$tot + $st;
		}
		if ($data->num_rows()>=1) 
		{
			echo '
				<input type="submit" id="simpan" value="Simpan transaksi" class="btn btn-success btn-flat btn-block">
				<input class="hide" type="text" id="total" value="'.$tot.'">
			';	
		}
		else 
		{
			echo '
			';
		}		
	}
}

/* End of file Pembelian.php */
/* Location: ./application/controllers/Pembelian.php */