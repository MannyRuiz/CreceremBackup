<?php
class Api_model extends CI_Model {

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
                "lugar" => $query[$clave]["lugar"],
                "id_sede" => $query[$clave]["id_sede"]
            );
        }
        return $array;
    }

    public function sedesActivas()
    {
        $this->db->from('sucursales');
        $this->db->order_by("id", "asc");
        $this->db->where("desactivar", 0);
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }

    public function staffCursos()
    {
        $this->db->from('users');
        $this->db->order_by("id", "asc");
        $this->db->where("rol", 5);
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }

    public function crearNuevosEventos()
    {
         $eventos = $this->input->input_stream('ohd');
         $eventos = json_decode($eventos);

         foreach($eventos as $evento) {
            $data = array(
                'curso' => $evento->type,
                'backgroundColor' => $evento->backgroundColor,
                'textColor' => $evento->textColor,
                'id_sede' => $evento->sedeId,
                'fecha_inicio' => $evento->start,
                'fecha_termino' => $evento->end,
                'coachId' => $evento->hostId
            );
            $this->db->insert('eventos', $data);
         }
         return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function deleteimage($id) {
        $this->db->select("url_foto");
        $this->db->from('users');
        $this->db->where("id", $id);
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }

    public function uploadimage($filename, $id)
    {
        $photo_url = "/crecerem/uploads/".$filename;
        $data = array(
            'url_foto' => $photo_url
        );
        $this->db->where('id', $id);
        $this->db->update('users', $data);
        $_SESSION['url'] = $photo_url;
        return "Sede desactivada";
    }

    public function desactivarCiudad() //desactiva (no esta disponible al crear cursos o usuarios, etc) y quita la visualización
    {
        $id = $this->input->input_stream("id");
        $current = $this->input->input_stream("des");
        $vis = 0;
        $des = 0;
        $data = null;

        if($current == 1) {
            $data = array(
                'desactivar' => 0,
                'visualizar' => 1
            );
        } else {
            $data = array(
                'visualizar' => 0,
                'desactivar' => 1
            );
        }
        
        
    
        $this->db->where('id', $id);
        $this->db->update('sucursales', $data);
        return "Sede desactivada";
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