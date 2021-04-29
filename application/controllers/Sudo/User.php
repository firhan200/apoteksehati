<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
	private $data; 

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Slider_m');
		$this->data['tab3'] = true;
		$this->isAdminLogin();
	}

	public function index(){
		$this->data['query'] = $this->db->query('SELECT * FROM user ORDER BY Id DESC');

		$this->load->view('layouts/admin_header', $this->data);
		$this->load->view('sudo/user_list', $this->data);
		$this->load->view('layouts/admin_footer', $this->data);
	}
}