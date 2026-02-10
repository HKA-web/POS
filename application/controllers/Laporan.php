<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->library('pdf_report');
		$this->load->library('PHPExcel');
	}
	public function barang()
	{
		if ($this->session->userdata('uid') !='' && $this->session->userdata('nm') !='' && $this->session->userdata('lv') !='') 
		{ 
			$config['uid']=$this->session->userdata('uid');
			$config['nm']=$this->session->userdata('nm');
			$config['lv']=$this->session->userdata('lv');
			if ($this->session->userdata('lv')=='Admin') 
			{
				$query    ="SELECT a.*,b.* FROM barang as a INNER JOIN kategori as b WHERE a.kd_kategori=b.kd_kategori ORDER BY a.kd_barang ASC";
				$config['data']=$this->db->query($query);
				$this->template->display_admin('admin/v_lap_barang',$config);
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
	public function TCPDF_barang()
	{
		$query    ="SELECT a.*,b.* FROM barang as a INNER JOIN kategori as b WHERE a.kd_kategori=b.kd_kategori";
		$config['data']=$this->db->query($query);
		$this->load->view('data/print_barang',$config);
	}
	public function stok_barang()
	{
		if ($this->session->userdata('uid') !='' && $this->session->userdata('nm') !='' && $this->session->userdata('lv') !='') 
		{ 
			$config['uid']=$this->session->userdata('uid');
			$config['nm']=$this->session->userdata('nm');
			$config['lv']=$this->session->userdata('lv');
			$config['data']=$this->M_crud->view('barang','kd_barang','ASC');
			if ($this->session->userdata('lv')=='Admin') 
			{
				//menggunakan library template
				$this->template->display_admin('admin/v_stok_barang',$config);
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
	public function TCPDF_stok_barang()
	{
		$config['data']=$this->M_crud->view('barang','kd_barang','ASC');
		$this->load->view('data/print_stok_barang',$config);
	}
	public function kategori_barang()
	{
		if ($this->session->userdata('uid') !='' && $this->session->userdata('nm') !='' && $this->session->userdata('lv') !='') 
		{ 
			$config['uid']=$this->session->userdata('uid');
			$config['nm']=$this->session->userdata('nm');
			$config['lv']=$this->session->userdata('lv');
			if ($this->session->userdata('lv')=='Admin') 
			{
				$query    ="SELECT a.*,b.* FROM barang as a INNER JOIN kategori as b WHERE a.kd_kategori=b.kd_kategori";
				$config['data']=$this->db->query($query);
				$config['kat']=$this->M_crud->view('kategori','kd_kategori','ASC');
				$config['param']=null;
				$this->template->display_admin('admin/v_Lap_KatBarang',$config);
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
	public function katBrg_param()
	{
		$kode=$this->input->get('kode');
		if($kode=='' || $kode==null)
		{
			$query    ="SELECT a.*,b.* FROM barang as a INNER JOIN kategori as b ON a.kd_kategori=b.kd_kategori";
			$config['data']=$this->db->query($query);
			$config['param']=$kode;
		}
		else
		{
			$query    ="SELECT a.*,b.* FROM barang as a INNER JOIN kategori as b ON a.kd_kategori=b.kd_kategori WHERE b.kd_kategori='$kode'";
			$config['data']=$this->db->query($query);
			$config['param']=$kode;
		}
		$this->load->view('data/lap_kategori_barang', $config);
	}
	public function TCPDF_kategori_barang()
	{
		$kode=$this->uri->segment(3);
		if ($kode==null) 
		{
			$query    ="SELECT a.*,b.* FROM barang as a INNER JOIN kategori as b ON a.kd_kategori=b.kd_kategori";
			$config['data']=$this->db->query($query);
			$config['param']=$kode;
		}
		else
		{
			$query    ="SELECT a.*,b.* FROM barang as a INNER JOIN kategori as b ON a.kd_kategori=b.kd_kategori WHERE b.kd_kategori='$kode'";
			$config['data']=$this->db->query($query);
			$config['param']=$kode;
		}
		$this->load->view('data/print_kategori_barang', $config);
	}
	public function periode_pembelian()
	{
		if ($this->session->userdata('uid') !='' && $this->session->userdata('nm') !='' && $this->session->userdata('lv') !='') 
		{ 
			$config['uid']=$this->session->userdata('uid');
			$config['nm']=$this->session->userdata('nm');
			$config['lv']=$this->session->userdata('lv');
			if ($this->session->userdata('lv')=='Admin') 
			{
				$query    ="SELECT a.*,b.kd_barang,b.nm_barang,c.* FROM pembelian_item as a INNER JOIN barang  as b ON a.kd_barang=b.kd_barang INNER JOIN pembelian as c ON a.no_pembelian=c.no_pembelian";
				$config['data']=$this->db->query($query);
				$config['param']=null;
				$this->template->display_admin('admin/v_pembelian_periode',$config);
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
	public function periodePem_param()
	{
		$tgl1=$this->input->get('tgl1');
		$tgl2=$this->input->get('tgl2');
		if ($tgl1=='' || $tgl1==null AND $tgl2=='' || $tgl2==null) 
		{
			$query    ="SELECT a.*,b.kd_barang,b.nm_barang,c.* FROM pembelian_item as a INNER JOIN barang  as b ON a.kd_barang=b.kd_barang INNER JOIN pembelian as c ON a.no_pembelian=c.no_pembelian";
			$config['data']=$this->db->query($query);
			$config['param']=$tgl1.'/'.$tgl2;
		}
		else 
		{
			$query    ="SELECT a.*,b.kd_barang,b.nm_barang,c.* FROM pembelian_item as a INNER JOIN barang  as b ON a.kd_barang=b.kd_barang INNER JOIN pembelian as c ON a.no_pembelian=c.no_pembelian WHERE c.tgl_transaksi BETWEEN '$tgl1' AND '$tgl2'";
			$config['data']=$this->db->query($query);	
			$config['param']=$tgl1.'/'.$tgl2;
		}
		$this->load->view('data/lap_periode_pembelian', $config);
	}
	public function TCPDF_periode_pembelian()
	{
		$tgl1=$this->uri->segment(3);
		$tgl2=$this->uri->segment(4);
		if ($tgl1==null and $tgl2==null)
		{
			$query    ="SELECT a.*,b.kd_barang,b.nm_barang,c.* FROM pembelian_item as a INNER JOIN barang  as b ON a.kd_barang=b.kd_barang INNER JOIN pembelian as c ON a.no_pembelian=c.no_pembelian";
			$config['data']=$this->db->query($query);
			$config['param']=null;
		}
		else
		{
			$query    ="SELECT a.*,b.kd_barang,b.nm_barang,c.* FROM pembelian_item as a INNER JOIN barang  as b ON a.kd_barang=b.kd_barang INNER JOIN pembelian as c ON a.no_pembelian=c.no_pembelian WHERE c.tgl_transaksi BETWEEN '$tgl1' AND '$tgl2'";
			$config['data']=$this->db->query($query);
			$config['param']=date('d-m-Y', strtotime($tgl1)).'/'.date('d-m-Y', strtotime($tgl2));
		}
		$this->load->view('data/print_periode_pembelian', $config);
	}
	public function periode_penjualan()
	{
		if ($this->session->userdata('uid') !='' && $this->session->userdata('nm') !='' && $this->session->userdata('lv') !='') 
		{ 
			$config['uid']=$this->session->userdata('uid');
			$config['nm']=$this->session->userdata('nm');
			$config['lv']=$this->session->userdata('lv');
			if ($this->session->userdata('lv')=='Admin') 
			{
				$query    ="SELECT a.*,b.kd_barang,b.nm_barang,c.* FROM penjualan_item as a INNER JOIN barang  as b ON a.kd_barang=b.kd_barang INNER JOIN penjualan as c ON a.no_penjualan=c.no_penjualan";
				$config['data']=$this->db->query($query);
				$config['param']=null;
				$this->template->display_admin('admin/v_penjualan_periode',$config);
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
	public function periodePej_param()
	{
		$tgl1=$this->input->get('tgl1');
		$tgl2=$this->input->get('tgl2');
		if ($tgl1=='' || $tgl1==null AND $tgl2=='' || $tgl2==null) 
		{
			$query    ="SELECT a.*,b.kd_barang,b.nm_barang,c.* FROM penjualan_item as a INNER JOIN barang  as b ON a.kd_barang=b.kd_barang INNER JOIN penjualan as c ON a.no_penjualan=c.no_penjualan";
			$config['data']=$this->db->query($query);
			$config['param']=null;
		}
		else 
		{
			$query    ="SELECT a.*,b.kd_barang,b.nm_barang,c.* FROM penjualan_item as a INNER JOIN barang  as b ON a.kd_barang=b.kd_barang INNER JOIN penjualan as c ON a.no_penjualan=c.no_penjualan WHERE c.tgl_transaksi BETWEEN '$tgl1' AND '$tgl2'";
			$config['data']=$this->db->query($query);	
			$config['param']=$tgl1.'/'.$tgl2;
		}
		$this->load->view('data/lap_periode_penjualan', $config);
	}
	public function TCPDF_periode_penjualan()
	{
		$tgl1=$this->uri->segment(3);
		$tgl2=$this->uri->segment(4);
		if ($tgl1==null and $tgl2==null)
		{
			$query    ="SELECT a.*,b.kd_barang,b.nm_barang,c.* FROM penjualan_item as a INNER JOIN barang  as b ON a.kd_barang=b.kd_barang INNER JOIN penjualan as c ON a.no_penjualan=c.no_penjualan";
			$config['data']=$this->db->query($query);
			$config['param']=null;
		}
		else
		{
			$query    ="SELECT a.*,b.kd_barang,b.nm_barang,c.* FROM penjualan_item as a INNER JOIN barang  as b ON a.kd_barang=b.kd_barang INNER JOIN penjualan as c ON a.no_penjualan=c.no_penjualan WHERE c.tgl_transaksi BETWEEN '$tgl1' AND '$tgl2'";
			$config['data']=$this->db->query($query);	
			$config['param']=date('d-m-Y', strtotime($tgl1)).'/'.date('d-m-Y', strtotime($tgl2));
		}
		$this->load->view('data/print_periode_penjualan', $config);
	}
	public function kategori()
	{
		if ($this->session->userdata('uid') !='' && $this->session->userdata('nm') !='' && $this->session->userdata('lv') !='') 
		{ 
			$config['uid']=$this->session->userdata('uid');
			$config['nm']=$this->session->userdata('nm');
			$config['lv']=$this->session->userdata('lv');
			if ($this->session->userdata('lv')=='Admin') 
			{
				$config['data']=$this->M_crud->view('kategori','kd_kategori','ASC');
				$this->template->display_admin('admin/v_lap_kategori',$config);
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
	public function TCPDF_kategori()
	{
		$config['data']=$this->M_crud->view('kategori','kd_kategori','ASC');
		$this->load->view('data/print_kategori',$config);
	}
	public function supplier()
	{
		if ($this->session->userdata('uid') !='' && $this->session->userdata('nm') !='' && $this->session->userdata('lv') !='') 
		{ 
			$config['uid']=$this->session->userdata('uid');
			$config['nm']=$this->session->userdata('nm');
			$config['lv']=$this->session->userdata('lv');
			if ($this->session->userdata('lv')=='Admin') 
			{
				$config['data']=$this->M_crud->view('supplier','kd_supplier','');
				$this->template->display_admin('admin/v_lap_supplier',$config);
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
	public function TCPDF_supplier()
	{
		$config['data']=$this->M_crud->view('supplier','kd_supplier','');
		$this->load->view('data/print_supplier',$config);
	}
	public function pembelian_perbulan()
	{
		if ($this->session->userdata('uid') !='' && $this->session->userdata('nm') !='' && $this->session->userdata('lv') !='') 
		{ 
			$config['uid']=$this->session->userdata('uid');
			$config['nm']=$this->session->userdata('nm');
			$config['lv']=$this->session->userdata('lv');
			if ($this->session->userdata('lv')=='Admin') 
			{
				$query    ="SELECT a.*,b.kd_barang,b.nm_barang,c.no_pembelian,c.tgl_transaksi,SUBSTRING(c.tgl_transaksi, 1, 4) as tahun FROM pembelian_item as a INNER JOIN barang  as b ON a.kd_barang=b.kd_barang INNER JOIN pembelian as c ON a.no_pembelian=c.no_pembelian ORDER BY tahun ASC";
				$config['data']=$this->db->query($query);	
				$config['param']=null;
				$this->template->display_admin('admin/v_pembelian_perbulan',$config);
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
	public function beliBulan_param()
	{
		$bulan=$this->input->get('bulan');
		$tahun=$this->input->get('tahun');

		if ($bulan=='' or $bulan==null AND $tahun=='' || $tahun==null) 
		{
			$query    ="SELECT a.*,b.kd_barang,b.nm_barang,c.no_pembelian,c.tgl_transaksi,SUBSTRING(c.tgl_transaksi, 1, 4) as tahun FROM pembelian_item as a INNER JOIN barang  as b ON a.kd_barang=b.kd_barang INNER JOIN pembelian as c ON a.no_pembelian=c.no_pembelian ORDER BY tahun ASC";
			$config['data']=$this->db->query($query);	
			$config['param']=null;
		}
		else
		{
			$query    ="SELECT a.*,b.kd_barang,b.nm_barang,c.no_pembelian,c.tgl_transaksi,SUBSTRING(c.tgl_transaksi, 1, 4) as tahun FROM pembelian_item as a INNER JOIN barang  as b ON a.kd_barang=b.kd_barang INNER JOIN pembelian as c ON a.no_pembelian=c.no_pembelian WHERE  SUBSTRING(c.tgl_transaksi,6,2)='$bulan' AND SUBSTRING(c.tgl_transaksi,1,4)='$tahun' ORDER BY tahun ASC";
			$config['data']=$this->db->query($query);
			$config['param']=$bulan.'/'.$tahun;
		}
		$this->load->view('data/lap_pembelian_perbulan', $config);
	}
	public function TCPDF_pembelian_perbulan()
	{
		$bulan=$this->uri->segment(3);
		$tahun=$this->uri->segment(4);
		if ($bulan==null and $tahun==null)
		{
			$query    ="SELECT a.*,b.kd_barang,b.nm_barang,c.no_pembelian,c.tgl_transaksi,SUBSTRING(c.tgl_transaksi, 1, 4) as tahun FROM pembelian_item as a INNER JOIN barang  as b ON a.kd_barang=b.kd_barang INNER JOIN pembelian as c ON a.no_pembelian=c.no_pembelian ORDER BY tahun ASC";
			$config['data']=$this->db->query($query);
			$config['param']=null;
		}
		else
		{
			$query    ="SELECT a.*,b.kd_barang,b.nm_barang,c.no_pembelian,c.tgl_transaksi,SUBSTRING(c.tgl_transaksi, 1, 4) as tahun FROM pembelian_item as a INNER JOIN barang  as b ON a.kd_barang=b.kd_barang INNER JOIN pembelian as c ON a.no_pembelian=c.no_pembelian WHERE  SUBSTRING(c.tgl_transaksi,6,2)='$bulan' AND SUBSTRING(c.tgl_transaksi,1,4)='$tahun' ORDER BY tahun ASC";
			$config['data']=$this->db->query($query);
			$config['param']=$bulan.'/'.$tahun;
		}
		$this->load->view('data/print_pembelian_perbulan', $config);
	}
	public function penjualan_perbulan()
	{
		if ($this->session->userdata('uid') !='' && $this->session->userdata('nm') !='' && $this->session->userdata('lv') !='') 
		{ 
			$config['uid']=$this->session->userdata('uid');
			$config['nm']=$this->session->userdata('nm');
			$config['lv']=$this->session->userdata('lv');
			if ($this->session->userdata('lv')=='Admin') 
			{
				$query    ="SELECT a.*,b.kd_barang,b.nm_barang,c.no_penjualan,c.tgl_transaksi,SUBSTRING(c.tgl_transaksi, 1, 4) as tahun FROM penjualan_item as a INNER JOIN barang  as b ON a.kd_barang=b.kd_barang INNER JOIN penjualan as c ON a.no_penjualan=c.no_penjualan ORDER BY tahun ASC";
				$config['data']=$this->db->query($query);
				$config['param']=null;	
				$this->template->display_admin('admin/v_penjualan_perbulan',$config);
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
	public function jualBulan_param()
	{
		$bulan=$this->input->get('bulan');
		$tahun=$this->input->get('tahun');

		if ($bulan=='' or $bulan==null AND $tahun=='' || $tahun==null) 
		{
			$query    ="SELECT a.*,b.kd_barang,b.nm_barang,c.no_penjualan,c.tgl_transaksi,SUBSTRING(c.tgl_transaksi, 1, 4) as tahun FROM penjualan_item as a INNER JOIN barang  as b ON a.kd_barang=b.kd_barang INNER JOIN penjualan as c ON a.no_penjualan=c.no_penjualan ORDER BY tahun ASC";
			$config['data']=$this->db->query($query);	
			$config['param']=null;
		}
		else
		{
			$query    ="SELECT a.*,b.kd_barang,b.nm_barang,c.no_penjualan,c.tgl_transaksi,SUBSTRING(c.tgl_transaksi, 1, 4) as tahun FROM penjualan_item as a INNER JOIN barang  as b ON a.kd_barang=b.kd_barang INNER JOIN penjualan as c ON a.no_penjualan=c.no_penjualan WHERE  SUBSTRING(c.tgl_transaksi,6,2)='$bulan' AND SUBSTRING(c.tgl_transaksi,1,4)='$tahun' ORDER BY tahun ASC";
			$config['data']=$this->db->query($query);
			$config['param']=$bulan.'/'.$tahun;
		}
		$this->load->view('data/lap_penjualan_perbulan', $config);
	}
	public function TCPDF_penjualan_perbulan()
	{
		$bulan=$this->uri->segment(3);
		$tahun=$this->uri->segment(4);
		if ($bulan==null and $tahun==null)
		{
			$query    ="SELECT a.*,b.kd_barang,b.nm_barang,c.no_penjualan,c.tgl_transaksi,SUBSTRING(c.tgl_transaksi, 1, 4) as tahun FROM penjualan_item as a INNER JOIN barang  as b ON a.kd_barang=b.kd_barang INNER JOIN penjualan as c ON a.no_penjualan=c.no_penjualan ORDER BY tahun ASC";
			$config['data']=$this->db->query($query);	
			$config['param']=null;
		}
		else
		{
			$query    ="SELECT a.*,b.kd_barang,b.nm_barang,c.no_penjualan,c.tgl_transaksi,SUBSTRING(c.tgl_transaksi, 1, 4) as tahun FROM penjualan_item as a INNER JOIN barang  as b ON a.kd_barang=b.kd_barang INNER JOIN penjualan as c ON a.no_penjualan=c.no_penjualan WHERE  SUBSTRING(c.tgl_transaksi,6,2)='$bulan' AND SUBSTRING(c.tgl_transaksi,1,4)='$tahun' ORDER BY tahun ASC";
			$config['data']=$this->db->query($query);
			$config['param']=$bulan.'/'.$tahun;
		}
		$this->load->view('data/print_penjualan_perbulan', $config);
	}
	public function PHPExcel_barang()
	{
		$query    ="SELECT a.*,b.* FROM barang as a INNER JOIN kategori as b WHERE a.kd_kategori=b.kd_kategori";
		$config['data']=$this->db->query($query);
		$this->load->view('data/excel_barang',$config);
	}
	public function PHPExcel_stok_barang()
	{
		$config['data']=$this->M_crud->view('barang','kd_barang','ASC');
		$this->load->view('data/excel_stok_barang',$config);
	}
	public function PHPExcel_kategori()
	{
		$config['data']=$this->M_crud->view('kategori','kd_kategori','ASC');
		$this->load->view('data/excel_kategori',$config);
	}
	public function PHPExcel_supplier()
	{
		$config['data']=$this->M_crud->view('supplier','kd_supplier','');
		$this->load->view('data/excel_supplier',$config);
	}
	public function PHPExcel_kategori_barang()
	{
		$kode=$this->uri->segment(3);
		if ($kode==null) 
		{
			$query    ="SELECT a.*,b.* FROM barang as a INNER JOIN kategori as b ON a.kd_kategori=b.kd_kategori";
			$config['data']=$this->db->query($query);
			$config['param']=$kode;
		}
		else
		{
			$query    ="SELECT a.*,b.* FROM barang as a INNER JOIN kategori as b ON a.kd_kategori=b.kd_kategori WHERE b.kd_kategori='$kode'";
			$config['data']=$this->db->query($query);
			$config['param']=$kode;
		}
		$this->load->view('data/excel_kategori_barang', $config);
	}
	public function PHPExcel_periode_pembelian()
	{
		$tgl1=$this->uri->segment(3);
		$tgl2=$this->uri->segment(4);
		if ($tgl1==null and $tgl2==null)
		{
			$query    ="SELECT a.*,b.kd_barang,b.nm_barang,c.* FROM pembelian_item as a INNER JOIN barang  as b ON a.kd_barang=b.kd_barang INNER JOIN pembelian as c ON a.no_pembelian=c.no_pembelian";
			$config['data']=$this->db->query($query);
			$config['param']=null;
		}
		else
		{
			$query    ="SELECT a.*,b.kd_barang,b.nm_barang,c.* FROM pembelian_item as a INNER JOIN barang  as b ON a.kd_barang=b.kd_barang INNER JOIN pembelian as c ON a.no_pembelian=c.no_pembelian WHERE c.tgl_transaksi BETWEEN '$tgl1' AND '$tgl2'";
			$config['data']=$this->db->query($query);
			$config['param']=date('d-m-Y', strtotime($tgl1)).'/'.date('d-m-Y', strtotime($tgl2));
		}
		$this->load->view('data/excel_periode_pembelian', $config);
	}
	public function PHPExcel_pembelian_perbulan()
	{
		$bulan=$this->uri->segment(3);
		$tahun=$this->uri->segment(4);
		if ($bulan==null and $tahun==null)
		{
			$query    ="SELECT a.*,b.kd_barang,b.nm_barang,c.no_pembelian,c.tgl_transaksi,SUBSTRING(c.tgl_transaksi, 1, 4) as tahun FROM pembelian_item as a INNER JOIN barang  as b ON a.kd_barang=b.kd_barang INNER JOIN pembelian as c ON a.no_pembelian=c.no_pembelian ORDER BY tahun ASC";
			$config['data']=$this->db->query($query);
			$config['param']=null;
		}
		else
		{
			$query    ="SELECT a.*,b.kd_barang,b.nm_barang,c.no_pembelian,c.tgl_transaksi,SUBSTRING(c.tgl_transaksi, 1, 4) as tahun FROM pembelian_item as a INNER JOIN barang  as b ON a.kd_barang=b.kd_barang INNER JOIN pembelian as c ON a.no_pembelian=c.no_pembelian WHERE  SUBSTRING(c.tgl_transaksi,6,2)='$bulan' AND SUBSTRING(c.tgl_transaksi,1,4)='$tahun' ORDER BY tahun ASC";
			$config['data']=$this->db->query($query);
			$config['param']=$bulan.'/'.$tahun;
		}
		$this->load->view('data/excel_pembelian_perbulan', $config);
	}
	public function PHPExcel_periode_penjualan()
	{
		$tgl1=$this->uri->segment(3);
		$tgl2=$this->uri->segment(4);
		if ($tgl1==null and $tgl2==null)
		{
			$query    ="SELECT a.*,b.kd_barang,b.nm_barang,c.* FROM penjualan_item as a INNER JOIN barang  as b ON a.kd_barang=b.kd_barang INNER JOIN penjualan as c ON a.no_penjualan=c.no_penjualan";
			$config['data']=$this->db->query($query);
			$config['param']=null;
		}
		else
		{
			$query    ="SELECT a.*,b.kd_barang,b.nm_barang,c.* FROM penjualan_item as a INNER JOIN barang  as b ON a.kd_barang=b.kd_barang INNER JOIN penjualan as c ON a.no_penjualan=c.no_penjualan WHERE c.tgl_transaksi BETWEEN '$tgl1' AND '$tgl2'";
			$config['data']=$this->db->query($query);	
			$config['param']=date('d-m-Y', strtotime($tgl1)).'/'.date('d-m-Y', strtotime($tgl2));
		}
		$this->load->view('data/excel_periode_penjualan', $config);
	}
	public function PHPExcel_penjualan_perbulan()
	{
		$bulan=$this->uri->segment(3);
		$tahun=$this->uri->segment(4);
		if ($bulan==null and $tahun==null)
		{
			$query    ="SELECT a.*,b.kd_barang,b.nm_barang,c.no_penjualan,c.tgl_transaksi,SUBSTRING(c.tgl_transaksi, 1, 4) as tahun FROM penjualan_item as a INNER JOIN barang  as b ON a.kd_barang=b.kd_barang INNER JOIN penjualan as c ON a.no_penjualan=c.no_penjualan ORDER BY tahun ASC";
			$config['data']=$this->db->query($query);	
			$config['param']=null;
		}
		else
		{
			$query    ="SELECT a.*,b.kd_barang,b.nm_barang,c.no_penjualan,c.tgl_transaksi,SUBSTRING(c.tgl_transaksi, 1, 4) as tahun FROM penjualan_item as a INNER JOIN barang  as b ON a.kd_barang=b.kd_barang INNER JOIN penjualan as c ON a.no_penjualan=c.no_penjualan WHERE  SUBSTRING(c.tgl_transaksi,6,2)='$bulan' AND SUBSTRING(c.tgl_transaksi,1,4)='$tahun' ORDER BY tahun ASC";
			$config['data']=$this->db->query($query);
			$config['param']=$bulan.'/'.$tahun;
		}
		$this->load->view('data/excel_penjualan_perbulan', $config);
	}
}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */