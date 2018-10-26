<?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
 class Main extends CI_Controller {  
      //functions  
      function login()  
      {  
           //http://localhost/tutorial/codeigniter/main/login  
           $data['title'] = 'CodeIgniter Simple Login Form With Sessions';  
           $this->load->view("login", $data);  
      }  
      function login_validation()  
      {  
           $this->load->library('form_validation');  
           $this->form_validation->set_rules('username', 'Username', 'required');  
           $this->form_validation->set_rules('password', 'Password', 'required');  
           if($this->form_validation->run())  
           {  
                //true  
                $username = $this->input->post('username');  
                $password = $this->input->post('password'); 
                $password = md5($password); 
                //model function 

            /* ******FALTA PONER LOS DATOS DEL USUARIO MANDARLOS A LA SESIÓN PARA MOSTRARLOS******** */

                $this->load->model('main_model');  
                if($this->main_model->can_login($username, $password))  
                {  
                    $datos_usuario = $this->main_model->user_data($username);
                    $session_data = array(  
                        'username' => $username,
                        'logged_in' => true,
                        'user_id' => $datos_usuario[0]['id'],
                        'email' => $datos_usuario[0]['correo'],
                        'name' => $datos_usuario[0]['nombre'],
                        'url' => $datos_usuario[0]['url_foto'],
                        'rol' => $datos_usuario[0]['rol'],
                        'sede' => $datos_usuario[0]['sede']
                    );  
                    $this->session->set_userdata($session_data);  
                    header("Location: http://localhost/crecerem/index.php/calendario");
                    die();
                }  
                else  
                {  
                     $this->session->set_flashdata('error', 'Invalid Username and Password');  
                     header("Location: http://localhost/crecerem/index.php/main/login");
                     die();
                }  
           }  
           else  
           {  
                //false  
                $this->login();  
           }  
      }  
      function enter(){  
           if($this->session->userdata('username') != '')  
           {  
                echo '<h2>Welcome - '.$this->session->userdata('username').'</h2>';  
                echo '<label><a href="'.base_url().'main/logout">Logout</a></label>';  
           }  
           else  
           {  
            header("Location: http://localhost/crecerem/index.php/main/login");
           }  
      }  
      function logout()  
      {  
           $this->session->unset_userdata('username');  
           header("Location: http://localhost/crecerem/index.php/main/login");
      }  


      function prueba() {
        $this->load->database();
        $this->load->model("main_model", 'modelo');
        $data['resultado'] = $this->modelo->user_data("admin");
        
      }
 }   