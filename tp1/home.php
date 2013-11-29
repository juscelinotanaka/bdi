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
            	Bem vindo visitante. Você pode fazer <a href="login.php">login</a> ou <a href="cadastrar.php">criar um conta</a>. 
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
                         <li><a href="#">Cadastrar</a></li>
                         <li><a href="#">Consultar</a></li>
                         <li><a href="#">Um Menu Com Nome Maior</a></li>
                         
                    </ul>
                </li>
                <li><a href="#">Fornecedore</a>
                    <ul class="sub_menu">
                         <li><a href="#">Cadastrar</a></li>
                         <li><a href="#">Consultar</a></li>
                    </ul>
                </li>
                <li><a href="#">Fabricante</a>
                    <ul class="sub_menu">
                         <li><a href="#">Cadastrar</a></li>
                         <li><a href="#">Consultar</a></li>
                    </ul>
                </li>
                <li><a href="#">Loja</a>
                    <ul class="sub_menu">
                         <li><a href="#">Cadastrar</a></li>
                         <li><a href="#">Consultar</a></li>
                    </ul>
                </li>
                <li><a href="#">Perfil</a>
                    <ul class="sub_menu">
                         <li><a href="#">Cadastrar</a></li>
                         <li><a href="#">Consultar</a></li>
                    </ul>
                </li>
                
            </ul>






			            
      </div>
    </div>
    
    <div id="notification" class="contentCenter">
    	<div class="success" style="">Sucesso: Você adicionou o item <a href="http://www.santoshsetty.com/tf/opencart-templates/mystockimageshop-v15/index.php?route=product/product&amp;product_id=59">Early Morning</a> a sua <a href="http://www.santoshsetty.com/tf/opencart-templates/mystockimageshop-v15/index.php?route=checkout/cart">lista de desejos</a>!<img src="images/close.png" alt="" class="close">
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