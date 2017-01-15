<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*Programmed By: Reza Nur Rochmat
*Developed By KOMSI UGM
*CodeIgniter Framework 3.1.2
*Copyright 2016. All Right Reserved
*/

class verifylogin extends CI_Controller{

	 public function __construct()
 	{
  		 parent::__construct();
   			$this->load->model('user','',TRUE); //Meload model
        $this->load->helper(array('form','url','security')); //Memanggil fungsi helper
        $this->load->library('session');

        $this->load->library('form_validation'); //Memanggil library form form_validation
	 }
 
	public function index(){
    
		$this->form_validation->set_rules('nama_member','Nama Member','trim|required|xss_clean'); //Struktur pengisian username
		$this->form_validation->set_rules('password_member','Password Member','trim|required|xss_clean|callback_check_database'); //Struktur pengsisian password

		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('view_login','refresh'); // Jika salah login maka diarahkan tetap di halaman login
		}
		else{
			redirect('dashboard/dashboard','refresh'); //Jika benar maka akan diarahkan ke halaman utama
		}
	}
	function check_database($password_member){
   			//Field validation succeeded.  Validate against database
   			$nama_member = $this->input->post('nama_member');
 
  			//query the database
   			$result = $this->user->login($nama_member, $password_member);
 
   			if($result)
  		 		{
     					$sess_array = array();
    						 foreach($result as $row){
     						  $sess_array = array(
                     'nama_member' => $row->nama_member,
                     'logged_in' => TRUE
                     
                  );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return true;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
  }

}
?>