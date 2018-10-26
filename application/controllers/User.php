<?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
 class User extends CI_Controller {  
      //functions  
      function correo()  
      {  
        $this->load->library('email');

        $this->email->clear();
        $lista = array('13680255@itcuautla.edu.mx', 'manuelaufc@gmail.com', 'manuelaufc@hotmail.com');
        $this->email->to($lista);
        $this->email->from('zazazaxx103@outlook.com');
        $this->email->subject('Here is your info brother');
        $this->email->message('Hi brother, Here is the info you requested.');
        if($this->email->send()) {
            echo "Mesaje enviado";
        }
        else {
            echo $this->email->print_debugger();
        }
        echo "Mensajes enviados";



      }
 }   