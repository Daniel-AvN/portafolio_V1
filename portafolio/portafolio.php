<?php include 'cabecera.php'; //pa q se repita ?>
<?php include 'conexion.php'; ?>
<?php 

if($_POST){

    $nombre = $_POST['nombre'];
    $descripcion= $_POST['descripcion'];
    $objConexion= new conexion();  
 
    $fecha= new DateTime();//la imagen tendra la fecha de carga mas un guion bajo antes de su nombre

    $imagen= $fecha->getTimestamp()."_". $_FILES['archivo']['name'];
    $imagen_temporal= $_FILES['archivo']['tmp_name'];
    move_uploaded_file($imagen_temporal ,"imagenes/".$imagen ); //mueve el archivo original al nombre de la imagen, mueve la imagen q escoge el usuario en la subcarpeta imagenes


 $sql= "INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `descripcion`) VALUES (NULL, '$nombre' , '$imagen', '$descripcion');"; //de insertar, escribimos los valores y copeamos el codigo, si no le ponemos las comillas es porq es numerico, aqui si no le ponemos nos da error

//  $id=$objConexion->ejecutar($sql);  //pa relacionar informacion
 $objConexion->ejecutar($sql);
 header("location:portafolio.php");   
}

if($_GET){
 $id=$_GET['borrar'];
 $objConexion= new conexion();  
 
 $imagen=$objConexion->consultar("SELECT  imagen FROM `proyectos` WHERE id=".$id );
//  print_r($imagen[0]['imagen']);//regresa el nombre de la imagen

 unlink("imagenes/".$imagen[0]['imagen']); //ya subimos la foto a la carpeta imagenes, funcion q permite llevar a cabo un borrado a partir de una ruta

 $sql= "DELETE FROM `proyectos` WHERE `proyectos`.`id` = ".$id;
 $objConexion->ejecutar($sql);
//lo q se envia el id, borramos el registro de la bd y el archivo de la carpeta imagenes

header("location:portafolio.php"); //el usuario no va a poder refrescar la pagina, no va a poder actualizar la pagina, al borrar se quita el ?id=x   

}


$objConexion= new conexion();  
$proyectos = $objConexion->consultar("SELECT * FROM `proyectos`" );//selecciona todos los registros


?>


<br>

<div class="container">
    <div class="row">
        <div class="col-md-6">

             <div class="card">
                <div class="card-header">
                    datos del proyecto
                </div>
                
                <div class="card-body">

                    <form action="portafolio.php" method="post" enctype="multipart/form-data">
                    nombre del proyecto: <input required class="form-control" type="text" name="nombre">
                    <br>
                    imagen del proyecto: <input required class="form-control" type="file" name="archivo">
                    <br>

                      <label for="" class="form-label">descripcion:</label>
                      <textarea required class="form-control" name="descripcion" rows="3"></textarea><br>

                    <input class="btn btn-success" type="submit" value="enviar proyecto"> 
                    </form>
                </div>
            </div>

        </div>

        <div class="col-md-6">
            <div class="table-responsive">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">nombre</th>
                            <th scope="col">imagen </th>
                            <th scope="col">descripcion </th>
                            <th scope="col">acciones </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($proyectos as $proyecto) { ?>
                        <tr>
                            <td > <?php echo $proyecto['id']; ?> </td>
                            <td> <?php echo $proyecto['nombre']; ?> </td>
                            <td> <img width="100" height="100" src="imagenes/<?php echo $proyecto['imagen']; ?>" alt=""> </td>
                            <td> <?php echo $proyecto['descripcion']; ?> </td>
                            <td> <a class="btn btn-danger" href="?borrar=<?php echo $proyecto['id']; ?>" >eliminar</a> </td>
                            <!-- al dar clic en la url aparece ?borrar=id -->
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        


    </div>
</div>


<?php include 'pie.php'; //pa q se repita ?>

