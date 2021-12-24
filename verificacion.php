<?php

if( isset($_GET['verificacion']) ){

    require_once "controlador.php";

    $verificacion = filter_var( $_GET['verificacion'], FILTER_SANITIZE_STRING);

    $respuesta = Controlador::verificacion_registro_usuario_ctr($verificacion);

    if( $respuesta == 1 ){
        header('Location:login.php?mensaje=registro verificado correctamente! ya puede iniciar sesion');
    }else{
        header('Location: login.php?error=codigo de verificacion incorrecto');
    }



}else{
    header('Location:registro.php');
}
