<?php
@session_start();
// Se o usuário não está logado, manda para página de login.
if (!isset($_SESSION['usuarioNome'])){
	
	unset(
		$_SESSION['usuarioId'],
		$_SESSION['usuarioNome'],
		$_SESSION['usuariocpf'],
		$_SESSION['permissao'],
		$_SESSION['usuarioADM']
		
	);
	
	$_SESSION['loginErro'] = "Sessão expirada!";
	header("Location: index.php");
	
};
?>