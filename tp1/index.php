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
	
	
	$recomendacoesAmigos = produtosRecomendadosPorAmigos($_SESSION['idUsuario']);

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
                    
                    <? if ($recomendacoesAmigos) { ?>
                        <div class="tituloGrupo">Recomendados pelos seus amigos</div>
                        <? foreach ($recomendacoesAmigos as $prodAmigos) { ?>
                            <div class="produto">
                                <div class="image"><a href="<? echo SYSURL ?>produto/detalhes.php?id=<? echo $prodAmigos->getId(); ?>"><img src="nbs/<?php echo $prodAmigos->getImagem();?>" width="130" alt="Coffee Cups"></a></div>
                                <div class="name"><a href="<? echo SYSURL ?>produto/detalhes.php?id=<? echo $prodAmigos->getId(); ?>"><? echo $prodAmigos->getNome(); ?></a></div>
                                <div class="price">R$ <? echo number_format($prodAmigos->getPrecoReal(), 2, ',', '.'); ?></div>
                                <div class="por"><a href="#">Por: <?php echo $prodAmigos->getNomeAmigo().' '.$prodAmigos->getSobrenomeAmigo(); ?></a></div>
                                <div class="cart"><a href="<? echo SYSURL ?>produto/detalhes.php?id=<? echo $prodAmigos->getId(); ?>" class="button"><span>Detalhes</span></a></div>
                            </div>
                        <? } ?>
                    <? } ?>
                    
                    
                    <? foreach ($perfis as $perfil) { ?>
                    <div class="conjunto">
                        <div class="tituloGrupo">Recomendados para o perfil <? echo $perfil->getDescricao(); ?></div>
                        
                        <div id="ca-container-<? echo $perfil->getId(); ?>" class="ca-container" >
                            <div class="ca-wrapper">
                                <? $recomendacoes = produtosRecomendadosPorPerfil($_SESSION['idUsuario'], $perfil->getId()); ?> 
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
                        
                        <div class="clear"></div>
                        
                        <script type="text/javascript">
                            $('#ca-container-<? echo $perfil->getId(); ?>').contentcarousel();
                        </script>
					</div>
                        
                    <? } ?>
                    
                    
                </div>
                
                
                
                
            
            
            
<?
getFooter(); 
?>