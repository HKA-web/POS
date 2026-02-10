<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->library('template');
		$this->load->library('Ciqrcode');
		$this->load->library('Zend');
	}
	public function index()
	{
		if ($this->session->userdata('uid') !='' && $this->session->userdata('nm') !='' && $this->session->userdata('lv') !='') 
		{
			//memanggil fungsi crud fungsi view
			$config['uid']=$this->session->userdata('uid');
			$config['nm']=$this->session->userdata('nm');
			$config['lv']=$this->session->userdata('lv');
			$config['data']=$this->M_crud->view('barang','kd_barang','DESC');
			$config['kat']=$this->M_crud->view('kategori','kd_kategori','DESC');
			if ($this->session->userdata('lv')=='Admin') 
			{
				//menggunakan library template
				$this->template->display_admin('admin/v_barang',$config); 
			}
			else
			{
				redirect('halaman_penjualan','refresh');
			}
			
		}
		else
		{
			redirect('administrator','refresh');
		}
	}
	public function simpan()
	{

		//definisi variabel
		$config['kd_barang']=$this->input->post('kode');
		$config['nm_barang']=$this->input->post('nama');
		$config['harga_beli']=$this->input->post('beli');
		$config['harga_jual']=$this->input->post('jual');
		$config['diskon']=$this->input->post('disc');
		$config['keterangan']=$this->input->post('ktr');
		$config['kd_kategori']=$this->input->post('kkt');
		$config['stok']=$this->input->post('stk');

		// CEK APAKAH ADA KODE YANG SAMA
		$get_id=$this->input->post('kode');
		$query = $this->M_crud->view_data_where('barang','kd_barang',$get_id);
		$cek=$query->num_rows();

		if ($cek >= 1) 
		{
			//memanggil model crud fungsi update
			$this->M_crud->update($config, 'kd_barang', 'barang', $get_id);
		}
		else
		{
			//memanggil model crud fungsi insert
			$this->M_crud->insert($config, 'barang');
		}

		
	}
	public function hapus()
	{
		//definisi variabel
		$where['kd_barang']=$this->input->post('kode');
		
		//memanggil model crud fungsi delete
		$this->M_crud->delete($where,'barang');	
	}
	public function data_barang()
	{
		//memanggil fungsi crud fungsi view
		$config['data']=$this->M_crud->view('barang','kd_barang','DESC');

		//memanggil file kategori di folder data
		$this->load->view('data/barang', $config);
	}
	public function detail_hapus()
	{
		//definisi variabel
		$id=$this->input->get('kode');

		//memanggil fungsi crud fungsi view_data_where
		$config['data']=$this->M_crud->view_data_where('barang','kd_barang',$id);

		//memanggil file detail_kategori di folder data
		$this->load->view('data/detail_hapus_barang', $config);
	}
	public function detail()
	{
		$get_id=$this->input->get('kode');
		$query = $this->M_crud->view_data_where('barang','kd_barang',$get_id);
		$sql=$query->row();

		$data=array(
			'kode' => $sql->kd_barang,
			'nama' => $sql->nm_barang,
			'beli' => $sql->harga_beli,
			'jual' => $sql->harga_jual,
			'stk' => $sql->stok,
			'disc' => $sql->diskon,
			'ktr' => $sql->keterangan,
			'kkt' => $sql->kd_kategori,
		);
		echo json_encode($data);
	}
	public function generate_QRcode($kodenya)
	{
		QRcode::png(
			$kodenya,
			$outfile=false,
			$level=QR_ECLEVEL_H,
			$size=10,
			$margin=1
		);
	}
	public function generate_Barcode($kodenya)
	{
		$this->zend->load('zend/Barcode');
		//generate barcode
		Zend_Barcode::render('Code128','image',array('text' => $kodenya));
	}
	public function Qrcode()
	{
		$kode=$this->input->get('kode');
		echo '
			<center><img src="'.site_url('barang/generate_QRcode/'.$kode).'" width="200px" height="200px"></center>
		';
	}
	public function Barcode()
	{
		$kode=$this->input->get('kode');
		echo '
			<center><img src="'.site_url('barang/generate_Barcode/'.$kode).'" width="180px" height="80px"></center>
		';
	}
}

/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */