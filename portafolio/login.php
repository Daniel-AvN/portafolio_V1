<!-- donde el usuario se logea -->

<?php

session_start();
if($_POST){
    if( $_POST['usuario']=="daniel" && $_POST['contrasenia']=="12345"   ){
        
        $_SESSION['usuario']="daniel";
        $_SESSION['contrasenia']="12345";

        header("location:index.php"); //envia a la locacion/ direccion index, nos redirecciona

    }else{
        echo "<script> alert('usuario o contraseña incorrecto'); </script>";
    }
}

?>

<!doctype html>
<html lang="es">
<head>
  <title>Title</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
 
 <div class="container">

    <div class="row ">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <br>
        <div class="card"><br>
            <div class="card-header">
                iniciar seccion
            </div>
            <div class="card-body">
                <form action="login.php" method="post"><br>
                usuario: <input class="form-control" type="text" name="usuario">
                <br>
                contraseña: <input  class="form-control"  type="password" name="contrasenia">
                <br>
                <button  class="btn-success btn"  type="submit">entrar al portafolio</button>
                </form>
            </div>
            <div class="card-footer text-muted">
                
            </div>
        </div>

            
        </div>
        <div class="col-md-4"></div>
    </div>
    
 </div>
 

</body>

</html>