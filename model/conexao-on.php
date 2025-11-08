<?php

$servidor = "localhost";
$usuario = "suporte_usr";
$senha = "123456";
$banco = "banco_online";

$conn = new mysqli( $servidor, $usuario, $senha, $banco );

if( $conn->connect_error ){
	
  die("Falha na conexão: " . $conn->connect_error);
  
}

$conn->set_charset('utf8');

?>