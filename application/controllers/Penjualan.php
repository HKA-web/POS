<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {
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
      $config['data']=$this->M_crud->view('barang','kd_barang','DESC');
      $config['date']=date('Y-m-d');
      $config['uid']=$this->session->userdata('uid');
      $config['nm']=$this->session->userdata('nm');
      $config['lv']=$this->session->userdata('lv');
      //menggunakan library template
      $this->template->display_admin('admin/v_penjualan',$config); 
    }
    else
    {
      redirect('administrator','refresh');
    }
  }
  public function otomatis_field()
  {
    $get_id=$this->input->get('kode');
    $query = $this->M_crud->view_data_where('barang','kd_barang',$get_id);
    $sql=$query->row();

    $data=array(
      'kode' => $sql->kd_barang,
      'nama' => $sql->nm_barang,
      'stok'=> $sql->stok,
      'jual' => $sql->harga_jual - ($sql->harga_jual * $sql->diskon /100),
      'view_jual' => number_format($sql->harga_jual - ($sql->harga_jual * $sql->diskon /100)),
    );
    echo json_encode($data);
  }
  public function tmp_jual()
  {
    //Membuat query baru 
    $query    ="SELECT a.*,b.* FROM barang as a INNER JOIN tmp_penjualan as b ON a.kd_barang=b.kd_barang";
    //Membat query baru ke 2
    $query2   ="SELECT a.nm_barang,a.harga_beli,a.harga_jual,a.diskon,a.stok,a.keterangan,a.kd_kategori,b.* FROM barang as a INNER JOIN tmp_penjualan as b ON a.kd_barang=b.kd_barang WHERE b.qty!=0 ORDER BY b.id DESC";
    //Memanggil model M_crud  fungdi view_query
    $sql2   =$this->M_crud->view_query($query);
    //Menhitung jumlah baris yang ditemukan pada sql2
    $cek=$sql2->num_rows();

    if ($cek>=1) 
    {
      $qry="DELETE FROM tmp_penjualan WHERE qty=0";
      $this->db->query($qry);       
    }

    //memanggil fungsi crud fungsi view_query
    $config['tmp']  =$this->M_crud->view_query($query);
    $config['rows'] =$this->M_crud->view_query($query)->num_rows();
    //memanggil file kategori di folder data
    $this->load->view('data/tmp_penjualan', $config);
  }
  public function simpan()
  {
    $config['kd_barang']=$this->input->post('kode');
    $config['qty']=$this->input->post('qty');
    $config['harga_jual']=$this->input->post('hj');
    
    $qry =$this->M_crud->view_data_where('tmp_penjualan','kd_barang',$this->input->post('kode'));
    $data=$qry->row();

    $qry2 =$this->M_crud->view_data_where('barang','kd_barang',$this->input->post('kode'));
    $data2=$qry2->row();
    if ($qry->num_rows()>=1) 
    {

      if ($data2->stok-($data->qty+$this->input->post('qty'))<0) 
      {
        $hitung=$data2->stok-$data->qty;
        if ($hitung==0) 
        {
          echo 'Stock barang telah habis';  
        }
        else
        {
          echo 'Stock barang tersisa '.abs($hitung);  
        }
        
      }
      else
      {
        $jumlah_baru['qty']=$data->qty + $this->input->post('qty');
    
        //memanggil model crud fungsi update
        $this->M_crud->update($jumlah_baru, 'kd_barang', 'tmp_penjualan', $this->input->post('kode'));
        echo 'berhasil';
      } 
    }
    else
    {

      if ($data2->stok-$this->input->post('qty')<0) 
      {
          $hitung=$data2->stok;
          echo 'Stock barang yang tersisa tidak lebih dari '.abs($hitung);  
      }
      else
      {
        // memanggil model crud fungsi insert
        $this->M_crud->insert($config, 'tmp_penjualan'); 
        echo 'berhasil';
      }
    }
  }
  public function edit()
  {
    $kode=$_POST["kode"];  
    $id = $_POST["id"];  
    $text = $_POST["text"];  
    $column_name = $_POST["column_name"];

    $qry =$this->M_crud->view_data_where('tmp_penjualan','kd_barang',$kode);
    $data=$qry->row();

    $qry2 =$this->M_crud->view_data_where('barang','kd_barang',$kode);
    $data2=$qry2->row();
    
    if ($qry->num_rows()>=1) 
    {

      if ($data2->stok-$text<0) 
      {
        $hitung=$data2->stok-$data->qty;
        echo 'Stock barang yang tersisa '.abs($hitung);  
      }
      else
      {
        $sql = "UPDATE tmp_penjualan SET ".$column_name."='".$text."' WHERE id='".$id."'";  
        $this->db->query($sql);
        echo 'berhasil';
      } 
    }
  }
  public function hapus()
  {
    $where['id'] = $_POST["id"];
    $this->M_crud->delete($where,'tmp_penjualan');
  } 

  public function view_total()
  {
    $query    ="SELECT * FROM tmp_penjualan";
    $data=$this->db->query($query);

    $hitung=0;
    $total=0;

    foreach ($data->result_array() as $i) 
    {
      $hitung=$i['qty'] * $i['harga_jual'];

      $total=$total + $hitung;

    }
    
    echo '
        <p class="pull-left" style="font-size: 50px"><i>TOTAL : </i></p>       
        <p class="pull-right" style="font-size: 50px">Rp.'.number_format($total).',00</p>
        <input type="text" id="total" class="form-control hide" value='.$total.' required/>
    ';
  }
  public function simpanTran()
  {
    $kode=$this->M_id->getid("penjualan","no_penjualan");
    $config['no_penjualan']=$kode;
    $config['tgl_transaksi']=$this->input->post('tgl');
    $config['userid']=$this->input->post('uid');
    $config['pelanggan']=$this->input->post('p');
    $config['catatan']=$this->input->post('ct');
    $config['total']=$this->input->post('t');

    $this->M_crud->insert($config,'Penjualan');

    $data=$this->M_crud->view('tmp_penjualan','id','ASC');
    
    foreach ($data->result_array() as $row) 
    {
      $get['no_penjualan']=$kode;
      $get['kd_barang']=$row['kd_barang'];
      $get['harga_jual']=$row['harga_jual'];
      $get['jumlah']=$row['qty'];
      $this->M_crud->insert($get,'penjualan_item');

      $kd_barang=$row['kd_barang'];
      $jumlah_baru=$row['qty'];
      $qry="UPDATE barang SET stok=(stok-$jumlah_baru) WHERE kd_barang='$kd_barang'";
      $this->db->query($qry);
    }
    $qry="DELETE FROM tmp_penjualan";
    $this->db->query($qry);

    $data=array(
      'kode' => $kode,
    );
    echo json_encode($data);
  }
  public function histori_jual()
  {
    if ($this->session->userdata('uid') !='' && $this->session->userdata('nm') !='' && $this->session->userdata('lv') !='') 
    {
      $query       ="SELECT a.*,b.* FROM penjualan as a INNER JOIN user_login as b ON a.userid=b.id ORDER BY a.no_penjualan DESC ";
      //memanggil fungsi crud fungsi view_query
      $config['data']   =$this->M_crud->view_query($query);
      $config['uid']=$this->session->userdata('uid');
      $config['nm']=$this->session->userdata('nm');
      $config['lv']=$this->session->userdata('lv');
      //menggunakan library template
      $this->template->display_admin('admin/v_histori_jual',$config); 
    }
    else
    {
      redirect('administrator','refresh');
    }
  }
}

/* End of file Penjualan.php */
/* Location: ./application/controllers/Penjualan.php */