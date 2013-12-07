<?php
	include ("funcoes.php"); 
	
	if ($_GET['logout'] == 'true') {
		logout();
	}
	
	logado();
	
	$perfis = consultarPerfil($_SESSION['idUsuario']);
	
	if ( !$perfis ) {
		header("location:".SYSURL."perfil/cadastrar.php?primeiroAcesso=true");
	}
	
	$recomendacoes = produtosRecomendados($_SESSION['idUsuario']);
	
	getHeader();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="css/style2.css" />
<title>Untitled Document</title>
</head>
	
    <div class="tituloGrupo">Recomendados para o Perfil TOP</div>
	<div id="ca-container" class="ca-container" >
        <div class="ca-wrapper">
             
			 <? foreach ($recomendacoes as $prod) { ?>
            <div class="ca-item ca-item-1">
                <div class="ca-item-main">
                    <a href="<? echo SYSURL ?>produto/detalhes.php?id=<? echo $prod->getId(); ?>" target=_blank><img src="nbs/<?php echo $prod->getImagem();?>" class="img-slide" /></a>
                    <a href="<? echo SYSURL ?>produto/detalhes.php?id=<? echo $prod->getId(); ?>" class=titulo_slide><p><? echo $prod->getNome(); ?></p></a>
                    <div class="price">R$ <? echo number_format($prod->getPrecoReal(), 2, ',', '.'); ?></div>
                    
                    <div class="cart"><a href="<? echo SYSURL ?>produto/detalhes.php?id=<? echo $prod->getId(); ?>" class="button"><span>Detalhes</span></a></div>
                </div>
            </div>    
            <? } ?>
            
        </div>
	</div>
  

<body>
</body>
</html>

<script src="js/jquery-1.3.1.min.js"></script>
	<script src="js/jquery.easing.1.3.js" type="text/javascript"></script>
    <script src="js/jquery.mousewheel.js" type="text/javascript"></script>
    <script src="js/jquery.contentcarousel.js" type="text/javascript"></script>
    <script type="text/javascript">
    
        $('#ca-container').contentcarousel();
    
    </script>
    
     <!--<div class="ca-item ca-item-1">
                <div class="ca-item-main">
                <a href="#" target=_blank><img src="nbs/acer1.jpg" class="img-slide" /></a>
                <a href="#" class=titulo_slide><p>Notebook</p></a>
                </div>
            </div>-->