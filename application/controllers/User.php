<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
	private $data; 

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function daftar(){		
		$this->load->view('layouts/header', $this->data);
		$this->load->view('daftar_page', $this->data);
		$this->load->view('layouts/footer');
	}

	public function daftarProcess(){
		$full_name = $this->input->post('full_name');
		$email_address = $this->input->post('email_address');
		$password = sha1($this->input->post('password'));
		$confirm_password = sha1($this->input->post('confirm_password'));

		//validation
		//cek email
		$existedEmail = $this->db->query('SELECT * FROM user WHERE email="'.$email_address.'"')->row_array();
		if($existedEmail==null){
			//cek password
			if($password==$confirm_password){
				//daftar
				$this->db->insert('user', array(
					'email' => $email_address,
					'full_name' => $full_name,
					'password' => $password
				));

				$this->load->view('layouts/header', $this->data);
				$this->load->view('daftar_sukses_page', $this->data);
				$this->load->view('layouts/footer');
			}else{
				redirect(site_url('user/daftar?report=1'));
			}
		}else{
			redirect(site_url('user/daftar?report=2'));
		}
	}

	public function masuk(){		
		$this->load->view('layouts/header', $this->data);
		$this->load->view('login_page', $this->data);
		$this->load->view('layouts/footer');
	}

	public function loginProcess(){		
		$email_address = $this->input->post('email_address');
		$password = sha1($this->input->post('password'));

		//cek db
		$existedEmail = $this->db->query('SELECT * FROM user WHERE email="'.$email_address.'"')->row_array();
		if($existedEmail!=null){
			if($existedEmail['password']==$password){
				//cek if active
				if($existedEmail['is_active']==1){
					$this->session->set_userdata('id_user', $existedEmail['id']);
					$this->session->set_userdata('nama_user', $existedEmail['full_name']);

					redirect(site_url('/'));
				}else{
					redirect(site_url('user/masuk?report=3'));
				}
			}else{
				redirect(site_url('user/masuk?report=2'));
			}
		}else{
			redirect(site_url('user/masuk?report=1'));
		}
	}

	public function logout(){
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('nama_user');
		redirect(site_url('/'));
	}
}