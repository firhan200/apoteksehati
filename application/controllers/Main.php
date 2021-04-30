<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {
	private $data; 

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Slider_m');
		$this->load->model('Pekerjaan_m');
		$this->load->model('Profil_m');
		$this->load->model('Foto_m');
		$this->load->model('Dokter_m');
	}

	public function index(){		
		$this->data['tab1'] = true;

		$this->data['query_slider'] = $this->Slider_m->read(null, 'id', 'DESC');
		$this->data['query_pekerjaan'] = $this->Pekerjaan_m->read(null, 'id', 'DESC');
		$query_profil = $this->Profil_m->read(null, 'id', 'DESC');
		$i=1;
		foreach($query_profil->result() as $result){
			if($i==1){
				$this->data['foto'] = $result->foto;
				$this->data['teks_profil'] = $result->teks_profil;
			}
			$i++;
		}
		$this->data['query_foto'] = $this->Foto_m->read(null, 'id', 'DESC');
		$this->data['query_dokter'] = $this->Dokter_m->read(null, 'id', 'DESC');

		$this->load->view('layouts/header', $this->data);
		$this->load->view('home_page', $this->data);
		$this->load->view('layouts/footer');
	}

	public function jadwal($dokterId){		
		$this->data['dokter'] = $this->db->query('SELECT * FROM dokter WHERE id='.$dokterId)->row_array();
		if($this->data['dokter']==null){
			//jadwal dokter not found 
			redirect(site_url('/?report=5'));
		}

		//get comments
		$this->data['comments'] = $this->db->query('SELECT * FROM comment LEFT JOIN user ON user.id=comment.user_id WHERE dokter_id='.$dokterId.' ORDER BY comment.id DESC')->result_array();

		$this->load->view('layouts/header', $this->data);
		$this->load->view('jadwal_page', $this->data);
		$this->load->view('layouts/footer');
	}

	public function post_comment($dokterId){
		$this->data['dokter'] = $this->db->query('SELECT * FROM dokter WHERE id='.$dokterId)->row_array();
		if($this->data['dokter']==null){
			//jadwal dokter not found 
			redirect(site_url('/?report=5'));
		}

		//insert comment
		$this->db->insert('comment', array(
			'user_id' => $this->session->userdata('id_user'),
			'text' => $this->input->post('comment'),
			'dokter_id' => $dokterId
		));

		redirect(site_url('/main/jadwal/'.$dokterId));
	}
}