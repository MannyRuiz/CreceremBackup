<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterNewUsers extends CI_Controller {

    public function index() {
        echo "hola";
    }

    public function registrar()
    {
        $this->load->database();
        $this->load->model("user_register_model", 'registrarUsuario');
        $data['resultado'] = $this->registrarUsuario->RegisterNewUser();
        header('Content-Type: text/html');
        echo $data['resultado'];
    }

}