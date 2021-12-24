<?php session_start();
if( isset($_SESSION['usuario']) ){
    header('Location:inicio.php');
}
// require_once "controlador.php";

$errores = "";
// if( isset($_GET["error"]) ){
//     $errores = '<div class="alertas w3-panel w3-pale-red w3-leftbar w3-border-red"><p>'.$_GET["error"].'</p></div>';
// }

/*============================================
VALIDACION DEL FORMULARIO
============================================*/
if( isset($_POST['botonSubmit']) ){
    if( isset($_POST['usuario']) && isset($_POST['password']) && isset($_POST['password2']) && isset($_POST['email']) && isset($_POST['terminos']) ){

        if( preg_match('/^[a-zA-Z0-9]+$/', $_POST['usuario']) &&
            preg_match('/^[a-zA-Z0-9]+$/', $_POST['password']) &&
            preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["email"]) ){

            if( $_POST['password'] == $_POST['password2']){

                if( $_POST['terminos'] ){

                    $datos = array( "usuario"=>filter_var( $_POST['usuario'], FILTER_SANITIZE_STRING),
                                    "password"=>filter_var( $_POST['password'], FILTER_SANITIZE_STRING),
                                    "email"=>filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL) );

                    require_once "controlador.php";

                    $respuesta = Controlador::registrar_usuario_ctr($datos);

                    $errores .= '<div class="alertas w3-panel w3-pale-red w3-leftbar w3-border-red"><p>'.$respuesta.'</p></div>';


                }else{
                    $errores .= '<div class="alertas w3-panel w3-pale-red w3-leftbar w3-border-red"><p>validacion php: debe aceptar los terminos para registrarse</p></div>';
                }

            }else{
                $errores .= '<div class="alertas w3-panel w3-pale-red w3-leftbar w3-border-red"><p>validacion php: las contraseñas no coinciden</p></div>';
            }

        }else{
            $errores .= '<div class="alertas w3-panel w3-pale-red w3-leftbar w3-border-red"><p>validacion php: asegurese de no usar caracteres especiales todos los campos del formulario</p></div>';
        }



    }else{
        $errores .= '<div class="alertas w3-panel w3-pale-red w3-leftbar w3-border-red"><p>validacion php: asegurese de completar todos los campos del formulario</p></div>';
    }
}/*FIN DE LA VALIDACION*/


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>litter - registro</title>
    <!-- jQuery-3.3.1 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--cdn w3 school-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="colores.css">

    <style>



    </style>

</head>

<body class="color-random-bg-c color-random-tx-1">

    <header class="color-random-bg-b w3-container">
        <h1 class="w3-xxxlarge letra-litter color-random-tx-1">litter 0.6</h1>
    </header>

    <section>
        <?php if( $errores != "" ){echo $errores;}?>

        <div class="formulario w3-round-large">
            <div class="color-random-bg-a w3-container w3-center borde-redondo-header">
                <p class="w3-xlarge color-random-tx-1">registro </p>
            </div>

            <form class="w3-container w3-margin-top" method="post" onsubmit="return validarRegistro()">

                <div class="w3-padding">
                    <label for="usuario" class="w3-text-grey">usuario</label>
                    <!-- la id "usuario" lo uso para revisar si ya existe un usuario con ese nombre -->
                    <input class="registroUsuarioAjax w3-input w3-border w3-white w3-round-large" name="usuario" type="text" required id="usuario" value="" placeholder="de 6 a 30 caracteres" maxlength="30">
                    <div class="alertaUsuario"></div>
                </div>

                <div class="w3-row-padding w3-padding">

                    <div class="w3-col s6">
                        <label for="password" class="w3-text-grey">password</label>
                        <input class="w3-input w3-border w3-white w3-round-large" name="password" type="password" required id="password" placeholder="minimo 6 caracteres, incluir numero(s) y una mayuscula" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
                    </div>
                    <div class="w3-col s6">
                        <label for="password2" class="w3-text-grey">repetir password</label>
                        <input class="w3-input w3-border w3-white w3-round-large" name="password2" type="password" required id="password2">
                    </div>
                    <!-- <p>*debe ser mayor de 6 caracteres y contener al menos una mayuscula, una minuscula y un numero.</p> -->
                    <div class="alertaPassword"></div>
                </div>

                <div class="w3-padding">
                    <label for="email" class="w3-text-grey">email</label>
                    <input class="w3-input w3-border w3-white w3-round-large" name="email" type="email" required id="email">
                    <div class="alertaEmail"></div>
                </div>

                <div class="w3-padding">
                    <input class="w3-check" type="checkbox" name="terminos" value="true" id="terminos">
                    <label for="terminos" class="w3-text-grey">acepto <a href="#" class="" title="terminos y condiciones"> terminos y condiciones</a></label>
                    <div class="alertaTerminos"></div>
                </div>


                <div class="w3-padding-16 w3-margin w3-center">
                    <button type="submit" class="color-random-bg-a color-random-tx-1 w3-btn w3-round-large" name="botonSubmit">guardar</button>
                </div>


            </form>
        </div><!-- div formulario -->

    </section>


    <!-- Footer -->
    <footer class="color-random-bg-a w3-container w3-padding-32 w3-center w3-xlarge">
        <i class="fa fa-facebook-official w3-hover-opacity"></i>
        <i class="fa fa-instagram w3-hover-opacity"></i>
        <i class="fa fa-snapchat w3-hover-opacity"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity"></i>
        <i class="fa fa-twitter w3-hover-opacity"></i>
        <i class="fa fa-linkedin w3-hover-opacity"></i>
        <p class="w3-medium">creado por <a href="#"><span class="logo">Soda Voce Spaceman</span></a></p>
    </footer>


<script src="funciones.js"></script>
<script src="funcionesRegistro.js"></script>

</body>
</html>
