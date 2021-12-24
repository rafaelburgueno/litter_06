<?php

require_once "controlador.php";
// require_once "modelo.php";

#CLASE Y MÉTODOS
#-------------------------------------------------------------
class Ajax{

    public $usuario;

    public function revisar_registro_usuario(){

		$datos = $this->usuario;

		$respuesta = Controlador::revisar_registro_usuario_ctr($datos);

		echo $respuesta;

	}

}


if( isset($_POST['revisarRegistroUsuario']) ){
    // echo "me llego el post revisarRegistroUsuario";
    $revisar = new Ajax();
    $revisar->usuario = $_POST['revisarRegistroUsuario'];
    $revisar->revisar_registro_usuario();

}else{
    echo "no sali del ajaxRegitro";
    return "puto";
}

 ?>
