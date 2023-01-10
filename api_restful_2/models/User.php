<?php
//Clase que se utilizara para crear el modelo que interactua con la base de datos

class User extends Conectar 
{
    //funcion para traer todas las categorias 
    
    //funcion para traer un registro en particular
    public function getUsuarios($username,$password)
    {
    
        $conectar=parent::conexion();

       
        $sql= "select * from usuarios where username=? and password=?";

       
        $sql=$conectar->prepare($sql);

       // para indicar en el string el parametro que utilizara 
       $sql->bindValue(1,$username);
       $sql->bindValue(2,$password);
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

   

}

?>