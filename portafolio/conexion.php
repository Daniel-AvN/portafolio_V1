<!-- conexion a base de datos -->

<?php

class conexion{

    private $servidor="localhost";
    private $usuario="root";
    private $contrasenia="";
    private $conexion;

    public function __construct(){

        try{
            $this->conexion = new PDO( "mysql:host=$this->servidor; dbname=album",$this->usuario,$this->contrasenia );
            
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //DA acceso a los errores

        }
        catch(PDOException $e){
            return "falla de conexion, error: ".$e;
            // return "falla de conexion, error: ".$e->getMessage();
        }

    }

    public function ejecutar($sql){ //INSERTAR/DELETE/ACTUALIZAR pa q se ejecute una instruction sql

        $this->conexion->exec($sql);
        return $this->conexion->lastInsertId(); //nos regresa un id de insersion

    }

    public function consultar($sql){
        
        $sentencia=$this->conexion->prepare($sql);
        $sentencia->execute(); //ejecutar sentencia
        return $sentencia->fetchAll();//retora todos los registros

    }

}

?>