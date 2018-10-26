<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    /*public function __construct() {
        parent::__construct();
        if($this->session->userdata('username') == null) { 
            //header("Location: http://www.crecerem.com");
        }
    }*/

    public function generador() {
        $this->load->view("header");
        $this->load->view("generador_eventos/index");
        $this->load->view("footer");
        //$this->load->view("calendario");
    }

    public function deleteimage() {
        $this->load->database();
        $this->load->model('Api_model', 'api');
        $id = $this->session->userdata('user_id');
        $datass = $this->api->deleteimage($id);
        return $datass[0]['url_foto'];
    }

    function deleteFiles($path){
        if($path != "") {
            unlink("C:/xampp/htdocs".$path);
        } 
    }

    public function uploadimage() {
        $this->load->database();
        $this->load->model('Api_model', 'api');

        $username = $this->session->userdata('username');
        $user_id = $this->session->userdata('user_id');
        $former_photo = $this->deleteimage(); 
        $this->deleteFiles($former_photo);

        $seed = str_split('abcdefghijklmnopqrstuvwxyz'
                 .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                 .'0123456789'); // and any other characters
        shuffle($seed); // probably optional since array_is randomized; this may be redundant
        $rand = '';
        foreach (array_rand($seed, 5) as $k) $rand .= $seed[$k];

        $config['upload_path'] = './uploads/';
        $config['overwrite'] = true;
        $config['file_name'] = $user_id."-".$username."-".$rand;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10000;
        $config['max_width'] = 5000;
        $config['max_height'] = 5000;

        $mssg = "...";

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
                $error = array('error' => $this->upload->display_errors());

                $mssg = "error";
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());

                $mssg = "correcto";
        }
        $error = "error";
        $saved_file_name = $this->upload->data('file_name');
        $error = $saved_file_name;
        $data['sedes'] = $this->api->uploadimage($saved_file_name, $user_id);

        echo $error;
    }

    public function sedes() {
        $this->load->database();
        $this->load->model('Api_model', 'api');
        $data['sedes'] = $this->api->sedesActivas();  
        header('Content-Type: application/json');
        echo json_encode($data['sedes']);
    }

    public function desactivarCiudad() {
        $this->load->database();
        $this->load->model('Api_model', 'api');
        $data['response'] = $this->api->desactivarCiudad();  
        header('Content-Type: text/html');
        echo $data['response'];
    }

    public function creareventos() {
        $this->load->database();
        $this->load->model("Api_model", 'api');
        $data['resultado'] = $this->api->crearNuevosEventos();
        header('Content-Type: text/html');
        echo $data['resultado'];
    }

    public function staffcursos() {
        $this->load->database();
        $this->load->model('Api_model', 'api');
        $data['staff'] = $this->api->staffCursos();  
        header('Content-Type: application/json');
        echo json_encode($data['staff']);
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