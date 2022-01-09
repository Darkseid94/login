<?php
$confir=$_GET['confir'];
$email=$_GET['email'];
require("bd.php");
//echo $id." ".$email;
$consulta ="UPDATE login set confirmacion='$confir' where user='$email'";
$conexion->query($consulta);
$conexion->close();
//echo "Ya puedes iniciar sesion pulse <a href='http://pruevauts.freecluster.eu/pruebas/index.php'> aqui </a> para comensar";
echo "tu correo ha sido confirmado pulse <a href='index.php'> aqui </a> para comensar";

?>