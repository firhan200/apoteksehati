<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan extends MY_Controller {
	private $data; 

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Pekerjaan_m');
		$this->data['tab4'] = true;
		$this->isAdminLogin();
	}

	public function index(){
		$this->data['query'] = $this->Pekerjaan_m->read(null, 'id', 'DESC');

		$this->load->view('layouts/admin_header', $this->data);
		$this->load->view('sudo/pekerjaan_list', $this->data);
		$this->load->view('layouts/admin_footer', $this->data);
	}

	public function tambah(){
		$this->load->view('layouts/admin_header', $this->data);
		$this->load->view('sudo/pekerjaan_tambah', $this->data);
		$this->load->view('layouts/admin_footer', $this->data);
	}

	public function tambah_proses(){
		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
		$photoName = gmdate("d-m-y-H-i-s", time()+3600*7).".jpg";
		$config['upload_path'] = './assets/img/ikon/';
		$config['allowed_types'] = 'gif||jpg||png||jpeg';
		$config['max_size'] = '2048';
		$config['file_name'] = $photoName;
		$this->load->library('upload',$config);
		if($this->upload->do_upload('foto')){
			$data = array('foto'=>$photoName, 'judul'=>$judul, 'isi'=>$isi);
			$insert = $this->Pekerjaan_m->create($data);
			if($insert){
				redirect(site_url('sudo/pekerjaan/tambah/?balasan=1'));
			}else{
				redirect(site_url('sudo/pekerjaan/tambah/?balasan=2'));
			}
		}else{
			redirect(site_url('sudo/pekerjaan/tambah/?balasan=3'));
		}	
	}

	public function ubah($id){
		$this->data['query'] = $this->Pekerjaan_m->read(array('id'=>$id), null ,null);
		if($this->data['query']->num_rows() > 0){
			$this->data['query'] = $this->data['query']->row_array();

			$this->load->view('layouts/admin_header', $this->data);
			$this->load->view('sudo/pekerjaan_ubah', $this->data);
			$this->load->view('layouts/admin_footer', $this->data);
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function ubah_proses($id){
		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
		if($_FILES['foto']['name']!=null OR $_FILES['foto']['name']!=""){
			//upload foto baru
			$photoName = gmdate("d-m-y-H-i-s", time()+3600*7).".jpg";
			$config['upload_path'] = './assets/img/ikon/';
			$config['allowed_types'] = 'gif||jpg||png||jpeg';
			$config['max_size'] = '2048';
			$config['file_name'] = $photoName;
			$this->load->library('upload',$config);
			if($this->upload->do_upload('foto')){
				//delete foto sebelumnya
				$query = $this->Pekerjaan_m->read(array('id'=>$id), null, null);
				$query = $query->row_array();
				if(file_exists('assets/img/ikon/'.$query['foto'])){
					unlink('assets/img/ikon/'.$query['foto']);
				}

				$data = array('foto'=>$photoName, 'judul'=>$judul, 'isi'=>$isi);			
			}else{
				redirect(site_url('sudo/pekerjaan/ubah/'.$id.'/?balasan=3'));
			}
		}else{
			$data = array('judul'=>$judul, 'isi'=>$isi);
		}	

		$update = $this->Pekerjaan_m->update(array('id'=>$id), $data);
		if($update){
			redirect(site_url('sudo/pekerjaan/ubah/'.$id.'/?balasan=1'));
		}else{
			redirect(site_url('sudo/pekerjaan/ubah/'.$id.'/?balasan=2'));
		}
	}

	public function hapus($id){
		$query = $this->Pekerjaan_m->read(array('id'=>$id), null, null);
		if($query->num_rows() > 0){
			//delete foto sebelumnya
			$query = $this->Pekerjaan_m->read(array('id'=>$id), null, null);
			$query = $query->row_array();
			if(file_exists('assets/img/ikon/'.$query['foto'])){
				unlink('assets/img/ikon/'.$query['foto']);
			}

			$delete = $this->Pekerjaan_m->delete(array('id'=>$id));
			if($delete){
				redirect(site_url('sudo/pekerjaan/?balasan=1'));
			}else{
				redirect(site_url('sudo/pekerjaan/?balasan=1'));
			}
		}else{
			redirect($_SERVER['HTTP_REFERER']);	
		}
	}
}