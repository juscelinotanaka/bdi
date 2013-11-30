
<!doctype html>
<html>
<head>
<meta charset="UTF-8">

<title>Sistema de Recomendações</title>
<link href="<? echo SYSURL; ?>css/style.css" rel="stylesheet" type="text/css" />
<link href="<? echo SYSURL; ?>css/flexnav.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<? echo SYSURL; ?>js/jquery-1.3.1.min.js"></script>	
<script type="text/javascript" language="javascript" src="<? echo SYSURL; ?>js/jquery.dropdownPlain.js"></script>
<script src="js/common.js"></script>

</head>
<body>
<div id="tudo">
	<div id="cabecalho">
    	<div class="contentCenter">
        	
            <div class="menuSup">
            	
            	<?
				
				 if (str_ireplace(array('-', '.php'), array(' ', ''), basename($_SERVER['PHP_SELF'])) != "login") { ?>
            	<a href="home.php"> Home </a> | 
                <a href="home.php"> Recomendações </a> | 
                <a href="home.php"> Conta </a> | 
                <a href="<? print SYSURL ?>index.php?logout=true"> Sair </a>
                <? } ?>
            </div>
            <div class="clear"></div>
            
            <div class="bemvindo floatRight">
            	<? getBemVindo(); ?>
            </div>
            
            <div class="clear"></div>
            <div class="logo">
            <img src="<? echo SYSURL; ?>images/logo.png">
            </div>
            <div class="pesquisar">
            	<form action="pesquisar.php" method="get">
            	<div class="campo">
					<input type="text" name="q" placeholder="Pesquisar">
                </div>
                <input class="pesquisarBtn" type="submit" value="">
                </form>
                
            </div>
            <div class="clear"></div>
            
            <ul class="dropdown">
            	<li><a href="#">Perfis</a>
                    <ul class="sub_menu">
                         <li><a href="#">Cadastrar</a></li>
                         <li><a href="#">Consultar</a></li>
                    </ul>
                </li>
                <li><a href="#">Amigos</a>
                    <ul class="sub_menu">
                         <li><a href="#">Cadastrar</a></li>
                         <li><a href="#">Consultar</a></li>
                    </ul>
                </li>
                <li><a href="#">Produtos</a>
                    <ul class="sub_menu">
                         <li><a href="#">Cadastrar</a></li>
                         <li><a href="#">Consultar</a></li>
                    </ul>
                </li>
                <li><a href="#">Fornecedores</a>
                    <ul class="sub_menu">
                         <li><a href="#">Cadastrar</a></li>
                         <li><a href="#">Consultar</a></li>
                    </ul>
                </li>
                <li><a href="#">Fabricantes</a>
                    <ul class="sub_menu">
                         <li><a href="#">Cadastrar</a></li>
                         <li><a href="#">Consultar</a></li>
                    </ul>
                </li>
                <li><a href="#">Lojas</a>
                    <ul class="sub_menu">
                         <li><a href="#">Cadastrar</a></li>
                         <li><a href="#">Consultar</a></li>
                    </ul>
                </li>
            </ul>
      </div>
    </div>
    
    <div id="notification" class="contentCenter" style="display: none;">
    	<div class="success" style="">Você adicionou o item <a href="#">Early Morning</a> a sua <a href="#">lista de desejos</a>!<img id="btnClose" src="<? echo $SYSURL; ?>images/close.png" alt="" class="close">
        </div>
	</div>
    
    
    <div id="conteudo">
        <div class="contentCenter">
            <div class="texto">