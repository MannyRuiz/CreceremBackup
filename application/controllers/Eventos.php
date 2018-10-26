<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if($this->session->userdata('username') == null) { 
            header("Location: http://localhost/crecerem/index.php/main/login");
        }
    }

    public function generador() {
        $this->load->view("header");
        $this->load->view("generador_eventos/index");
        $this->load->view("footer");
    }

    public function eventos() {
        $this->load->database();
        $this->load->model('Model_calendar', 'eventos');
        $data['eventos'] = $this->eventos->eventos();  
        header('Content-Type: application/json');
        echo json_encode($data['eventos']);
        //print_r($data['eventos']);
    }

    public function sucursales() {
        $this->load->database();
        $this->load->model("Model_calendar", 'sucursales');
        $data['sucursales'] = $this->sucursales->sucursales();
        header('Content-Type: application/json');
        echo json_encode($data['sucursales']);
    }

    public function nuevaciudad()
    {
        $this->load->database();
        $this->load->model("Model_calendar", 'sucursales');
        $data['resultado'] = $this->sucursales->crearNuevaCiudad();
        header('Content-Type: text/html');
        echo $data['resultado'];
    }

    public function borrarciudad()
    {
        $this->load->database();
        $this->load->model("Model_calendar", 'sucursales');
        $data['resultado'] = $this->sucursales->borrarCiudad();
        header('Content-Type: text/html');
        echo $data['resultado'];
    }

}