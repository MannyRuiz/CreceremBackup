<?php
class Tablas_Model extends CI_Model {


    public function primero()
    {
        $query = $this->db->get('datos_alumno');
        return $query->result_array();
    }

    public function tablas($id) {
        $this->db->select('*');
        $this->db->from('materias_tomadas');
        $this->db->join("datos_alumno", "datos_alumno.id = materias_tomadas.id_alumno");
        $this->db->where("id_alumno", $id);
        $query1= $this->db->get();
        $a= $query1->result_array();

        $this->db->select('*');
        $this->db->from('tutores');
        $this->db->where("id_alumno", $id);
        $query2 = $this->db->get();
        $b = $query2->result_array();

        return Array("materias" => $a, "tutores" => $b);
        //return $b;
    }

}