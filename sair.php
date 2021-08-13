<?php
	session_start();
	
	unset(
		$_SESSION['usuarioId'],
		$_SESSION['usuarioNome'],
		$_SESSION['usuariocpf'],
		$_SESSION['permissao'],
		$_SESSION['sn_admin'],
		$_SESSION['sn_importar_arquivos'],
		$_SESSION['sn_pendencias_prontuario'],
		$_SESSION['sn_lancamentos_pgr'],
		$_SESSION['usuarioADM']
	);
	
	$_SESSION['msgneutra'] = "Logout realizado com sucesso!";
	
	//redirecionar o usuario para a página de login
	header("Location: index.php");

?>