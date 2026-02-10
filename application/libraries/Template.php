<?php 
class Template {
protected $_ci;

	function __construct() {
		$this->_ci=&get_instance();	
		}
	function display_admin($template,$data=null) {
		$data['_atas']=$this->_ci->load->view('admin/v_header',$data,true);
		$data['_tengah']=$this->_ci->load->view($template,$data,true);
		$data['_menu']=$this->_ci->load->view('admin/v_sidebar',$data,true);
		$this->_ci->load->view('/admin_view.php',$data);
		}				
}
?>