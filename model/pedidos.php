<?php
/* Start - model/pedidos.php */

require 'model/conexao.php';

$usuario_id = 1;

$sql_pedidos = "SELECT * FROM pedidos WHERE usuario_id = $usuario_id ORDER BY created_at DESC";

$pedidos_tabela = $conn->query( $sql_pedidos );

$pedidos_array = array();

while( $pedidos_montado = $pedidos_tabela->fetch_assoc() ){
	
	$pedido_id = $pedidos_montado['id'];
	
	$sql_itens = "SELECT ip.*, p.descricao, p.codigo 
					FROM itens_pedido ip 
					INNER JOIN produtos p ON ip.produto_id = p.id 
					WHERE ip.pedido_id = $pedido_id";
	
	$itens_tabela = $conn->query( $sql_itens );
	
	$itens_array = array();
	
	while( $itens_montado = $itens_tabela->fetch_assoc() ){
		
		$itens_array[] = $itens_montado;
		
	}
	
	$pedidos_montado['itens'] = $itens_array;
	
	$pedidos_array[] = $pedidos_montado;
	
}

/* End - model/pedidos.php */
?>
