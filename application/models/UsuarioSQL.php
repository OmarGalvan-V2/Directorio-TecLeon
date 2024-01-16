<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UsuarioSQL extends CI_Model
{

    function Login($Usuario, $Password)
    {   
        $Resultado = $this->db->query("select * from loginadministrativo where Usuario = '" . $Usuario . "' and Password = '" . $Password . "'");
        return $Resultado->result_array(); //Convierte el array en una consulta
    }

    function VisualizacionDCB(){
        $Consulta = 'SELECT p.ID ,p.Nombre, p.Apellido, p.Correo, d.Departamentos, e.Edificio ,IFNULL(p.Cubiculo, "-") AS Cubiculo, t.Turno 
        from profesoradogeneral p 
        INNER JOIN edificiostecnm e on e.ID = p.Edificio 
        INNER JOIN Departamentos d on d.ID = p.Departamento 
        INNER JOIN turnotecnm t on t.ID = p.Turno 
        where d.ID = 1';
        $Resultado = $this->db->query($Consulta);
        return $Resultado->result_array();
    }

    function VisualizacionDCEA(){
        $Consulta = 'SELECT p.ID ,p.Nombre, p.Apellido, p.Correo, d.Departamentos, e.Edificio ,IFNULL(p.Cubiculo, "-") AS Cubiculo, t.Turno 
        from profesoradogeneral p 
        INNER JOIN edificiostecnm e on e.ID = p.Edificio 
        INNER JOIN Departamentos d on d.ID = p.Departamento 
        INNER JOIN turnotecnm t on t.ID = p.Turno 
        where d.ID = 2';

        $Resultado2 = $this->db->query($Consulta);
        return $Resultado2->result_array();
    }

    
    function VisualizacionDIL(){
        $Consulta = 'SELECT p.ID, p.Nombre, p.Apellido, p.Correo, d.Departamentos, e.Edificio ,IFNULL(p.Cubiculo, "-") AS Cubiculo, t.Turno 
        from profesoradogeneral p 
        INNER JOIN edificiostecnm e on e.ID = p.Edificio 
        INNER JOIN Departamentos d on d.ID = p.Departamento 
        INNER JOIN turnotecnm t on t.ID = p.Turno 
        where d.ID = 3';
        $Resultado2 = $this->db->query($Consulta);
        return $Resultado2->result_array();
    }

    function VisualizacionDS(){
        $Consulta = 'SELECT p.ID, p.Nombre, p.Apellido, p.Correo, d.Departamentos, e.Edificio , IFNULL(p.Cubiculo, "-") AS Cubiculo, t.Turno 
        from profesoradogeneral p 
        INNER JOIN edificiostecnm e on e.ID = p.Edificio 
        INNER JOIN Departamentos d on d.ID = p.Departamento 
        INNER JOIN turnotecnm t on t.ID = p.Turno 
        where d.ID = 5';

        $Resultado2 = $this->db->query($Consulta);
        return $Resultado2->result_array();
    }

    function VisualizacionMM(){
        $Consulta = 'SELECT p.ID, p.Nombre, p.Apellido, p.Correo, d.Departamentos, e.Edificio , IFNULL(p.Cubiculo, "-") AS Cubiculo, t.Turno 
        from profesoradogeneral p 
        INNER JOIN edificiostecnm e on e.ID = p.Edificio 
        INNER JOIN Departamentos d on d.ID = p.Departamento 
        INNER JOIN turnotecnm t on t.ID = p.Turno 
        where d.ID = 4';

        $Resultado2 = $this->db->query($Consulta);
        return $Resultado2->result_array();
    }

    function VisualizacionPOS(){
        $Consulta = 'SELECT p.ID, p.Nombre, p.Apellido, p.Correo, d.Departamentos, e.Edificio , IFNULL(p.Cubiculo, "-") AS Cubiculo, t.Turno 
        from profesoradogeneral p 
        INNER JOIN edificiostecnm e on e.ID = p.Edificio 
        INNER JOIN Departamentos d on d.ID = p.Departamento 
        INNER JOIN turnotecnm t on t.ID = p.Turno 
        where d.ID = 6';
        $Resultado2 = $this->db->query($Consulta);
        return $Resultado2->result_array();
    }

    function VisualizacionDDP(){
        $Consulta = 'SELECT d.ID, d.NombreDept, d.JefeDept, e.Edificio, d.CorreoDept FROM directivodept d INNER JOIN edificiostecnm e ON e.ID = d.edificio';
        $resultado2 = $this->db->query($Consulta);
        return $resultado2->result_array();
    }

    function VisualizacionEdificio(){
        $Consulta = 'Select * from edificiostecnm';
        $Resultado2 = $this->db->query($Consulta);
        return $Resultado2->result_array();
    }

    
    function VisualizacionTurno(){
        $Consulta = 'SELECT * FROM turnotecnm';
        $Resultado2 = $this->db->query($Consulta);
        return $Resultado2->result_array();
    }

    function VisualizacionDepartamental(){
        $Consulta = 'SELECT * FROM Departamentos';
        $Resultado2 = $this->db->query($Consulta);
        return $Resultado2->result_array();
    }
}
