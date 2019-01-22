<?php

require_once "../config.php";

$id_usuario= $_POST['id_usuario'];
$nome= addslashes($_POST['nome']);
$genero= $_POST['genero'];
$data_nasc= $_POST['data_nasc'];
$matricula= $_POST['matricula'];
$email= addslashes($_POST['email']);
$curso= $_POST['curso'];
$periodo= $_POST['periodo'];
$senha= addslashes($_POST['senha']);

$action = $_POST['action'];

$Item = new Usuario();
$Item->SetValues($id_usuario, $nome, $genero, $data_nasc, $matricula, $email, $curso, $periodo, password_hash($senha, PASSWORD_DEFAULT));

switch($action){
	case 'create':
	// Executa ação em tempo aleatório entre 0 e 3 segundos
	// e diminui a possibilidade de conflitos
	sleep(rand(0,3));

	$res = $Item->Create();
	$res = json_decode($res);

	if($res->{'result'} === NULL){
		$result['res'] = "true";
	}else{
		$result['res'] = "false";
	}

	// $result['id_usuario'] = $res->{'lastId'};
	$result['id_usuario'] = $res->{'lastId'};

	echo json_encode($result);
	break;

	case 'update':
	$res = $Item->Update();

	if($res === NULL){
		$res= 'true';
	}else{
		$res = 'false';
	}
	echo $res;
	break;

	case 'delete':

	$res = $Item->Delete();
	if($res === NULL){
		$res= 'true';
	}else{
		$res = 'false';
	}
	echo $res;
	break;


	case 'updateSenha':
	$res = $Item->UpdateSenha($email);

	if($res === NULL){
		$res= 'true';
	}else{
		$res = 'false';
	}
	echo $res;
	break;

	case 'verificaEmail':
	$Usuario = new Usuario();
	$Usuario = $Usuario->ReadAll();

	$Usuario_dasa = new Usuario_dasa();
	$Usuario_dasa = $Usuario_dasa->ReadAll();

	foreach ($Usuario as $user) {if ($user['email'] == $email) {$res = 'true'; break; } }

	foreach ($Usuario_dasa as $dasa) {if ($dasa['email'] == $email) {$res = 'true'; break; } }

	echo $res;
	break;

	case 'cripto':
		$Usuario = new Usuario();
  		$Usuario = $Usuario->Read($_POST['id_usuario']);
  		$senha_temp = $Usuario['senha'];

		if (password_verify($senha, $senha_temp)) {
			$res = "true";
		} else {
			$res = "false";
		}
		echo $res;

	break;

	case 'buscar_cpf':
			$Usuario = new Usuario();
			$Usuario = $Usuario->Read_cpf($cpf);
			if (!$Usuario) {
				$res['res'] = 'false';
			} else {
				$res['res'] = 'true';
				$res['id_usuario'] = $Usuario['id_usuario'];
				$res['nome'] = $Usuario['nome'];
				$res['tipo_usuario'] = $Usuario['tipo_usuario'];
			}
			echo json_encode($res);
		break;
}
?>