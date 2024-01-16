<?php

class CRUDEP extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('CRUDESQL');
        $this->load->helper('url', 'form', 'ErrorLogin_helper');

    }
//Para Departamentos De Profesores
    function InsertarDatos(){
        $data  = array(
            'Nombre' => $this->input->post('Nombre'),
            'Apellido' => $this->input->post('Apellido'),
            'Correo' => $this->input->post('Correo'),
            'Edificio' => $this->input->post('Edificio'),
            'Cubiculo' => $this->input->post('Cubiculo'),
            'Turno' => $this->input->post('Turno'),
            'Departamento' => $this->input->post('Departamento')
        );
            $this->CRUDESQL->InserccionGeneral($data);
            redirect('Welcome/RFormularioTec');
        }


    
    function Actualizar(){
        $id = $this->input->get('id');
        $data  = array(
            'Nombre' => $this->input->post('Nombre'),
            'Apellido' => $this->input->post('Apellido'),
            'Correo' => $this->input->post('Correo'),
            'Edificio' => $this->input->post('Edificio'),
            'Cubiculo' => $this->input->post('Cubiculo'),
            'Turno' => $this->input->post('Turno'),
            'Departamento' => $this->input->post('Departamento')
        );
        $this->CRUDESQL->ActualizarGeneral($id, $data);
        redirect('Welcome/InterfazProfesoradoAdm');
    }

    function Eliminar()
    {
        $id = $this->input->get('id');
        $this->CRUDESQL->EliminarDB($id);
        redirect(base_url('Welcome/Administracion'));
    }

    //Para Directivos Departamentales
    function InsertarDatosDDD(){
        $data  = array(
            'NombreDept' => $this->input->post('NombreDept'),
            'JefeDept' => $this->input->post('JefeDept'),
            'Edificio' => $this->input->post('Edificio'),
            'CorreoDept' => $this->input->post('CorreoDept')
        );
            $this->CRUDESQL->InserccionDDD($data);
            redirect('Welcome/RFormularioTec');
        }

            
    function ActualizarDDD(){
        $id = $this->input->get('id');
        $data  = array(
            'NombreDept' => $this->input->post('NombreDept'),
            'JefeDept' => $this->input->post('JefeDept'),
            'Edificio' => $this->input->post('Edificio'),
            'CorreoDept' => $this->input->post('CorreoDept')
        );
        $this->CRUDESQL->ActualizarDDD($id, $data);
        redirect('Welcome/InterfazProfesoradoAdm');
    }

    function EliminarDDD()
    {
        $id = $this->input->get('id');
        $this->CRUDESQL->EliminarDDD($id);
        redirect(base_url('Welcome/Administracion'));
    }

}
?>