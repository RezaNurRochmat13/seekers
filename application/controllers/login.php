<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*Programmed By: Reza Nur Rochmat
*Developed By KOMSI UGM
*CodeIgniter Framework 3.1.2
*Copyright 2016. All Right Reserved
*/

class login extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
	}

	public function index(){
		$this->load->view('view_login');
	}
}




?>