<?php

require_once "conexion.php";

class Modelo{

/*==============================================
FUNCION LLAMADA POR AAJAX
==============================================*/
    public function revisar_registro_usuario_mdl($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT usuario FROM $tabla WHERE usuario = :usuario");

		$stmt->bindParam(":usuario", $datos, PDO::PARAM_STR);

        $stmt->execute();

		if( $stmt->fetch() ){

			return "si existe ese usuario";

        }else{

			return "no existe ese usuario";
		}

		$stmt->close();

	}


    /*====================================
    REGISTRAR USUARIO
    ====================================*/
    public function registrar_usuario_mdl($datos, $tabla){

        // echo "llegue a la fucion registrar del modelo";
        //se genera un codigo de validacion random de 40 caracteres
        $cod_verificacion = bin2hex(random_bytes(20));

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (usuario, password, email, cod_verificacion) VALUES (:usuario,:password,:email, :cod_verificacion)");

		$stmt->bindParam(":usuario", $datos['usuario'], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos['password'], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos['email']);
        $stmt->bindParam(":cod_verificacion", $cod_verificacion);

        $respuesta = $stmt->execute();

        /*==================================================
        bloque de verificacion y envio de email
        ==================================================*/
        //se preparan los argumentos necesarios para la funcion mail()
        $destinatario = $datos['usuario'] . "<" . $datos['email'] . ">";
        $asunto = "litter - Verificacion de correo";

        $mensaje = "para confirmar tu cuenta accede al siguiente  <a href='" . Conexion::dominio() . "/verificacion.php?verificacion=" . $cod_verificacion . "'>enlace</a>" ;
        $mensaje .= "<br>si el enlace no funciona, copia y pega esta direccion en la barra de direcciones<br>";
        $mensaje .= Conexion::dominio() . "/verificacion.php?verificacion=" . $cod_verificacion;

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= 'From: litter' . "\r\n";


		if( $respuesta ){
            //activar esta funcion al subir al hosting y modificar el archivo conexion
            // mail($datos['email'], $asunto, $mensaje, $headers);
            return $respuesta;

        }else{
            return $respuesta;
		}

        $stmt->close();

	}

    /*=============================================
    VERIFICACION DEL CODIGO ENVIADO POR EMAIL
    =============================================*/
    public function verificacion_registro_usuario_mdl($verificacion, $tabla){

        //$sql2 = "UPDATE usuarios SET verificacion=1 WHERE cod_verificacion=:cod_verificacion";
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET verificacion=1 WHERE cod_verificacion=:cod_verificacion");
        $stmt->bindParam(":cod_verificacion", $verificacion);

        $stmt->execute();

        $respuesta = $stmt->rowCount();

        return $respuesta;

        $stmt->close();

    }


    /*===============================================
    LOGIN
    ===============================================*/

    public function login_usuario_mdl($datos, $tabla){

        $stmt = Conexion::conectar()->prepare("SELECT usuario, password, intentos FROM $tabla WHERE usuario = :usuario");

        $stmt->bindParam(":usuario", $datos['usuario'], PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

    }

    /*===============================================
    SET INTENTOS
    ===============================================*/

    public function set_intentos_usuario_mdl($datos, $intentos, $tabla){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET intentos=$intentos WHERE usuario=:usuario");

        $stmt->bindParam(":usuario", $datos['usuario'], PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

    }



}
