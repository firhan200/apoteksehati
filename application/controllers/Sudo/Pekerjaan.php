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
		$photoName2 = gmdate("d-m-y-H-i-s", time()+3600*7)."_2.jpg";

		//upload foto 1
		$foto1Uploaded = false;
		$config['upload_path'] = './assets/img/ikon/';
		$config['allowed_types'] = 'gif||jpg||png||jpeg';
		$config['max_size'] = '2048';
		$config['file_name'] = $photoName;
		$this->load->library('upload',$config);
		$this->upload->initialize($config); 
		if($this->upload->do_upload('foto')){
			$foto1Uploaded = true;
		}else{
			return redirect(site_url('sudo/pekerjaan/tambah/?balasan=3'));
		}	
		//upload foto 1

		//upload foto 2
		$foto2Uploaded = false;
		$config2['upload_path'] = './assets/img/ikon2/';
		$config2['allowed_types'] = 'gif||jpg||png||jpeg';
		$config2['max_size'] = '2048';
		$config2['file_name'] = $photoName2;
		$this->load->library('upload',$config2);
		$this->upload->initialize($config2); 
		if($this->upload->do_upload('foto2')){
			$foto2Uploaded = true;
		}else{
			return redirect(site_url('sudo/pekerjaan/tambah/?balasan=3'));
		}	
		//upload foto 2

		//cek apakah upload foto berhasil
		if($foto1Uploaded && $foto2Uploaded){
			$data = array('foto'=>$photoName, 'foto2'=>$photoName2, 'judul'=>$judul, 'isi'=>$isi);
			$insert = $this->Pekerjaan_m->create($data);
			if($insert){
				redirect(site_url('sudo/pekerjaan/tambah/?balasan=1'));
			}else{
				redirect(site_url('sudo/pekerjaan/tambah/?balasan=2'));
			}
		}else{
			return redirect(site_url('sudo/pekerjaan/tambah/?balasan=3'));
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

		//get old data
		$oldData = $this->db->query('SELECT * FROM pekerjaan WHERE id='.$id)->row_array();
		if($oldData == null){
			return redirect(site_url('sudo/pekerjaan/ubah/'.$id.'/?balasan=2'));
		}

		$photoName = $oldData['foto'];
		$photoName2 = $oldData['foto2'];

		//cek apakah mengubah foto 1
		if($_FILES['foto']['name']!=null OR $_FILES['foto']['name']!=""){
			//upload foto baru
			$photoName = gmdate("d-m-y-H-i-s", time()+3600*7).".jpg";
			$config['upload_path'] = './assets/img/ikon/';
			$config['allowed_types'] = 'gif||jpg||png||jpeg';
			$config['max_size'] = '2048';
			$config['file_name'] = $photoName;
			$this->load->library('upload',$config);
			$this->upload->initialize($config); 
			if($this->upload->do_upload('foto')){
				//delete foto sebelumnya
				$query = $this->Pekerjaan_m->read(array('id'=>$id), null, null);
				$query = $query->row_array();
				if(file_exists('assets/img/ikon/'.$query['foto'])){
					unlink('assets/img/ikon/'.$query['foto']);
				}
			}else{
				return redirect(site_url('sudo/pekerjaan/ubah/'.$id.'/?balasan=3'));
			}
		}

		//cek apakah mengubah foto 2
		if($_FILES['foto2']['name']!=null OR $_FILES['foto2']['name']!=""){
			//upload foto baru
			$photoName2 = gmdate("d-m-y-H-i-s", time()+3600*7)."_2.jpg";
			$config2['upload_path'] = './assets/img/ikon2/';
			$config2['allowed_types'] = 'gif||jpg||png||jpeg';
			$config2['max_size'] = '2048';
			$config2['file_name'] = $photoName2;
			$this->load->library('upload',$config2);
			$this->upload->initialize($config2); 
			if($this->upload->do_upload('foto2')){
				//delete foto sebelumnya
				$query = $this->Pekerjaan_m->read(array('id'=>$id), null, null);
				$query = $query->row_array();
				if(file_exists('assets/img/ikon2/'.$query['foto2'])){
					unlink('assets/img/ikon2/'.$query['foto2']);
				}
			}else{
				return redirect(site_url('sudo/pekerjaan/ubah/'.$id.'/?balasan=3'));
			}
		}

		$data = array('foto'=>$photoName, 'foto2'=>$photoName2, 'judul'=>$judul, 'isi'=>$isi);
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