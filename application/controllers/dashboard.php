<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*Programmed By: Reza Nur Rochmat
*Developed By KOMSI UGM
*CodeIgniter Framework 3.1.2
*Copyright 2016. All Right Reserved
*/

class dashboard extends CI_Controller{

	public function __construct(){

	parent::__construct();
	$this->load->helper('url');
	$this->load->model('model_dashboard');

	}

	public function index(){
		/*$data['provinsi'] = $this->model_dashboard->tampil_provinsi();*/
		$data['kategori_pekerjaan'] = $this->model_dashboard->tampil_kategori();
		$this->load->view('view_dashboard',$data);
	}

}


?>