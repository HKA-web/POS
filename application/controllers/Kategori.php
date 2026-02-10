<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

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
			//memanggil fungsi crud fungsi view
			$config['data']=$this->M_crud->view('kategori','kd_kategori','DESC');
			$config['uid']=$this->session->userdata('uid');
			$config['nm']=$this->session->userdata('nm');
			$config['lv']=$this->session->userdata('lv');
			if ($this->session->userdata('lv')=='Admin') 
			{
				//menggunakan library template
				$this->template->display_admin('admin/v_kategori',$config); 
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
		$config['kd_kategori']=$this->input->post('kode');
		$config['nm_kategori']=$this->input->post('nama');
		
		//memanggil model crud fungsi insert
		$this->M_crud->insert($config, 'kategori');
	}
	public function edit()
	{
		//definisi variabel
		$id=$this->input->post('kode');
		$config['kd_kategori']=$this->input->post('kode');
		$config['nm_kategori']=$this->input->post('nama');
		
		//memanggil model crud fungsi update
		$this->M_crud->update($config, 'kd_kategori', 'kategori', $id);
	}
	public function hapus()
	{
		//definisi variabel
		$where['kd_kategori']=$this->input->post('kode');
		
		//memanggil model crud fungsi delete
		$this->M_crud->delete($where,'kategori');	
	}
	public function data_kategori()
	{
		//memanggil fungsi crud fungsi view
		$config['data']=$this->M_crud->view('kategori','kd_kategori','DESC');

		//memanggil file kategori di folder data
		$this->load->view('data/kategori', $config);
	}
	public function detail()
	{
		//definisi variabel
		$id=$this->input->get('kode');

		//memanggil fungsi crud fungsi view_data_where
		$config['data']=$this->M_crud->view_data_where('kategori','kd_kategori',$id);

		//memanggil file detail_kategori di folder data
		$this->load->view('data/detail_kategori', $config);
	}
	public function detail_hapus()
	{
		//definisi variabel
		$id=$this->input->get('kode');

		//memanggil fungsi crud fungsi view_data_where
		$config['data']=$this->M_crud->view_data_where('kategori','kd_kategori',$id);

		//memanggil file detail_kategori di folder data
		$this->load->view('data/detail_hapus_kategori', $config);
	}
}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */