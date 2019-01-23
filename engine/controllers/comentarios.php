<?php

	require_once "../config.php";
	

	//parte1
	
	$id_comentario = $_POST['id_comentario'];
	$fk_forum = $_POST['fk_forum'];
	$fk_usuario = $_POST['fk_usuario'];
	$comentario = $_POST['comentario'];
	
	
	//parte2
	$action = $_POST['action'];
	
	//parte3
	$Item = new Comentarios();
	$Item->SetValues($id_comentario, $fk_forum, $fk_usuario, $comentario); 
	
	
		
	//parte4
	switch($action) {
		case 'create':
			
			
			$res = $Item->Create();
			if ($res === NULL) {
				$res = "true";
			}
			else {
				$res = "false";	
			}			

			echo $res;
			
		
		break;	
		
		case 'update':
		
			
			
			$res = $Item->Update();
			
			if ($res === NULL) {
				$res= 'true';	
			}
			else {
				$res = 'false';	
			}
			echo $res;
			
		
		break;	
		
		case 'delete':
		
			
			
			$res = $Item->Delete();
			if ($res === NULL) {
				$res= 'true';	
			}
			else {
				$res = 'false';	
			}
			echo $res;
			
		
		break;	
		
		
		
	}
?>
