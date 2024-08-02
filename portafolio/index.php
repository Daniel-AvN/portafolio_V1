<!-- todo el contenido -->

<?php include 'cabecera.php'; //pa q este en index.php ?>
<?php include 'conexion.php'; ?>
<?php 
$objConexion= new conexion();  
$proyectos = $objConexion->consultar("SELECT * FROM `proyectos`" ); ?>

   <div class="p-5 bg-light">
    <div class="container">
        <h1 class="display-3">bienvenid@s</h1>
        <p class="lead">este es un portafolio privado</p>
        <hr class="my-2">
        <p>más informacion.</p>  
    </div>
   </div>


<div class="row row-cols-1 row-cols-md-3 g-4">
      
<?php foreach($proyectos as $proyecto) { ?>

<div class="col">
<div class="card">
    <img width="100" height="100" src="imagenes/<?php echo $proyecto['imagen']; ?>" alt=""> 
  <div class="card-body">
    <h5 class="card-title"><?php echo $proyecto['nombre']?></h5>
    <p class="card-text"> <?php echo $proyecto['descripcion']?> </p>
  </div>
</div>
</div> 

<?php } ?>
</div>

<?php include 'pie.php'; //pa q este en index.php ?>

<style>
    h1{
        text-transform: capitalize;
    }
</style>