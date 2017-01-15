<?php 

class user extends CI_Model{

  function login($nama_member, $password_member){

   $this->db->select('nama_member, password_member');
   $this->db->from('member');
   $this->db->where('nama_member', $nama_member);
   $this->db->where('password_member', $password_member);
   $this->db->limit(1);
 
   $query = $this->db->get();
 
   if($query->num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
  }
  ?>