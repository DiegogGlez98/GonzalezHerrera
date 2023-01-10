<?php

    //Define al php que vamos a utilizar objetos JSON
    header('Content-Type: application/json');
    //Es el archivo del controlador que utilizara para 
    //acceder al modelo a traves de un endpoint y traer los datos en JSON
    require_once("../config/conexion.php");
    require_once("../models/User.php");

    //Crear un objeto para utilizar la categoria del models
    $user= new User();

    //decodifique los parametros que enviamos y los acepte en tipo JSON
    $body=json_decode(file_get_contents("php://input"),true);

    //Crear los servicios a utilizar en los endpoint

    switch($_GET["op"])
    {
       
        //Case para obtener un registro en particular
        case "selectusr":$datos=$user->getUsuarios($body["username"],$body["password"]);
                            echo json_encode($datos);
                            break;
    }


?>