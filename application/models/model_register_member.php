<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*Programmed By: Reza Nur Rochmat
*Developed By KOMSI UGM
*CodeIgniter Framework 3.1.2
*Copyright 2016. All Right Reserved
*/

class model_register_member extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function tambah_member(){
		$kode_member = $this->input->post('kode_member');
		$nama_member = $this->input->post('nama_member');
		$password_member = $this->input->post('password_member');
		$nomor_telepon = $this->input->post('nomor_telepon');
		$jenis_kelamin_member = $this->input->post('jenis_kelamin_member');
		$tanggal_lahir_member = $this->input->post('tanggal_lahir_member');
		$jenis_member = $this->input->post('jenis_member');
		$alamat_member = $this->input->post('alamat_member');

		$data = array(
			'kode_member' => $kode_member,
			'nama_member' => $nama_member,
			'password_member' => $password_member,
			'nomor_telepon' => $nomor_telepon,
			'jenis_kelamin_member' => $jenis_kelamin_member,
			'tanggal_lahir_member' => $tanggal_lahir_member,
			'jenis_member' => $jenis_member,
			'alamat_member' => $alamat_member
			);

		$this->db->insert('member',$data);

	}
}



?>