<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends MY_Controller {
	private $data; 

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Dokter_m');
		$this->data['tab2'] = true;
		$this->isAdminLogin();
	}

	public function index(){
		$this->data['query'] = $this->db->query('SELECT dokter.*, (SELECT COUNT(*) FROM comment WHERE comment.dokter_id=dokter.id) AS total_comment FROM dokter LEFT JOIN comment ON comment.dokter_id=dokter.id GROUP BY dokter.id ORDER BY dokter.id DESC');

		$this->load->view('layouts/admin_header', $this->data);
		$this->load->view('sudo/dokter_list', $this->data);
		$this->load->view('layouts/admin_footer', $this->data);
	}

	public function tambah(){
		$this->load->view('layouts/admin_header', $this->data);
		$this->load->view('sudo/dokter_tambah', $this->data);
		$this->load->view('layouts/admin_footer', $this->data);
	}

	public function tambah_proses(){
		$nama_dokter = $this->input->post('nama_dokter');
		$profesi = $this->input->post('profesi');
		$status = $this->input->post('status');

		$data = array(
				'nama_dokter'=>$nama_dokter,
				'profesi'=>$profesi,
				'status'=>$status
			);
		$insert = $this->Dokter_m->create($data);
		if($insert){
			redirect(site_url('sudo/dokter/tambah/?balasan=1'));
		}else{
			redirect(site_url('sudo/dokter/tambah/?balasan=2'));
		}
	}

	public function ubah($id){
		$this->data['query'] = $this->Dokter_m->read(array('id'=>$id), null ,null);
		if($this->data['query']->num_rows() > 0){
			$this->data['query'] = $this->data['query']->row_array();

			$this->load->view('layouts/admin_header', $this->data);
			$this->load->view('sudo/dokter_ubah', $this->data);
			$this->load->view('layouts/admin_footer', $this->data);
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function detil($id){
		$this->data['query'] = $this->Dokter_m->read(array('id'=>$id), null ,null);
		if($this->data['query']->num_rows() > 0){
			$this->data['query'] = $this->data['query']->row_array();

			$this->data['comments'] = $this->db->query('SELECT comment.*, comment.created_at AS comment_date, user.full_name AS full_name FROM comment LEFT JOIN user ON user.id=comment.user_id WHERE dokter_id='.$id.' ORDER BY comment.id DESC')->result_array();

			$this->load->view('layouts/admin_header', $this->data);
			$this->load->view('sudo/dokter_detil', $this->data);
			$this->load->view('layouts/admin_footer', $this->data);
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function ubah_proses($id){
		$nama_dokter = $this->input->post('nama_dokter');
		$profesi = $this->input->post('profesi');
		$status = $this->input->post('status');

		$data = array(
				'nama_dokter'=>$nama_dokter,
				'profesi'=>$profesi,
				'status'=>$status
			);
		$update = $this->Dokter_m->update(array('id'=>$id), $data);
		if($update){
			redirect(site_url('sudo/dokter/ubah/'.$id.'/?balasan=1'));
		}else{
			redirect(site_url('sudo/dokter/ubah/'.$id.'/?balasan=2'));
		}
	}

	public function hapus($id){
		$query = $this->Dokter_m->read(array('id'=>$id), null, null);
		if($query->num_rows() > 0){
			$delete = $this->Dokter_m->delete(array('id'=>$id));
			if($delete){
				redirect(site_url('sudo/dokter/?balasan=1'));
			}else{
				redirect(site_url('sudo/dokter/?balasan=1'));
			}
		}else{
			redirect($_SERVER['HTTP_REFERER']);	
		}
	}

	public function post_comment($dokterId){
		$this->data['dokter'] = $this->db->query('SELECT * FROM dokter WHERE id='.$dokterId)->row_array();
		if($this->data['dokter']==null){
			//jadwal dokter not found 
			redirect(site_url('/sudo/dokter/detil/'.$dokterId.'?report=5'));
		}

		//insert comment
		$this->db->insert('comment', array(
			'user_id' => $this->session->userdata('iduseradmin'),
			'text' => $this->input->post('comment'),
			'dokter_id' => $dokterId,
			'is_admin' => 1
		));

		redirect(site_url('/sudo/dokter/detil/'.$dokterId.'?report=1'));
	}
}