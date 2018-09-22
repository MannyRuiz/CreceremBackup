<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obtener extends CI_Controller {

    public function index() {
        /*$this->load->database();
        $this->load->model('Tablas_model', 'tablas');
        $data['datos_alumno'] = $this->tablas->primero();
        //$this->load->view("pruebabd/index", $data);
        //$this->load->view("dashboard/table", $data);
        //add the header here
        header('Content-Type: application/json');
        echo json_encode($data['datos_alumno'][0]);*/
    }

    public function hello() {
        $id = $this->input->get('id');
        $this->load->database();
        $this->load->model('Tablas_model', 'tablas');
        $data['materias_tomadas'] = $this->tablas->tablas($id);
        header('Content-Type: application/json');
        echo json_encode($data['materias_tomadas']);
    }
}