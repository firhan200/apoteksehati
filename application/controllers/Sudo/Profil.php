<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends MY_Controller {
	private $data; 

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Profil_m');
		$this->data['tab6'] = true;
		$this->isAdminLogin();
	}

	public function index(){
		$query = $this->Profil_m->read(null, 'id', 'DESC');
		if($query->num_rows() > 0){
			$i=1;
			foreach($query->result() as $result){
				if($i==1){
					$this->data['id'] = $result->id;
					$this->data['foto'] = $result->foto;
					$this->data['teks_profil'] = $result->teks_profil;
				}
				$i++;
			}
		}else{
			$this->data['id'] = null;
			$this->data['foto'] = null;
			$this->data['teks_profil'] = null;
		}

		$this->load->view('layouts/admin_header', $this->data);
		$this->load->view('sudo/profil_ubah', $this->data);
		$this->load->view('layouts/admin_footer', $this->data);
	}

	public function tambah_proses(){
		$teks_profil = $this->input->post('teks_profil');
		if($_FILES['foto']['name']!=null OR $_FILES['foto']['name']!=""){
			//upload foto baru
			$photoName = gmdate("d-m-y-H-i-s", time()+3600*7).".jpg";
			$config['upload_path'] = './assets/img/';
			$config['allowed_types'] = 'gif||jpg||png||jpeg';
			$config['max_size'] = '2048';
			$config['file_name'] = $photoName;
			$this->load->library('upload',$config);
			if($this->upload->do_upload('foto')){
				$data = array('foto'=>$photoName, 'teks_profil'=>$teks_profil);	
				$insert = $this->Profil_m->create($data);
				if($insert){
					redirect(site_url('sudo/profil/?balasan=1'));
				}else{
					redirect(site_url('sudo/profil/?balasan=2'));
				}		
			}else{
				redirect(site_url('sudo/profil/?balasan=3'));
			}
		}
	}

	public function ubah_proses($id){
		$teks_profil = $this->input->post('teks_profil');
		if($_FILES['foto']['name']!=null OR $_FILES['foto']['name']!=""){
			//upload foto baru
			$photoName = gmdate("d-m-y-H-i-s", time()+3600*7).".jpg";
			$config['upload_path'] = './assets/img/';
			$config['allowed_types'] = 'gif||jpg||png||jpeg';
			$config['max_size'] = '2048';
			$config['file_name'] = $photoName;
			$this->load->library('upload',$config);
			if($this->upload->do_upload('foto')){
				//delete foto sebelumnya
				$query = $this->Profil_m->read(array('id'=>$id), null, null);
				$query = $query->row_array();
				if(file_exists('assets/img/'.$query['foto'])){
					unlink('assets/img/'.$query['foto']);
				}

				$data = array('foto'=>$photoName, 'teks_profil'=>$teks_profil);			
			}else{
				redirect(site_url('sudo/profil/?balasan=3'));
			}
		}else{
			$data = array('teks_profil'=>$teks_profil);
		}	

		$update = $this->Profil_m->update(array('id'=>$id), $data);
		if($update){
			redirect(site_url('sudo/profil/?balasan=1'));
		}else{
			redirect(site_url('sudo/profil/?balasan=2'));
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