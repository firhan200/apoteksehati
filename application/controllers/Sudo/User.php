<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
	private $data; 

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Slider_m');
		$this->data['tab9'] = true;
		$this->isAdminLogin();
	}

	public function index(){
		$this->data['query'] = $this->db->query('SELECT * FROM user ORDER BY Id DESC');

		$this->load->view('layouts/admin_header', $this->data);
		$this->load->view('sudo/user_list', $this->data);
		$this->load->view('layouts/admin_footer', $this->data);
	}

	public function ubah($id){
		$this->data['query'] = $this->db->query('SELECT * FROM user WHERE id='.$id)->row_array();
		
		if($this->data['query']==null){
			redirect(site_url('/sudo/user'));
		}

		$this->load->view('layouts/admin_header', $this->data);
		$this->load->view('sudo/user_ubah', $this->data);
		$this->load->view('layouts/admin_footer', $this->data);
	}

	public function ubah_proses($id){
		$this->data['query'] = $this->db->query('SELECT * FROM user WHERE id='.$id)->row_array();
		
		if($this->data['query']==null){
			redirect(site_url('/sudo/user'));
		}

		//update
		$this->db->where('id', $id);
		$this->db->update('user', array(
			'is_active' => $this->input->post('is_active')=='on' ? 1 : 0
		));

		redirect(site_url('sudo/user/ubah/'.$id.'/?balasan=1'));
	}

	public function hapus($id){
		$query = $this->db->query('SELECT * FROM user WHERE id='.$id);
		if($query->num_rows() > 0){
			$delete = $this->db->delete('user', array('id'=>$id));
			if($delete){
				redirect(site_url('sudo/user/?balasan=1'));
			}else{
				redirect(site_url('sudo/user/?balasan=1'));
			}
		}else{
			redirect($_SERVER['HTTP_REFERER']);	
		}
	}

	public function reset_password($id){
		$this->data['query'] = $this->db->query('SELECT * FROM user WHERE id='.$id)->row_array();
		
		if($this->data['query']==null){
			redirect(site_url('/sudo/user'));
		}

		$this->load->view('layouts/admin_header', $this->data);
		$this->load->view('sudo/user_reset_password', $this->data);
		$this->load->view('layouts/admin_footer', $this->data);
	}

	public function reset_password_proses($id){
		$this->data['query'] = $this->db->query('SELECT * FROM user WHERE id='.$id)->row_array();
		
		if($this->data['query']==null){
			redirect(site_url('/sudo/user'));
		}

		//get data
		$password = sha1($this->input->post('password'));
		$confirm_password = sha1($this->input->post('confirm_password'));

		//validation
		if($password==$confirm_password){
			//update
			$this->db->where('id', $id);
			$this->db->update('user', array(
				'password' => $password,
				'request_reset_password' => null
			));

			redirect(site_url('sudo/user/reset_password/'.$id.'/?balasan=1'));
		}else{
			redirect(site_url('sudo/user/reset_password/'.$id.'/?balasan=2'));
		}
	}
}