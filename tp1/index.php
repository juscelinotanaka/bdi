<?
	include ("funcoes.php"); 
	
	if ($_GET['logout'] == 'true') {
		logout();
	}
	
	logado();
	
	$perfis = consultarPerfil($_SESSION['idUsuario']);
	
	if ( !$perfis ) {
		header("location:".SYSURL."perfil/cadastrar.php?primeiroAcesso=true");
	}
	
	$perfis = consultarPerfil($_SESSION['idUsuario']);
	
	foreach ($perfis as $perfil){
		$recomendacoes = produtosRecomendados($perfil);
	}
	
	getHeader();
?>
            	<div class="colunaDireita">
                	<? getColunaHome(); ?>
                </div>
            	<div class="principal">
                
                	<div class="breadcrumb">
                       <?
						breadcrumb(array(
							'http://localhost/bdi/tp1/'=>'Home'
						));
						?>
					</div>
                        
      
                	<div class="tituloGrupo">Recomendados para Você</div>
                    <? foreach ($recomendacoes as $prod) { ?>
                    <div class="produto">
                        <div class="image"><a href="<? echo SYSURL ?>produto/detalhes.php?id=<? echo $prod->getId(); ?>"><img src="nbs/<?php echo $prod->getImagem();?>" alt="Coffee Cups"></a></div>
                        <div class="name"><a href="<? echo SYSURL ?>produto/detalhes.php?id=<? echo $prod->getId(); ?>"><? echo $prod->getNome(); ?></a></div>
                        <div class="price"><? echo $prod->getPreco(); ?></div>
                        <div class="cart"><a href="<? echo SYSURL ?>produto/detalhes.php?id=<? echo $prod->getId(); ?>" class="button"><span>Detalhes</span></a></div>
                    </div>
                    <? } ?>
                    
                    
                    <div class="tituloGrupo">Recomendados pelos seus amigos</div>
                    <? for ($i = 0; $i < 5; $i++) { ?>
                    	<div class="produto">
                            <div class="image"><a href="#"><img src="images/cups1-130x100.jpg" alt="Coffee Cups"></a></div>
                            <div class="name"><a href="#">Coffee Cups</a></div>
                            <div class="price">R$ 10.00</div>
                            <div class="por"><a href="#">Por: Fulano de Tal</a></div>
                            <div class="cart"><a href="#" class="button"><span>Detalhes</span></a></div>
                        </div>
                    <? } ?>
                    
                    
                </div>
            
            </div> <!-- fim principal -->
            
<?
getFooter(); 
?>