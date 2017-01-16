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

	public function tambah_job(){
		$kode_pekerjaan = $this->input->post('kode_pekerjaan');
		$kode_kategori_pekerjaan = $this->input->post('kode_kategori_pekerjaan');
		$kode_member = $this->input->post('kode_member');
		$nama_pekerjaan = $this->input->post('nama_pekerjaan');
		$deskripsi_pekerjaan = $this->input->post('deskripsi_pekerjaan');
		$lama_pengerjaan = $this->input->post('lama_pengerjaan');

		$data = array(
			'kode_pekerjaan' => $kode_pekerjaan,
			'kode_kategori_pekerjaan' => $kode_kategori_pekerjaan,
			'kode_member' => $kode_member,
			'nama_pekerjaan' => $nama_pekerjaan,
			'deskripsi_pekerjaan' => $deskripsi_pekerjaan,
			'lama_pengerjaan' => $lama_pengerjaan

			);

		$this->db->insert('pekerjaan',$data);
	}

	public function tampil_kategori(){
		$this->db->select('kode_kategori_pekerjaan,nama_kategori_pekerjaan');
		$query = $this->db->get('kategori_pekerjaan');
		return $query->result();
	}

	public function tampil_member(){
		$this->db->select('kode_member,nama_member');
		$query = $this->db->get('member');
		return $query->result();
	}

}




?>