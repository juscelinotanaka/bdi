<?php
	include("funcoes.php");
	
	print 'Get: '.$_GET['nome'].'<br>'.'<br>';
	print 'Post: '.$_POST['sobrenome'].'<br>'.'<br>';
	print 'Acao: '.$_POST['acao'].'<br>'.'<br>';
	
	if ($_POST['acao'] == 'cadastrar') {
		if ($_POST['nome'] != ""){
			cadastrarUsuario($_POST['nome'],$_POST['sobrenome'],$_POST['cpf'],$_POST['email'],$_POST['senha'],$_POST['apelido']);
		}
		
		
	}
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Cadastro de Usuário</title>
<style type="text/css">
.wd100 { width:100px; }

a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
</style>
</head>

<body>
    <form method="post" >
        <div>Nome:</div><input type="text" name="nome"><br>
        <div>Sobrenome:</div><input type="text" name="sobrenome"><br>
        <div>CPF:</div><input type="text" name="cpf"><br>
        <div>Email:</div><input type="email" name="email"><br>
        <div>Senha:</div><input type="password" name="senha"><br>
        <div>Apelido:</div><input type="text" name="apelido"><br>
        <br>
        <input type="hidden" name="acao" value="cadastrar">
        <input type="submit" value="Cadastrar">
    </form>
    
    
    <form action="listarUsuarios.php">
    	<input name="id">
        <input type="submit" value="Buscar">
    </form>
</body>
</html>