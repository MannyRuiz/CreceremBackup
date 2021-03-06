<?php
class Model_Calendar extends CI_Model {


    public function eventos()
    {
        $this->db->select("*, eventos.backgroundColor as bc");
        $this->db->from('eventos');
        $this->db->join('tipo_cursos', 'tipo_cursos.id = eventos.curso');
        $this->db->join('sucursales', 'sucursales.id = eventos.id_sede');
        $this->db->join('users', 'eventos.coachId = users.id');
        $this->db->order_by("lugar", "desc");
        $query = $this->db->get();
        $query = $query->result_array();
        $asd = $query;

        $colorTexto = "white";
        
        foreach($query as $clave => $valor) {
            $array[$clave] = array(
                "id" => $query[$clave]["id"],
                "curso" => $query[$clave]["titulo"],
                "start" => $query[$clave]["fecha_inicio"],
                "end" => $query[$clave]["fecha_termino"],
                "backgroundColor" => $query[$clave]["bc"],
                "textColor" => $query[$clave]["textColor"],
                "id_sede" => $query[$clave]["id_sede"],
                "abbr" => $query[$clave]["abbr"]
            );
        }
        return $array;
    }

    public function hextorgba($color) {
        $default = $color;
        $opacity = true;

        //Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }
        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
            $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }

        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);

        //Check if opacity is set(rgba or rgb)
        if($opacity){
            if(abs($opacity) > 1)
                $opacity = 1.0;
            $output = 'rgba('.implode(",",$rgb).',0.25)';
        } else {
            $output = 'rgb('.implode(",",$rgb).')';
        }

        //Return rgb(a) color string
        return $output;
    }

    public function sucursales()
    {
        $this->db->from('sucursales');
        $this->db->order_by("id", "asc");
        $query = $this->db->get();
        $query = $query->result_array();
        $array = null;
        foreach($query as $clave => $valor) {
            $array[$clave] = array(
                "id" => $query[$clave]["id"],
                "nombre" => $query[$clave]["nombre"],
                "abbr" => $query[$clave]["abbr"],
                "backgroundColor" => $this->hextorgba($query[$clave]["backgroundColor"]),
                "visualizar" => $query[$clave]["visualizar"],
                "desactivar" => $query[$clave]["desactivar"]
            );
        }

        return $array;
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