<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->driver('session');
		$this->load->helper('url');
	}

	public function isAdminLogin(){
		if($this->session->userdata('iduseradmin')==null){
			redirect(site_url('sudo/admin/login'));
		}
	}

	public function isAdminLogout(){
		if($this->session->userdata('iduseradmin')!=null){
			redirect(site_url('sudo/admin/beranda'));
		}
	}
}
?>