<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*Programmed By: Reza Nur Rochmat
*Developed By KOMSI UGM
*CodeIgniter Framework 3.1.2
*Copyright 2016. All Right Reserved
*/

class model_dashboard extends CI_Model{
	var $table='member';

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function tampil_kategori(){
		$this->db->select('nama_kategori_pekerjaan');
		$query = $this->db->get('kategori_pekerjaan');
		return $query->result();
	}

	
}

?>