<?php

class Sesion extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('UsuarioSQL');
        $this->load->helper('ErrorLogin_helper');
    }
    
    function ValidandoDatos()
    {
        $data = $this->input->post(); // Obtener los datos del formulario de inicio de sesión
        
        // Llamar a la función del modelo para verificar el inicio de sesión
        $resp = $this->UsuarioSQL->Login($data['Usuario'], $data['Password']);

        if (count($resp) > 0) {
            session_start();
            $_SESSION['datos'] = $resp; // Iniciar sesión y almacenar los datos del usuario en la sesión
        } else {
            echo "No se encontraron datos válidos."; // Mostrar un mensaje si no se encontraron datos válidos
        }
    }
    
    

    function CerrarSesion()
    {
        session_start();
        session_destroy();
        redirect('http://localhost/CopiaTec/Welcome/index');
    }
}

?>