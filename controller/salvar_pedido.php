<?php
/* Start - controller/salvar_pedido.php */

header('Content-Type: application/json; charset=utf-8');

require '../model/conexao.php';

if( $_SERVER['REQUEST_METHOD'] === 'POST' ){
	
	$dados = json_decode( file_get_contents('php://input'), true );
	
	if( !isset($dados['carrinho']) || empty($dados['carrinho']) ){
		http_response_code(400);
		echo json_encode(['sucesso' => false, 'mensagem' => 'Carrinho vazio']);
		exit;
	}
	
	$carrinho = $dados['carrinho'];
	$usuario_id = 1;
	$total = 0;
	
	foreach( $carrinho as $item ){
		$total += floatval($item['preco']) * intval($item['quantidade']);
	}
	
	$status = 'confirmado';
	$created_at = date('Y-m-d H:i:s');
	$total = floatval($total);
	
	$sql_pedido = "INSERT INTO pedidos (usuario_id, total, status, created_at) VALUES ($usuario_id, $total, '$status', '$created_at')";
	
	error_log('SQL Pedido: ' . $sql_pedido);
	
	if( $conn->query($sql_pedido) ){
		
		$pedido_id = $conn->insert_id;
		
		foreach( $carrinho as $item ){
			
			$produto_id = intval($item['id']);
			$quantidade = intval($item['quantidade']);
			$preco_unitario = floatval($item['preco']);
			
			$sql_item = "INSERT INTO itens_pedido (pedido_id, produto_id, quantidade, preco_unitario) VALUES ($pedido_id, $produto_id, $quantidade, $preco_unitario)";
			
			error_log('SQL Item: ' . $sql_item);
			
			$conn->query($sql_item);
			
		}
		
		http_response_code(200);
		echo json_encode(['sucesso' => true, 'pedido_id' => $pedido_id]);
		
	}else{
		
		http_response_code(400);
		echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao criar pedido: ' . $conn->error]);
		
	}
	
}else{
	
	http_response_code(405);
	echo json_encode(['sucesso' => false, 'mensagem' => 'Método não permitido']);
	
}

/* End - controller/salvar_pedido.php */
?>
