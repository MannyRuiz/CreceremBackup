<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//ESTE CONTROLADOR ES USADO PARA OBTENER Y MOSTRAR DIFERENTES DATOS DE LA BASE DE DATOS JEJE :D


class GetData extends CI_Controller {

    public function index() {
        echo "hola";
    }

    public function roles()
    {
        $this->load->database();
        $this->load->model("Model_GetData", 'getdata');
        $data['resultado'] = $this->getdata->roles();
        header('Content-Type: application/json');
        echo json_encode($data['resultado']);
    }

}