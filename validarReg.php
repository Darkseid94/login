<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
//verifica que los datos sean enviados por un boton llamado "enviar"
if(isset($_POST["enviar"])) {
    require("bd.php");
    //recoleccion de datos y variables
        $rNombre= $_POST["user"];
        $rPwd = $_POST["pwd"];
        $rcPwd=$_POST["pwdCon"];
    //fin recoleccion de datoa
    //consulta para la verificacion de usuario exitente    
        $email="SELECT user FROM login WHERE user='$rNombre'";
        $conEmail=mysqli_query($conexion, $email);
        $fila = mysqli_fetch_assoc($conEmail);
    //fin de verificacion de usuario
        if($fila['user']==$rNombre){
                 $fila="el usuario ya existe";
                 Header("Location: registrar.php?errorUser=".$fila."");
        }else{
            //compruebo que los caracteres sean los permitidos
            $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_./";
            for ($i=0; $i<strlen($rPwd); $i++){
                if (strpos($permitidos, substr($rPwd,$i,1))===false){
                    $error="No se permite caracteres especiales {,'( ect.";
                    Header("Location: registrar.php?error=".$error."");
                 return false;
                }
            }//fin de comprobacion de caracteres

            //verificacion que las contraseñas sean iguales
            if($rPwd==$rcPwd){
                $contraCifrada=md5($rPwd);//cifrado de la contraseña
                $consulta="INSERT INTO login(user, pwd) VALUES ('$rNombre','$contraCifrada')";//insercion a la base de datos
                mysqli_query($conexion, $consulta);//ejecusion de la consulta
                $conexion->close();  //serramos mysql

                        //comiensa envio de mensaje utilizando libreria PHPMILER
                        //Instantiation and passing `true` enables exceptions
                        $mail = new PHPMailer(true);
                        try {
                            //Server settings
                            $mail->SMTPDebug = 0;                      //Enable verbose debug output //podemos cer los mensajes o no
                            $mail->isSMTP();                                            //Send using SMTP
                            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                            $mail->Username   = 'xxsmtpphpxx@gmail.com';                     //SMTP username
                            $mail->Password   = 'pruevasSMTPphp';                               //SMTP password
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                            $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                            //Recipients
                            $mail->setFrom('xxsmtpphpxx@gmail.com','universidad tecnologica de la selva');
                            $mail->addAddress($rNombre);     //Add a recipient
 
                            //Content
                            $mail->isHTML(true);                                  //Set email format to HTML
                            $mail->Subject = 'hola';
                            //$mail->Body    = "confirma tu correo aqui  <a href='http://pruevauts.freecluster.eu/confirmacion.php?confir=1&email=".$rNombre."'>Confirme aqui-</a>";
                            $mail->Body    = "confirma tu correo aqui  <a href='http://127.0.0.1/pruebas/confirmacion.php?confir=1&email=".$rNombre."'>Confirme aqui-</a>";
   
                            $mail->send();
                            //echo 'Message has been sent';
                            echo "confirma tu correo electronico <br>  Para acceder a tu cuenta y obtener tu ficha por favor confirma en correo que te emos enviado";
                        } catch (Exception $e) {
                            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                        }
                        //termina el envio del mensaje
            }else{
                $errorCon="Las contraseñas no coinsiden";
                 Header("Location: registrar.php?errorCon=".$errorCon."");
                }
            //fin de verificacion de contra
        } 
} else {
        header("Location: index.php");
}
//fin de verificacion de boton
?>