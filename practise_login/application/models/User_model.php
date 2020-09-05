<?php
Class User_model extends CI_Model
{
    /*********Insert data in to table*********/
    function insert($table,$data)
    {
        $this->db->insert($table, $data);
        //echo $this->db->last_query(); die();
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    function auth($email, $password)
   {
      $email=$this->db->escape_str($email);
      $password=$this->db->escape_str($password);
      $this -> db -> select('*')
                 -> from('registration')
                -> where('email', $email)
                -> where('password', md5($password))
                -> limit(1);
      $query = $this -> db -> get();
      if($query -> num_rows() == 1)
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