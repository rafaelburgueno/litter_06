<?php session_start();
if( isset($_SESSION['usuario']) ){
    header('Location:inicio.php');
}


/*============================================
VALIDACION DEL FORMULARIO
============================================*/
if( isset($_POST['botonSubmit']) ){
    if( isset($_POST['usuario']) && isset($_POST['password']) ){

        if( preg_match('/^[a-zA-Z0-9]+$/', $_POST['usuario']) &&
            preg_match('/^[a-zA-Z0-9]+$/', $_POST['password']) ){

            $datos = array( "usuario"=>filter_var( $_POST['usuario'], FILTER_SANITIZE_STRING),
                            "password"=>filter_var( $_POST['password'], FILTER_SANITIZE_STRING) );

            require_once "controlador.php";

            $respuesta = Controlador::login_usuario_ctr($datos);

            $errorLogin = '<div class="alertas w3-panel w3-pale-red w3-leftbar w3-border-red"><p>'.$respuesta.'</p></div>';

        }else{
            $errorLogin = '<div class="alertas w3-panel w3-pale-red w3-leftbar w3-border-red"><p>validacion php: asegurese de no usar caracteres especiales todos los campos del formulario</p></div>';
        }

    }else{
        $errorLogin = '<div class="alertas w3-panel w3-pale-red w3-leftbar w3-border-red"><p>validacion php: asegurese de completar todos los campos del formulario</p></div>';
    }
}/*FIN DE LA VALIDACION*/


/*==========================================
MENSAJES RECIBIDOS POR GET
==========================================*/
// $mensajes = "";
if( isset($_GET["mensaje"]) ){
    $mensajes = '<div class="w3-margin alertas w3-panel w3-pale-green w3-leftbar w3-border-green"><p>'.$_GET["mensaje"].'</p></div>';
}
if( isset($_GET["error"]) ){
    $error = '<div class="w3-margin alertas w3-panel w3-pale-red w3-leftbar w3-border-red"><p>'.$_GET["error"].'</p></div>';
}


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
        <?php
            if( isset($mensajes) ){echo $mensajes;}
            if( isset($error) ){echo $error;}
            if( isset($errorLogin) ){echo $errorLogin;}
        ?>

        <div class="formulario w3-round-large">
            <div class="color-random-bg-a w3-container w3-center borde-redondo-header">
                <p class="w3-xlarge color-random-tx-1">login</p>
            </div>

            <form class="w3-container w3-margin-top" method="post" onsubmit="return validarLogin()">

                <div class="w3-padding">
                    <label for="usuario" class="w3-text-grey">usuario</label>
                    <input class="w3-input w3-border w3-white w3-round-large" name="usuario" type="text" required id="usuario">
                    <div class="alertaUsuario"></div>
                </div>

                <div class="w3-padding">
                    <label for="password" class="w3-text-grey">password</label>
                    <input class="w3-input w3-border w3-white w3-round-large" name="password" type="password" required id="password">
                    <div class="alertaPassword"></div>
                </div>


                <div class="w3-padding">
                    <input class="w3-check" type="checkbox" name="recordarme" value="recordarme" id="recordarme">
                    <label for="recordarme" class="w3-text-grey">recordarme en este equipo</div>

                <div class="w3-padding-16 w3-margin w3-center">
                    <button type="submit" class="color-random-bg-a color-random-tx-1 w3-btn w3-round-large" name="botonSubmit">entrar</button>
                </div>

                <div class="w3-padding w3-center">
                    <a href="#" class="" title="se enviara un e-mail para establecer una contraseña nueva">olvide mi contraseña</a></label>
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
<!-- <script src="funcionesRegistro.js"></script> -->

</body>
</html>
