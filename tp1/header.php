<!doctype html>
<html>
<head>
<meta charset="UTF-8">

<title>Sistema de Recomendações</title>
<link href="<? echo SYSURL; ?>css/style.css" rel="stylesheet" type="text/css" />
<link href="<? echo SYSURL; ?>css/flexnav.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<? echo SYSURL; ?>css/tabela.css">

<script src="<? echo SYSURL; ?>js/jquery-1.3.1.min.js"></script>	
<script src="<? echo SYSURL; ?>js/jquery.dropdownPlain.js"></script>
<script src="<? echo SYSURL; ?>js/common.js"></script>
<script src="<? echo SYSURL; ?>js/jquery.validate.js"></script>
<script src="<? echo SYSURL; ?>js/additional-methods.js"></script>
<script src="<? echo SYSURL; ?>js/jquery.easing.1.3.js"></script>
<script src="<? echo SYSURL; ?>js/jquery.contentcarousel.js"></script>
<script src="<? echo SYSURL; ?>js/jquery.mousewheel.js"></script>

<script src="<? echo SYSURL; ?>js/datatable.js"></script>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#example').dataTable();
	} );
</script>


</head>
<body>
<div id="tudo">
	<div id="cabecalho">
    	<div class="contentCenter">
        	
            <div class="menuSup">
            	
            	<?
				
				 if (str_ireplace(array('-', '.php'), array(' ', ''), basename($_SERVER['PHP_SELF'])) != "login") { ?>
            	<a href="<? print SYSURL; ?>index.php"> Home </a> | 
                <a href="<? print SYSURL; ?>usuario/"> Minha Conta </a> | 
                <a href="<? print SYSURL; ?>index.php?logout=true"> Sair </a>
                <? } ?>
            </div>
            <div class="clear"></div>
            
            <div class="bemvindo floatRight">
            	<? getBemVindo(); ?>
            </div>
            
            <div class="clear"></div>
            <div class="logo">
            	<a href="<? print SYSURL; ?>index.php"> <img src="<? echo SYSURL; ?>images/logo.png" width="350"></a>
            </div>
           	<div class="pesquisar">
            	<form action="<? echo SYSURL; ?>produto" method="get">
            	<div class="campo">
					<input type="text" name="q" placeholder="Pesquisar">
                </div>
                <input class="pesquisarBtn" type="submit" value="">
                </form>
                
            </div>
            <div class="clear"></div>
            
            <ul class="dropdown">
            	<li><a href="<? echo SYSURL; ?>perfil/">Perfis</a>
                    <ul class="sub_menu">
                         <li><a href="<? echo SYSURL; ?>perfil/cadastrar.php">Cadastrar</a></li>
                         <li><a href="<? echo SYSURL; ?>perfil/">Consultar</a></li>
                    </ul>
                </li>
                <li><a href="<? echo SYSURL; ?>amigo/">Amigos</a>
                    <ul class="sub_menu">
                         <li><a href="<? echo SYSURL; ?>amigo/buscar.php">Adicionar</a></li>
                         <li><a href="<? echo SYSURL; ?>amigo/">Ver Amigos</a></li>
                    </ul>
                </li>
                <li><a href="<? echo SYSURL; ?>produto/">Produtos</a>
                    <ul class="sub_menu">
                         <li><a href="<? echo SYSURL; ?>produto/cadastrar.php">Cadastrar</a></li>
                         <li><a href="<? echo SYSURL; ?>produto/">Consultar</a>
                         	<ul>
                            	<li><a href="<? echo SYSURL; ?>produto/">Por Característica</a></li>
                                <li><a href="<? echo SYSURL; ?>produto/fornecedor.php">Por Fornecedor</a></li>
                                <li><a href="<? echo SYSURL; ?>produto/fabricante.php">Por Fabricante</a></li>
                            </ul>
                         </li>
                    </ul>
                </li>
                <li><a href="<? echo SYSURL; ?>fornecedor/">Fornecedores</a>
                    <ul class="sub_menu">
                         <li><a href="<? echo SYSURL; ?>fornecedor/cadastrar.php">Cadastrar</a></li>
                         <li><a href="<? echo SYSURL; ?>fornecedor/">Consultar</a></li>
                    </ul>
                </li>
                <li><a href="<? echo SYSURL; ?>fabricante/">Fabricantes</a>
                    <ul class="sub_menu">
                         <li><a href="<? echo SYSURL; ?>fabricante/cadastrar.php">Cadastrar</a></li>
                         <li><a href="<? echo SYSURL; ?>fabricante/">Consultar</a></li>
                    </ul>
                </li>
                <li><a href="<? echo SYSURL; ?>loja/">Lojas</a>
                    <ul class="sub_menu">
                         <li><a href="<? echo SYSURL; ?>loja/cadastrar.php">Cadastrar</a></li>
                         <li><a href="<? echo SYSURL; ?>loja/">Consultar</a></li>
                    </ul>
                </li>
            </ul>
      </div>
    </div>
    
    <div id="notification" class="contentCenter" style="display: none;">
    	<div class="img close"><img id="btnClose" src="<? print SYSURL; ?>images/close.png" alt="Fechar" title="Fechar" class="close"></div>
        <div id="mensagem" class="mensagem">texto aqui!</div>
	</div>
    
    
    <div id="conteudo">
        <div class="contentCenter">
        	<!-- inicio texto -->
            <div class="texto">
            