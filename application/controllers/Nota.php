<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH . 'vendor/autoload.php';

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

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

	public function printThermal()
	{
		$this->config->load('printer');

		$kode=$this->uri->segment(3);
		$query 		   ="SELECT a.*,b.*,c.kd_barang,c.nm_barang,d.* FROM penjualan as a iNNER JOIN penjualan_item as b ON a.no_penjualan=b.no_penjualan INNER JOIN barang as c ON b.kd_barang=c.kd_barang iNNER JOIN user_login as d ON d.id=a.userid WHERE a.no_penjualan='$kode'";

        $data = $this->M_crud->view_query($query)->result_array();

		try {
			/* ===== GANTI DENGAN NAMA PRINTER DI WINDOWS ===== */
			$printer_name = $this->config->item('printer_name');

			$connector = new WindowsPrintConnector($printer_name);
            $printer = new Printer($connector);

            if (!$data) {
            	show_error("Data tidak ditemukan");
			}

			$header = $data[0];

			/* ===== HEADER ===== */
			$printer->setJustification(Printer::JUSTIFY_CENTER);
			$printer->setEmphasis(true);
			$printer->text("EXAMPLE PENJUALAN\n");
			$printer->setEmphasis(false);
			$printer->text("Jl. Contoh No.123\n");
			$printer->text("Telp: 08123456789\n");
			$printer->text("------------------------------\n");

			/* ===== INFO ===== */
			$printer->setJustification(Printer::JUSTIFY_LEFT);
			$printer->text("No Nota : ".$header['no_penjualan']."\n");
			$printer->text("Tanggal : ".date('d-m-Y', strtotime($header['tgl_transaksi']))."\n");
			$printer->text("Kasir   : ".$header['nama']."\n");
			$printer->text("Cust    : ".$header['pelanggan']."\n");
			$printer->text("------------------------------\n");

			/* ===== ITEM ===== */
			$total = 0;
			$bayar = isset($header['bayar']) ? $header['bayar'] : 0;
			$kembalian = isset($header['kembalian']) ? $header['kembalian'] : 0;

			foreach ($data as $row) {

				$sub = $row['harga_jual'] * $row['jumlah'];
				$total += $sub;

				// Nama barang
				$printer->text($row['nm_barang']."\n");

				$qty    = $row['jumlah'];
				$harga  = number_format($row['harga_jual']);
				$subtot = number_format($sub);

				// Format kiri dan kanan
				$left  = $qty . " x " . $harga;

				// 32 = lebar kertas
				$line = str_pad($left, 24, " ") . str_pad($subtot, 8, " ", STR_PAD_LEFT) . "\n";

				$printer->text($line);
			}

			/* ===== TOTAL ===== */
			$printer->text("------------------------------\n");
			$printer->setEmphasis(true);

			$line_total = str_pad("TOTAL", 24, " ") 
						. str_pad(number_format($total), 8, " ", STR_PAD_LEFT) 
						. "\n";

			$printer->text($line_total);

			$printer->setEmphasis(false);
			
			/* ===== BAYAR & KEMBALIAN ===== */
			$printer->text("------------------------------\n");
			$printer->setEmphasis(true);

			$line_bayar = str_pad("BAYAR", 24, " ")
						. str_pad(number_format($bayar), 8, " ", STR_PAD_LEFT)
						. "\n";

			$line_kembali = str_pad("KEMBALI", 24, " ")
						. str_pad(number_format($kembalian), 8, " ", STR_PAD_LEFT)
						. "\n";

			$printer->text($line_bayar);
			$printer->text($line_kembali);

			$printer->setEmphasis(false);
			
			$printer->text("------------------------------\n");
			$printer->setJustification(Printer::JUSTIFY_CENTER);
			$printer->text("Terima Kasih\n");
			$printer->text("Barang yang sudah dibeli tidak dapat dikembalikan\n");

			/* ===== CUT ===== */
			$printer->feed(2);
			$printer->cut();
			$printer->close();

			echo "Print berhasil";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }

       
	}

}

/* End of file Nota.php */
/* Location: ./application/controllers/Nota.php */