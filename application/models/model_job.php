<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*Programmed By: Reza Nur Rochmat
*Developed By KOMSI UGM
*CodeIgniter Framework 3.1.2
*Copyright 2016. All Right Reserved
*/

class model_job extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function data($number,$offset){ //Function untuk melimit hasil dari data yang diambil.
		$this->db->select('pekerjaan.nama_pekerjaan,
							pekerjaan.deskripsi_pekerjaan,pekerjaan.lama_pengerjaan, 
							kategori_pekerjaan.nama_kategori_pekerjaan');
		$this->db->where('pekerjaan.kode_kategori_pekerjaan=kategori_pekerjaan.kode_kategori_pekerjaan');
		return $query= $this->db->get('pekerjaan,kategori_pekerjaan',$number,$offset)->result();		
	}
 
	public function jumlah_data(){ //Function untuk menampilkan jumlah data yang ada.
		$this->db->select('pekerjaan.nama_pekerjaan,
							pekerjaan.deskripsi_pekerjaan,pekerjaan.lama_pengerjaan, 
							kategori_pekerjaan.nama_kategori_pekerjaan');
		$this->db->where('pekerjaan.kode_kategori_pekerjaan=kategori_pekerjaan.kode_kategori_pekerjaan');
		return $query= $this->db->get('pekerjaan,kategori_pekerjaan')->num_rows();
	}

}




?>