<?php
/* Start - model/produtos.php */

require 'model/conexao.php';

$sql_produtos = "SELECT * FROM produtos ORDER BY descricao";

$produtos_tabela = $conn->query( $sql_produtos );

$produtos_array = array();

while( $produtos_montado = $produtos_tabela->fetch_assoc() ){
	
	$produtos_array[] = $produtos_montado;
	
}

/* End - model/produtos.php */
?>
