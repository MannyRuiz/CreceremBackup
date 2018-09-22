<?php  
 class user_register_model extends CI_Model  
 {  
    function RegisterNewUser()  
    {  
    $response = "Success";
    $data = array(
        'username' => $this->input->input_stream('rUsername'),
        'password' => md5($this->input->input_stream('rPassword')),
        'correo' => $this->input->input_stream('rEmail'),
        'nombre' => $this->input->input_stream('rName'),
        'rol' => $this->input->input_stream("rRol")
    );

    if($response == "Success") {
        $this->db->insert('users', $data);
    }
    //return $this->input->input_stream('nombre');
        echo $response;
    }  
 }  
