<!doctype html>
<html>
<head>
<meta charset="UTF-8">

<title>Sistema de Recomendações</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/flexnav.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>	
<script type="text/javascript" language="javascript" src="js/jquery.dropdownPlain.js"></script>


</head>
<body>
<div id="tudo">
	<div id="cabecalho">
    	<div class="contentCenter">
        	
            <div class="menuSup">
            	<a href="home.php"> Home </a> | <a href="home.php"> Recomendações </a> | <a href="home.php"> Conta </a>
            </div>
            <div class="clear"></div>
            <div class="bemvindo floatRight">
            	Bem vindo visitante. Você pode fazer <a href="login.php">login</a> ou <a href="usuario/cadastrar_usuario.php">criar um conta</a>. 
            </div>
            <div class="clear"></div>
            <div class="logo">
            <img src="images/logo.png">
            </div>
            <div class="pesquisar">
            	<div class="campo">
                	<form action="pesquisar.php" method="get">
	        			<input type="text" name="q" placeholder="Pesquisar">
                    </form>
                </div>
                <input class="pesquisarBtn" type="submit" value="">
                
            </div>
            <div class="clear"></div>
            
            <ul class="dropdown">
                <li><a href="#">Produto</a>
                    <ul class="sub_menu">
                         <li><a href="produto/cadastrar_produto.php">Cadastrar</a></li>
                         <li><a href="produto/consultar_produto.php">Consultar</a></li>
                         
                    </ul>
                </li>
                <li><a href="#">Fornecedores</a>
                    <ul class="sub_menu">
                         <li><a href="fornecedor/cadastrar_fornecedor.php">Cadastrar</a></li>
                         <li><a href="fornecedor/consultar_fornecedor.php">Consultar</a></li>
                    </ul>
                </li>
                <li><a href="#">Fabricantes</a>
                    <ul class="sub_menu">
                         <li><a href="fabricante/cadastrar_fabricante.php">Cadastrar</a></li>
                         <li><a href="fabricante/consultar_fabricante.php">Consultar</a></li>
                    </ul>
                </li>
                <li><a href="#">Lojas</a>
                    <ul class="sub_menu">
                         <li><a href="loja/cadastrar_loja.php">Cadastrar</a></li>
                         <li><a href="loja/consultar_loja.php">Consultar</a></li>
                    </ul>
                </li>
                <li><a href="#">Perfis</a>
                    <ul class="sub_menu">
                         <li><a href="perfil/cadastrar_perfil.php">Cadastrar</a></li>
                         <li><a href="perfil/consultar_perfil.php">Consultar</a></li>
                    </ul>
                </li>
                <li><a href="#">Amigos</a>
                    <ul class="sub_menu">
                         <li><a href="amigo/cadastrar_amigo.php">Adicionar</a></li>
                         <li><a href="amigo/consultar_amigo.php">Consultar</a></li>
                         <li><a href="produto/recomendar_produto.php">Recomendar Produtos</a></li>
                    </ul>
                </li>
                
            </ul>


      </div>
    </div>