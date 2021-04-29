<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter_m extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function create($data){
		$data['query'] = $this->db->insert('dokter', $data);
		$data['last_id'] = $this->db->insert_id();
		return $data;
	}

	function read($cond, $ordField, $ordType){
		if($cond!=null){
			$this->db->where($cond);
		}
		if($ordField!=null){
			$this->db->order_by($ordField, $ordType);
		}
		$query = $this->db->get('dokter');
		return $query;
	}

	function update($cond, $data){
		$this->db->where($cond);
		$query = $this->db->update('dokter', $data);
		return $query;
	}

	function delete($cond){
		$this->db->where($cond);
		$query = $this->db->delete('dokter');
		return $query;
	}
}