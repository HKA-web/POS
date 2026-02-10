<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_crud extends CI_Model {

	 function __construct() {
			parent:: __construct(); 						
		}

		function view($table,$order,$type){
				$this->db->order_by($order, $type);
				$data = $this->db->get($table);
				return $data;
		}
		function view_query($query){
				$data = $this->db->query($query);
				return $data;
		}

		function view_data_where($table,$where,$id){
				$data = $this->db->get_where($table, array($where => $id));
				return $data;
		}

		function insert($data, $tabel) {
			$add = $this->db->insert($tabel,$data);
			if($add) {
				return TRUE;
			} else {
				return FALSE;
			}
		}

		function update($data, $where, $tabel, $id) {
		 	$this->db->where($where, $id);
		 	$update = $this->db->update($tabel,$data);
		 	if($update) {
				return TRUE;
			} else {
				return FALSE;
			}
		}

        function delete($where,$tabel) {
			$this->db->where($where);
			$delete = $this->db->delete($tabel);
			if($delete) {
				return TRUE;
			} else {
				return FALSE;
			}
		}

		function statistik_penjualan(){
	        $query = $this->db->query("SELECT DATE_FORMAT(tgl_transaksi,'%d') AS tgl,COUNT(no_penjualan) AS jumlah FROM penjualan WHERE MONTH(tgl_transaksi)=MONTH(CURDATE()) GROUP BY DATE(tgl_transaksi)");

	        if($query->num_rows() > 0){
	            foreach($query->result() as $data){
	                $hasil[] = $data;
	            }
	            return $hasil;
	        }
	    }

}

/* End of file M_crud.php */
/* Location: ./application/models/M_crud.php */