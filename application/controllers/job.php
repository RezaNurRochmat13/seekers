<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*Programmed By: Reza Nur Rochmat
*Developed By KOMSI UGM
*CodeIgniter Framework 3.1.2
*Copyright 2016. All Right Reserved
*/

class job extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('model_job');
	}

	public function index(){
		$jumlah_data = $this->model_job->jumlah_data();
	    $config['base_url'] = base_url().'index.php/job/index/';
	    $config['total_rows'] = $jumlah_data;
	    $config['per_page'] = 5;
	    $from = $this->uri->segment(3);

	    //Konfigurasi pagination bootrap
	    $config['full_tag_open'] = '<ul class="pagination">';
	    $config['full_tag_close'] = '</ul>';
	    $config['first_link'] = true;
	    $config['last_link'] = true;
	    $config['first_tag_open'] = '<li>';
	    $config['first_tag_close'] = '</li>';
	    $config['prev_link'] = '&laquo';
	    $config['prev_tag_open'] = '<li class="prev">';
	    $config['prev_tag_close'] = '</li>';
	    $config['next_link'] = '&raquo';
	    $config['next_tag_open'] = '<li>';
	    $config['next_tag_close'] = '</li>';
	    $config['last_tag_open'] = '<li>';
	    $config['last_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="active"><a href="#">';
	    $config['cur_tag_close'] = '</a></li>';
	    $config['num_tag_open'] = '<li>';
	    $config['num_tag_close'] = '</li>';

	    $this->pagination->initialize($config);   
	    $data['job'] = $this->model_job->data($config['per_page'],$from);
		$this->load->view('view_job',$data);
	}

	public function tambah_lowongan(){
		$this->form_validation->set_rules('kode_kategori_pekerjaan','Kode Kategori Pekerjaa','required');
		$this->form_validation->set_rules('kode_member','Kode Member','required');
		$this->form_validation->set_rules('nama_pekerjaan','Nama Pekerjaan','required');
		$this->form_validation->set_rules('deskripsi_pekerjaan','Deskripsi Pekerjaan','required');
		$this->form_validation->set_rules('lama_pengerjaan','Lama Pengerjaan','required');

		if($this->form_validation->run() == FALSE){
			$data['kategori'] = $this->model_job->tampil_kategori();
			$data['member'] = $this->model_job->tampil_member();
			$this->load->view('view_add_job',$data);
		}
		else{
			$this->model_job->tambah_job();
			$sukses = "<div class='alert alert-success'>Data anda berhasil masuk</div>";
			$this->session->set_flashdata("sukses",$sukses);
			redirect('job/index');
		}
	

	}
}


?>