<?php
defined('BASEPATH') or exit('No direct script access allowed');

CLASS CRUDESQL extends CI_MODEL{

    //Departamento de Profesores
    function GetDatos($id){
        $query = 'select * from profesoradogeneral where ID = '.$id;
        $resultado = $this->db->query($query);
        return $resultado->result_array();
    }

    function InserccionGeneral($data){
        $this->db->insert('profesoradogeneral', $data);
    }

    function ActualizarGeneral($ID, $data){
        $this->db->where('ID', $ID);
        $this->db->update('profesoradogeneral', $data); 
    }

    function EliminarDB($id)
    {
        $this->db->query("delete from profesoradogeneral where ID =".$id);
    }


    //Directivo Departamental

    function GetDatosDDD($id){
        $query = 'select * from directivodept where ID = '.$id;
        $resultado = $this->db->query($query);
        return $resultado->result_array();
    }

    function InserccionDDD($data){
        $this->db->insert('directivodept', $data);
    }

    function ActualizarDDD($ID, $data){
        $this->db->where('ID', $ID);
        $this->db->update('directivodept', $data); 
    }

    
    function EliminarDDD($id)
    {
        $this->db->query("delete from directivodept where ID =".$id);
    }

}
?>