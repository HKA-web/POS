<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
	}

	public function index()
	{
		if ($this->session->userdata('uid') !='' && $this->session->userdata('nm') !='' && $this->session->userdata('lv') !='') 
		{ 
			$config['uid']=$this->session->userdata('uid');
			$config['nm']=$this->session->userdata('nm');
			$config['lv']=$this->session->userdata('lv');
			$config['barang']=$this->M_crud->view('barang','kd_barang','ASC')->num_rows();
			$config['kategori']=$this->M_crud->view('kategori','kd_kategori','ASC')->num_rows();
			$config['supplier']=$this->M_crud->view('supplier','kd_supplier','ASC')->num_rows();
			$config['data']=$this->M_crud->statistik_penjualan();
			$query    ="SELECT * FROM view_labarugi ORDER BY tahun DESC LIMIT 5";
			$config['laba']=$this->db->query($query);
			if ($this->session->userdata('lv')=='Admin') 
			{
				$this->template->display_admin('admin/v_home',$config);	
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
		$id=$this->input->post('id');
		$p=$this->input->post('p');

		if ($p=='' || $p==null) 
		{
			$data['userid']=$this->input->post('u');
			$data['nama']=$this->input->post('n');

			$this->M_crud->update($data, 'id', 'user_login', $this->input->post('id'));
		}
		else
		{
			$data['userid']=$this->input->post('u');
			$data['nama']=$this->input->post('n');
			$data['password']=md5($this->input->post('p'));
			
			$this->M_crud->update($data, 'id', 'user_login', $id);
		}
		
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */