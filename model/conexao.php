<?php

if( $_SERVER['HTTP_HOST'] == 'localhost' ){

	require __DIR__ . '/conexao-off.php';

}else{
	
	require __DIR__ . '/conexao-on.php';
	
}

?>