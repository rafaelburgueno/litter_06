<?php
require_once "modelo.php";

class Controlador{

    public function revisar_registro_usuario_ctr($datos){

        $usuario = filter_var( $datos, FILTER_SANITIZE_STRING);

        $respuesta = Modelo::revisar_registro_usuario_mdl($usuario, "usuarios");

        if($respuesta == "si existe ese usuario"){
            return '<div class="alertas w3-panel w3-pale-red w3-leftbar w3-border-red"><p>validacion ajax: ese usuario ya esta registrado</p></div>';
        }else{
            return '<div class="alertas w3-panel w3-pale-green w3-leftbar w3-border-green"><p>validacion ajax: ese usuario esta disponible para ti</p></div>';
        }

    }


    /*====================================
    REGISTRAR USUARIO
    ====================================*/
    public function registrar_usuario_ctr($datos){

        $coincidenciaUsuarios = Modelo::revisar_registro_usuario_mdl($datos['usuario'], "usuarios");

        if( $coincidenciaUsuarios == "no existe ese usuario" ){

            //encriptacion con la salt: $2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$
            $datos['password'] = crypt($datos['password'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

            $respuesta = Modelo::registrar_usuario_mdl($datos, "usuarios");

            if($respuesta){

                /*==================================================
                envio de email
                ==================================================*/
                //direccion de dominio (se debe actualizar al subir al hosting)
                // $dominio = "notas.rf.gd";
                //
                // $destinatario = $datos['usuario'] . "<" . $datos['email'] . ">";
                // $asunto = "litter - Verificacion de correo";
                //
                // $mensaje = "para confirmar tu cuenta accede al siguiente  <a href='" . $dominio . "/verificacion.php?verificacion=" . $cod_verificacion . "'>enlace</a>" ;
                // $mensaje .= "<br>si el enlace no funciona, copia y pega esta direccion en la barra de direcciones<br>";
                // $mensaje .= $dominio . "/verificacion.php?verificacion=" . $cod_verificacion;
                //
                // $headers = "MIME-Version: 1.0\r\n";
                // $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                // $headers .= 'From: litter' . "\r\n";

                //activar esta funcion al subir al hosting y modificar el archivo conexion
                // mail($datos['email'], $asunto, $mensaje, $headers);

                header("Location: login.php?mensaje=validacion ctr: Registro exitoso! Te enviamos un email
                        con un link para confirmar tu registro. En caso de no encontrarlo en la vandeja de
                        entrada, busca en la vandeja de correo no deseado");
            }else{
                return "validacion ctr: hemos tenido problemas para procesar su registro, intente mas tarde";
            }

        }else{
            return "validacion ctr: el usuario ya esta registrado";
        }



    }


    public function verificacion_registro_usuario_ctr($verificacion){

        $respuesta = Modelo::verificacion_registro_usuario_mdl($verificacion, "usuarios");

        return $respuesta;
    }


/*=================================================
LOGIN
=================================================*/

public function login_usuario_ctr($datos){

    //encriptacion con la salt: $2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$
    $datos['password'] = crypt($datos['password'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

    $respuesta = Modelo::login_usuario_mdl($datos, "usuarios");

    if($respuesta != false){

        if($respuesta['intentos'] < 3){

            if($respuesta['usuario'] == $datos['usuario'] && $respuesta['password'] == $datos['password']){
                //establece la sesion de usuario
                session_start();
                $_SESSION['usuario'] = $datos['usuario'];

                //el setcookie va sin tiempo porque en el index siempre se
                //estira la vida de la cookie por una semana
                setcookie("usuario_litter", $datos['usuario']);

                Modelo::set_intentos_usuario_mdl($datos, 0, "usuarios");

                //redireccionar al index
                header('Location: inicio.php');

            }else{
                $incrementaIntentos = ++$respuesta['intentos'];
                Modelo::set_intentos_usuario_mdl($datos, $incrementaIntentos, "usuarios");
                return 'login ctr: usuario o contraseña incorrectos';
            }

        }else{
            return 'login ctr: ha fallado tres veces en el login, debera usar el captcha';
        }

    }else{
        return 'login ctr: usuario incorrecto';
    }



}


    /*============================================
    CERRAR SESION
    ============================================*/
    public function cerrarSesionCtr(){

        session_start();

        session_destroy();
        $_SESSION = array();

        return header('Location: login.php');

    }






}
/*FIN DE LA CLASE CONTROLADOR*/




?>
