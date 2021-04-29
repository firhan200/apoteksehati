<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
	private $data; 

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Admin_m');
	}

	public function login(){
		$this->isAdminLogout();

		$this->load->view('sudo/login_page', $this->data);
	}

	public function loginProcess(){
		$username = $this->input->post('username');
		$password = sha1($this->input->post('password'));
		$query = $this->Admin_m->read(array('username'=>$username, 'password'=>$password), null, null);
		if($query->num_rows() > 0){
			//success
			$query = $query->row_array();
			$id_user = $query['id'];
			$username = $query['username'];
			$this->session->set_userdata('iduseradmin', $id_user);
			$this->session->set_userdata('namauseradmin', $username);

			redirect(site_url('sudo/admin/beranda'));
		}else{
			redirect(site_url('sudo/admin/login?report=2'));
		}
	}

	public function logout(){
		$this->session->unset_userdata('iduseradmin');
		$this->session->unset_userdata('namauseradmin');
		redirect(site_url('sudo/admin/login'));
	}

	public function beranda(){
		$this->isAdminLogin();

		$this->data['tab1'] = true;

		$this->load->view('layouts/admin_header', $this->data);
		$this->load->view('sudo/beranda', $this->data);
		$this->load->view('layouts/admin_footer', $this->data);
	}

	public function ganti_password(){
		$this->isAdminLogin();

		$this->load->view('layouts/admin_header', $this->data);
		$this->load->view('sudo/ganti_password', $this->data);
		$this->load->view('layouts/admin_footer', $this->data);
	}

	public function ganti_password_proses(){
		$password_lama = sha1($this->input->post('old_password'));
		$password_baru = sha1($this->input->post('password'));
		//cek password lama
		$query = $this->Admin_m->read(array('id'=>$this->session->userdata('iduseradmin')), null, null);
		$query = $query->row_array();
		if($query['password']==$password_lama){
			//update
			$data = array('password'=>$password_baru);
			$update = $this->Admin_m->update(array('id'=>$this->session->userdata('iduseradmin')), $data);
			if($update){
				redirect(site_url('sudo/admin/ganti_password/?balasan=1'));
			}else{
				redirect(site_url('sudo/admin/ganti_password/?balasan=2'));
			}
		}else{
			redirect(site_url('sudo/admin/ganti_password/?balasan=3'));
		}
	}
}