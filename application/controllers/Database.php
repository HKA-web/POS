<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Database extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
	}

	public function backup()
	{
		if ($this->session->userdata('uid') !='' && $this->session->userdata('nm') !='' && $this->session->userdata('lv') !='') 
		{
			$config['uid']=$this->session->userdata('uid');
			$config['nm']=$this->session->userdata('nm');
			$config['lv']=$this->session->userdata('lv');
			$config['log_db']=file_get_contents('assets/backup/log_db');
			$config['log_file']=file_get_contents('assets/backup/log_file'); 
			if ($this->session->userdata('lv')=='Admin') 
			{
				//menggunakan library template
				$this->template->display_admin('admin/v_backup',$config);
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
	public function restore()
	{
		if ($this->session->userdata('uid') !='' && $this->session->userdata('nm') !='' && $this->session->userdata('lv') !='') 
		{
			$config['uid']=$this->session->userdata('uid');
			$config['nm']=$this->session->userdata('nm');
			$config['lv']=$this->session->userdata('lv');
			$config['log_res']=file_get_contents('assets/backup/log_res');
			if ($this->session->userdata('lv')=='Admin') 
			{
				//menggunakan library template
				$this->template->display_admin('admin/v_restore',$config);
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
	public function backup_file(){
	//LOG TANGGAL
	$tanggal= date('d-m-Y');
	$log_db = fopen('assets/backup/log_file', 'w');
	fwrite($log_db, $tanggal);
    fclose($log_db);
    //FUNGSI BACKUP DB
	$this->load->library(array('Zip', 'MY_Zip')); // load library zip dan my zip
    $path = 'assets/dist/img/'; // folder yang ingin kita download
    $folder_in_zip = "assets/backup/files";  // tujuan sementara folder zip
    $this->zip->get_files_from_folder($path, $folder_in_zip);
    $this->zip->download('BACKUP-DATA-'.date('m-d-Y').'.zip');
	}
	public function backup_db()
	{
	//LOG TANGGAL
	$tanggal= date('d-m-Y');
	$log_db = fopen('assets/backup/log_db', 'w');
	fwrite($log_db, $tanggal);
    fclose($log_db);
    // Load the DB utility class
	// $this->load->dbutil();
	// $prefs = array(
 //        'format'      => 'zip',             
 //        'filename'    => 'backup.sql'
	// );

	// $backup=$this->dbutil->backup($prefs);
 //  	$db_name = date("d-m-Y") .'.zip'; //NAMAFILENYA
 //  	$save = 'assets/backup/db/'.$db_name;
	// // Load file helper dan menulis ke server untuk keperluan restore
	// $this->load->helper('file');
	// write_file($save, $backup); 
	// Load the download helper dan melalukan download ke komputer
	// $this->load->helper('download');
	// force_download($db_name, $backup);
		exec('c:\WINDOWS\system32\cmd.exe /c START C:\BackupMysql\MySqlBackup.bat');
		echo 'berhasil';
	}

	function restoredb()
	{
	  if (isset($_FILES['files'])) {
	  	//LOG TANGGAL
		$tanggal= date('d-m-Y');
		$log_res = fopen('assets/backup/log_res', 'w');
		fwrite($log_res, $tanggal);
	    fclose($log_res);
	  	$file=$_FILES['files']['tmp_name'];

	  	  $isi_file = file_get_contents($file);
		  $string_query = rtrim( $isi_file, '\n;' );
		  $array_query = explode(';', $string_query);
		  foreach($array_query as $query)
		  {
		    $run=$this->db->query($query);
		  }
		  if ($run) {
		  	redirect('halaman_restore','refresh');
		  }
	  }
	}
	
}

/* End of file Database.php */
/* Location: ./application/controllers/Database.php */