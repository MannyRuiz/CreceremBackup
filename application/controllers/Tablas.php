<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tablas extends CI_Controller {
    
    public function index() {
        $this->load->database();
        $this->load->model('Tablas_model', 'tablas');
        $data['datos_alumno'] = $this->tablas->primero();
        //$this->load->view("pruebabd/index", $data);
        $this->load->view("dashboard/table", $data);
    }

    
}