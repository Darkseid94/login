<?php
//verifica que los datos sean enviados por un botn llamado "enviar"
if(isset($_POST["enviar"])) {

    require("bd.php");
    //recoleccion de datos
        $loginNombre = $_POST["usuario"];
        $loginPassword = $_POST["pwd"];
        //proivicion y sustitucion de caracteres especiales
        $contra = $loginPassword;
        $texto = preg_replace('([^A-Za-z0-9_/.-])', '', $contra);
        //cifrado de contraseña(en la base de dato tambien tiene que estar cifrado)
        $contraCam=md5($texto);
        //creamos y ejecutamos la consulta
        $consulta = "SELECT * FROM login WHERE user='$loginNombre' AND pwd='$contraCam'";
        if($resultado = $conexion->query($consulta)) {

            //guardamos los datos extraidos de la bd en una variable 
            while($row = $resultado->fetch_array()) {
                $userok = $row["user"];
                $passok = $row["pwd"];
                $idEmail= $row["id_registro"];
            }
            $resultado->close();
        }
        $conexion->close();
        //comparamos que los datos enviados y los datos guardados sean los mismos
        if(isset($loginNombre) && isset($contraCam)) {
            if($loginNombre == $userok && $contraCam == $passok) {
                session_start();
                $_SESSION["logueado"] = TRUE;//si todo se cumple se crear varuables globales
                $_SESSION["idemail"]=$idEmail;
              header("Location: home.php");
            }
            //redireccionamos encaso de k los datos no sean iguales
            else {
                $error="Usuario o Contraseña inconrrectos";
               Header("Location: index.php?error=".$error."");
            }
        }
        //redireccionamos encaso de k los datos no fuesen enviado por el boton "enviar"
    } else {
        header("Location: index.php");
    }
?>