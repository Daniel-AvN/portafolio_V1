<!-- parte de arriba -->

<?php

session_start();
if( isset($_SESSION['usuario'] ) !="daniel" ){ //si esta logeado pero no es el usuario correcto
    header("location:login.php"); //redirecciona
    //hace q si no esta logueado lo redireccione a login
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>portafolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> <!-- link de bootstrap -->

</head>
<body>

   <div class="container">
     
    <a href="index.php" >inicio</a>  |
    <a href="portafolio.php" >portafolio</a> |
    <a href="cerrar.php" >cerrar</a>
    <br>
    

