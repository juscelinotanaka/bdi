<!doctype html>
<html>
<head>
<meta charset="UTF-8">

<title>Sistema de Recomendações</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/flexnav.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>	
<script type="text/javascript" language="javascript" src="js/jquery.dropdownPlain.js"></script>
<script src="js/common.js"></script>

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
            	Bem vindo visitante. Você pode fazer <a href="login.php">login</a> ou <a href="cadastrar_usuario.php">criar um conta</a>. 
            </div>
            
            <div class="clear"></div>
            <div class="logo">
            <img src="images/logo.png">
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
            	<li><a href="#">Perfil</a>
                    <ul class="sub_menu">
<<<<<<< HEAD
                         <li><a href="cadastrar_produto.php">Cadastrar</a></li>
                         <li><a href="consultar_produto.php">Consultar</a></li>
                         
                    </ul>
                </li>
                <li><a href="#">Fornecedores</a>
=======
                         <li><a href="#">Cadastrar</a></li>
                         <li><a href="#">Consultar</a></li>
                    </ul>
                </li>
                <li><a href="#">Produto</a>
>>>>>>> 0e959e7a17d02c3a9ede595825e2a03bcb66d2ec
                    <ul class="sub_menu">
                         <li><a href="cadastrar_fornecedor.php">Cadastrar</a></li>
                         <li><a href="consultar_fornecedor.php">Consultar</a></li>
                    </ul>
                </li>
<<<<<<< HEAD
                <li><a href="#">Fabricantes</a>
=======
                <li><a href="#">Fornecedore</a>
>>>>>>> 0e959e7a17d02c3a9ede595825e2a03bcb66d2ec
                    <ul class="sub_menu">
                         <li><a href="cadastrar_fabricante.php">Cadastrar</a></li>
                         <li><a href="consultar_fabricante.php">Consultar</a></li>
                    </ul>
                </li>
<<<<<<< HEAD
                <li><a href="#">Lojas</a>
=======
                <li><a href="#">Fabricante</a>
>>>>>>> 0e959e7a17d02c3a9ede595825e2a03bcb66d2ec
                    <ul class="sub_menu">
                         <li><a href="cadastrar_loja.php">Cadastrar</a></li>
                         <li><a href="consultar_loja.php">Consultar</a></li>
                    </ul>
                </li>
<<<<<<< HEAD
                <li><a href="#">Perfis</a>
=======
                <li><a href="#">Loja</a>
>>>>>>> 0e959e7a17d02c3a9ede595825e2a03bcb66d2ec
                    <ul class="sub_menu">
                         <li><a href="cadastrar_perfil.php">Cadastrar</a></li>
                         <li><a href="consultar_perfil.php">Consultar</a></li>
                    </ul>
                </li>
                <li><a href="#">Amigos</a>
                    <ul class="sub_menu">
                         <li><a href="cadastrar_amigo.php">Adicionar</a></li>
                         <li><a href="consultar_amigo.php">Consultar</a></li>
                         <li><a href="recomendar_produto.php">Recomendar Produtos</a></li>
                    </ul>
                </li>
            </ul>
<<<<<<< HEAD


=======
>>>>>>> 0e959e7a17d02c3a9ede595825e2a03bcb66d2ec
      </div>
    </div>
    
    <div id="notification" class="contentCenter" style="display: none;">
    	<div class="success" style="">Você adicionou o item <a href="#">Early Morning</a> a sua <a href="#">lista de desejos</a>!<img id="btnClose" src="images/close.png" alt="" class="close">
        </div>
	</div>
    
    
    <div id="conteudo">
        <div class="contentCenter">
            <div class="texto">
            	<div class="colunaDireita">
                	Categorias
                </div>
            	<div class="principal">
                
                	<div class="breadcrumb">
                        <a href="http://www.santoshsetty.com/tf/opencart-templates/mystockimageshop-v15/index.php?route=common/home">Home</a>
                         » <a href="http://www.santoshsetty.com/tf/opencart-templates/mystockimageshop-v15/index.php?route=product/product&amp;product_id=60">Coffee Cups</a>
                         <?
                         
                         $crumbs = explode("/",$_SERVER["REQUEST_URI"]);
						 array_shift($crumbs);
						foreach($crumbs as $crumb){
							echo ucfirst(str_replace(array(".php","_"),array(""," "),$crumb) . ' ');
						}

						?>
					</div>
                        
      
                	<div class="tituloGrupo">Recomendados para Você</div>
                    <? for ($i = 0; $i < 13; $i++) { ?>
                    <div class="produto">
                        <div class="image"><a href=""><img src="images/cups1-130x100.jpg" alt="Coffee Cups"></a></div>
                        <div class="name"><a href="">Coffee Cups</a></div>
                        <div class="price">R$ 10.00</div>
                        <div class="cart"><a href="#" class="button"><span>Detalhes</span></a></div>
                    </div>
                    <? } ?>
                </div>
            </div>
            
            <div class="rodape">
            	<div class="floatRight">
                	Orientador: Altigran Silva
                </div>
	        	Desenvolvido por Henrique Pontes e Juscelino Tanaka
        	</div>
        </div>
        
        
    </div>
    <div id="rodape">
		
	</div>
</div>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		// initialize FlexNav
		$(".flexnav").flexNav();
	});
</script>
</body>
</html>