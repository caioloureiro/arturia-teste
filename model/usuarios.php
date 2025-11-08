<?php
/* Start - model/usuarios.php */

$sql_usuarios = "SELECT * FROM usuarios WHERE id = 1";

$usuarios_tabela = $conn->query( $sql_usuarios );

$usuarios_array = array();

while( $usuarios_montado = $usuarios_tabela->fetch_assoc() ){
	
	$usuarios_array[] = $usuarios_montado;
	
}

/* End - model/usuarios.php */
?>
