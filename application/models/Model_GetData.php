<?php
class Model_GetData extends CI_Model {


    public function eventos()
    {
        $this->db->from('eventos');
        $this->db->order_by("lugar", "desc");
        $query = $this->db->get();
        $query = $query->result_array();
        $array = null;
        $colorTexto = "white";
        foreach($query as $clave => $valor) {
            if($query[$clave]['color'] == "white") {
                $colorTexto = "black";
            }
            $array[$clave] = array(
                "id" => $query[$clave]["id"],
                "title" => $query[$clave]["lugar"] . " - " . $query[$clave]["nombre_evento"],
                "start" => $query[$clave]["fecha_inicio"],
                "end" => $query[$clave]["fecha_termino"],
                "backgroundColor" => $query[$clave]["color"],
                "textColor" => $colorTexto,
                "lugar" => $query[$clave]["lugar"]
            );
        }
        return $array;
    }

    public function roles()
    {
        $this->db->from('roles');
        $this->db->order_by("id", "asc");
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }

    public function crearNuevaCiudad()
    {
        $response = "Success";
        $this->db->where('abbr', $this->input->input_stream("abbr"));
        $query = $this->db->get('sucursales');
        if ($query->num_rows() > 0){
            $response = "Abbr already exists";
        }

        $data = array(
            'nombre' => $this->input->input_stream('nombre'),
            'abbr' => $this->input->input_stream('abbr'),
            'backgroundColor' => $this->input->input_stream('backgroundColor'),
            'visualizar' => 1,
            'desactivar' => 0
        );
    
        if($response == "Success") {
            $this->db->insert('sucursales', $data);
        }
        //return $this->input->input_stream('nombre');
         echo $response;
    }

    public function borrarCiudad()
    {
        $visualizacionActual = $this->input->input_stream("num");
        $visualizacion;
        if($visualizacionActual == 1) {
            $visualizacion = 0;
        } else {
            $visualizacion = 1;
        }

        $id = $this->input->input_stream("id");
        $data = array(
            'visualizar' => $visualizacion
        );
    
        $this->db->where('id', $id);
        $this->db->update('sucursales', $data);
        echo "Visualizacion actualizada";
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