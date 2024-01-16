<?php

function RulesLogin($formvalidation)
{
    $formvalidation->set_rules('Usuario', 'Usuario', 'required|trim',
    array('required' => 'El %s es requerido.'));

    $formvalidation->set_rules('Password', 'Password', 'required|trim',
    array('required' => 'La contraseña es requerida.'));

    //Se regresa el arreglo de los errores
    $ErrorArray = $formvalidation->error_array(); 
    return $ErrorArray;
}

function RulesForm($formvalidation)
{
    $formvalidation->set_rules('Nombre', 'Nombre', 'required|trim');

    $formvalidation->set_rules('Apellido', 'Apellido', 'required|trim');

    $formvalidation->set_rules('Correo', 'Correo', 'required|is_unique[empleadojuventudes.Correo]');

    $formvalidation->set_rules('Extension', 'Extension', 'required|trim');
    
    $formvalidation->set_rules('Area', 'Area', 'required');

    //Se regresa el arreglo de los errores
    $ErrorArray = $formvalidation->error_array(); 
    return $ErrorArray;
}
