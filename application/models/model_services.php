<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*Programmed By: Reza Nur Rochmat
*Developed By KOMSI UGM
*CodeIgniter Framework 3.1.2
*Copyright 2016. All Right Reserved
*/

class model_services extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function tampil_layanan(){
		$this->db->select('nama_layanan,jenis_layanan,deskripsi_layanan');
		$query = $this->db->get('layanan');
		return $query->result();
	}
}




?>