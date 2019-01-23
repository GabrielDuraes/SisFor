<?php

	require_once "../config.php";
	

	//parte1
	
	$id_forum = $_POST['id_forum'];
	$titulo_forum = $_POST['titulo_forum'];
	$descricao = $_POST['descricao'];
	$fk_usuario = $_POST['fk_usuario'];
	
	
	//parte2
	$action = $_POST['action'];
	
	//parte3
	$Item = new Foruns();
	$Item->SetValues($id_forum, $titulo_forum, $descricao, $fk_usuario); 
	
	
		
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
