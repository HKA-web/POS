<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('m_login');
	}

	public function index()
	{
        if ($this->session->userdata('uid') !='' && $this->session->userdata('nm') !='' && $this->session->userdata('lv') !='') 
        {
		  redirect('halaman_utama','refresh');
        }
        else
        {
          $this->load->view('admin/v_login');  
        }
	}
	public function cek()
	{
		$username=strip_tags(str_replace("'", "", $this->input->post('username')));
        $password=strip_tags(str_replace("'", "", $this->input->post('password')));
        $u=$username;
        $p=$password;
        $data=$this->m_login->cekadmin($u,$p);
        $cek=$data->num_rows();
        if ($cek >=1) 
        {
            $result=$data->row();
            $get_level=$result->level;
            if ($get_level=='Admin')
            {

                $uid       =$result->id;
                $nm        =$result->nama;
                $session_data=array(
                    'uid'=>$uid,
                    'nm'=>$nm,
                    'lv'=>$get_level,

                );
                $this->session->set_userdata($session_data);
                redirect('halaman_utama','refresh');
            }
            else if ($get_level=='Kasir')
            {
                $uid       =$result->id;
                $nm        =$result->nama;
                $session_data=array(
                    'uid'=>$uid,
                    'nm'=>$nm,
                    'lv'=>$get_level,
                );
                $this->session->set_userdata($session_data);
                redirect('halaman_utama','refresh');
            }
        }
        else
        {
         echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Username Atau Password Salah</div>');
         redirect('login');
        }

	}

    public function logout()
    {
        if ($this->session->userdata('uid') !='' && $this->session->userdata('nm') !='' && $this->session->userdata('lv') !='') 
        {
            $this->session->sess_destroy();
            redirect('administrator','refresh');
        }
        else
        {
          redirect('administrator','refresh');
        }    
        
    }
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */