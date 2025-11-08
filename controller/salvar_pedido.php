<?php
/* Start - controller/salvar_pedido.php */

header('Content-Type: application/json');

require '../model/conexao.php';

if( $_SERVER['REQUEST_METHOD'] === 'POST' ){
	
	$dados = json_decode( file_get_contents('php://input'), true );
	
	if( !isset($dados['carrinho']) || empty($dados['carrinho']) ){
		echo json_encode(['sucesso' => false, 'mensagem' => 'Carrinho vazio']);
		exit;
	}
	
	$carrinho = $dados['carrinho'];
	$usuario_id = 1;
	$total = 0;
	
	foreach( $carrinho as $item ){
		$total += $item['preco'] * $item['quantidade'];
	}
	
	$status = 'confirmado';
	$created_at = date('Y-m-d H:i:s');
	
	$sql_pedido = "INSERT INTO pedidos (usuario_id, total, status, created_at) VALUES ($usuario_id, $total, '$status', '$created_at')";
	
	if( $conn->query($sql_pedido) ){
		
		$pedido_id = $conn->insert_id;
		
		foreach( $carrinho as $item ){
			
			$produto_id = $item['id'];
			$quantidade = $item['quantidade'];
			$preco_unitario = $item['preco'];
			
			$sql_item = "INSERT INTO itens_pedido (pedido_id, produto_id, quantidade, preco_unitario) VALUES ($pedido_id, $produto_id, $quantidade, $preco_unitario)";
			
			$conn->query($sql_item);
			
		}
		
		echo json_encode(['sucesso' => true, 'pedido_id' => $pedido_id]);
		
	}else{
		
		echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao criar pedido']);
		
	}
	
}else{
	
	echo json_encode(['sucesso' => false, 'mensagem' => 'Método não permitido']);
	
}

/* End - controller/salvar_pedido.php */
?>
