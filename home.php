<?php
  session_start();
  if($_SESSION["logueado"] == TRUE) {
    //echo $_SESSION['idemail'];
    require("bd.php");
    $consulta = "SELECT * FROM login WHERE id_registro=".$_SESSION['idemail']."";
    if($resultado = $conexion->query($consulta)) {
        while($row = $resultado->fetch_array()) {
            $confirmacion = $row["confirmacion"];
  
        }
    }
    if($confirmacion==0){
        echo "porfavor verifica tu cuenta";
    }else{
        echo "bienvenido al sistema de fichas";
    }
?>






<?php
}
else
{
  echo "
  <html>
  <head>
  <meta http-equiv='REFRESH' content='0;url=index.php'>
  </head>
  </html>";
}
?>