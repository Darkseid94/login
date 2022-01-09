<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/estilos.css">
    <title>LOGIN</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center pt-5 mt-5 m-1">
            <div class="col-md-6 col-sm-8 col-xl-4 col-lg-5 formulario">
                <form action="validarReg.php" method="POST">
                    <div class="form-group text-center pt-3">
                        <img src='img/user.png' class='imgPerfil' />
                    </div>
                    <div class="form-group text-center pt-2">
                        <h1 class="text-light">Registrate</h1>
                    </div>
                    <?php                 
                        if(isset($_GET["errorUser"])){
                             $errorUser=$_GET["errorUser"];
                             echo "  
                                <div class='alert alert-danger'>
                                <a href='#' class='alert-link'>".$errorUser."</a>
                                </div> ";
                         }
                    ?>
                    <div class="form-group mx-sm-4 pt-2">
                         <input type="email" maxlength="30" name="user" class="form-control" placeholder="Ingrese su Correo" required>  
                    </div>
                    <?php                 
                        if(isset($_GET["error"])){
                            $error=$_GET["error"];
                            echo "  
                                <div class='alert alert-danger'>
                                <a href='#' class='alert-link'>".$error."</a>
                                </div>";
                        }
                    ?>
                    <div class="form-group mx-sm-4 pb-2">
                        <div class="row">
                           <div class="col-md-9">
                                <input type="password" ID="txtPassword" name="pwd" maxlength="30" class="form-control" placeholder="Ingrese su Contraseña" required >
                           </div>
                           <div class="col-md-2">
                                <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>  
                            </div>
                        </div>
                    </div>
                    <div class="form-group mx-sm-4 pb-2">
                        <div class="row">
                            <div class="col-md-9">
                                <input type="password" ID="txtPassword2" name="pwdCon" maxlength="30" class="form-control" placeholder="Confirme su Contraseña" required > 
                            </div>
                            <div class="col-md-2">
                                <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword2()"> <span class="fa fa-eye-slash icon"></span> </button>  
                            </div>
                        </div>                   
                    </div>
                    <?php                 
                        if(isset($_GET["errorCon"])){
                            $errorCon=$_GET["errorCon"];
                            echo"  
                                <div class='alert alert-danger'>
                                <a href='#' class='alert-link'>".$errorCon."</a>
                                </div>";
                        }
                    ?>
                    <div class="form-group mx-sm-4 pb-2">
                        <input type="submit" name="enviar" class="btn btn-block ingresar" value="REGISTRAR">
                    </div>
                </form>
                <div class="row">
                        <div class="col-md-6">
                            <div class="form-group pt-3">
                                <p>
                               <img src='img/whatsapp.svg' width="30" aling="left"/>
                              9191564508
                                </p>
                            </div>
                         </div>
                         <div class="col-md-6">
                            <div class="form-group pt-3">
                            <img src='img/facebook.svg' width="30" aling="left"/><a href="https://www.facebook.com" class="color" > UTSelva rayon</a>
                            </div>
                         </div>
                    </div>                    
            </div>
        </div>
    </div>
    <script src="js/ocultarContra.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>