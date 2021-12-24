<?php

class Conexion{

	public function conectar(){

		$host = "localhost";
		$dbname = "litter_05";
		$usuario = "root";
		$password = "";

		$link = new PDO("mysql:host=".$host."; dbname=".$dbname, $usuario, $password);
		return $link;

	}

	public function dominio(){

		$dominio = "notas.rf.gd";
		return $dominio;

	}

}
