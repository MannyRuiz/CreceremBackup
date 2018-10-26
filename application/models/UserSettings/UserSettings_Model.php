<?php  
 class UserSettings_Model extends CI_Model  
 {  
      function can_login($username, $password)  
      {  
           $this->db->where('username', $username);  
           $this->db->where('password', $password);  
           $query = $this->db->get('users');  
           //SELECT * FROM users WHERE username = '$username' AND password = '$password'  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;       
           }  
      }

      function user_data($username) {
          $this->db->where('username', $username);
          $query = $this->db->get('users');
          $query = $query->result_array();
          return $query;
      }
 }  
