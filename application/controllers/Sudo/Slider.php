<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends MY_Controller {
	private $data; 

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Slider_m');
		$this->data['tab3'] = true;
		$this->isAdminLogin();
	}

	public function index(){
		$this->data['query'] = $this->Slider_m->read(null, 'id', 'DESC');

		$this->load->view('layouts/admin_header', $this->data);
		$this->load->view('sudo/slider_list', $this->data);
		$this->load->view('layouts/admin_footer', $this->data);
	}

	public function tambah(){
		$this->load->view('layouts/admin_header', $this->data);
		$this->load->view('sudo/slider_tambah', $this->data);
		$this->load->view('layouts/admin_footer', $this->data);
	}

	public function tambah_proses(){
		$photoName = gmdate("d-m-y-H-i-s", time()+3600*7).".jpg";
		$config['upload_path'] = './assets/img/slider/';
		$config['allowed_types'] = 'gif||jpg||png||jpeg';
		$config['max_size'] = '2048';
		$config['file_name'] = $photoName;
		$this->load->library('upload',$config);
		if($this->upload->do_upload('foto')){
			$data = array('foto'=>$photoName);
			$insert = $this->Slider_m->create($data);
			if($insert){
				redirect(site_url('sudo/slider/tambah/?balasan=1'));
			}else{
				redirect(site_url('sudo/slider/tambah/?balasan=2'));
			}
		}else{
			redirect(site_url('sudo/slider/tambah/?balasan=3'));
		}	
	}

	public function ubah($id){
		$this->data['query'] = $this->Slider_m->read(array('id'=>$id), null ,null);
		if($this->data['query']->num_rows() > 0){
			$this->data['query'] = $this->data['query']->row_array();

			$this->load->view('layouts/admin_header', $this->data);
			$this->load->view('sudo/slider_ubah', $this->data);
			$this->load->view('layouts/admin_footer', $this->data);
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function ubah_proses($id){
		if($_FILES['foto']['name']!=null OR $_FILES['foto']['name']!=""){
			//upload foto baru
			$photoName = gmdate("d-m-y-H-i-s", time()+3600*7).".jpg";
			$config['upload_path'] = './assets/img/slider/';
			$config['allowed_types'] = 'gif||jpg||png||jpeg';
			$config['max_size'] = '2048';
			$config['file_name'] = $photoName;
			$this->load->library('upload',$config);
			if($this->upload->do_upload('foto')){
				//delete foto sebelumnya
				$query = $this->Slider_m->read(array('id'=>$id), null, null);
				$query = $query->row_array();
				if(file_exists('assets/img/slider/'.$query['foto'])){
					unlink('assets/img/slider/'.$query['foto']);
				}

				$data = array('foto'=>$photoName);
				$update = $this->Slider_m->update(array('id'=>$id), $data);
				if($update){
					redirect(site_url('sudo/slider/ubah/'.$id.'/?balasan=1'));
				}else{
					redirect(site_url('sudo/slider/ubah/'.$id.'/?balasan=2'));
				}
			}else{
				redirect(site_url('sudo/slider/ubah/'.$id.'/?balasan=3'));
			}
		}else{
			redirect(site_url('sudo/slider/ubah/'.$id.'/'));
		}	
	}

	public function hapus($id){
		$query = $this->Slider_m->read(array('id'=>$id), null, null);
		if($query->num_rows() > 0){
			//delete foto sebelumnya
			$query = $this->Slider_m->read(array('id'=>$id), null, null);
			$query = $query->row_array();
			if(file_exists('assets/img/slider/'.$query['foto'])){
				unlink('assets/img/slider/'.$query['foto']);
			}
			$delete = $this->Slider_m->delete(array('id'=>$id));
			if($delete){
				redirect(site_url('sudo/slider/?balasan=1'));
			}else{
				redirect(site_url('sudo/slider/?balasan=1'));
			}
		}else{
			redirect($_SERVER['HTTP_REFERER']);	
		}
	}
}