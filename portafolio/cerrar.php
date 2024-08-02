<!-- destruir sesion -->

<?php

session_start();
session_destroy();
header("location:login.php"); //redireccionar a


?>