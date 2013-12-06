<?
	include ("../funcoes.php"); 
	logado();
	getHeader();
	
	$produto = new Produto();
	$produto = consultarProduto($_GET['id']);
?>
            	<div class="colunaDireita">
                	<? getColunaHome(); ?>
                </div>
            	<div class="principal">
                
                	<div class="breadcrumb">
                       <?
						breadcrumb(array(
							'http://localhost/bdi/tp1/'=>'Home', 
							'artigo'=> $produto->getNome()
						));
						?>
					</div>
                    <div class="right">
                    	<div class="clear h36"></div>
                    	<img src="<? echo SYSURL; ?>nbs/<?php echo $produto->getImagem();?>" width="350" />
                    </div>
      
                    <div class="left">
                    	<div class="description">
                            <h1><?php echo $produto->getNome();?></h1>
                            <p><?php echo $produto->getDescricao();?></p>
                            <span>Tamanho:</span> <?php echo $produto->getTamanho()."\"";?><br>
                            <span>Processador:</span> <?php echo $produto->getProcessador();?><br>
                            <span>Memória RAM:</span> <?php echo $produto->getRam();?><br>
                            <span>HD:</span> <?php echo $produto->getHd();?><br>
                            <span>Vídeo</span> <?php echo $produto->getVideo();?>
                    	</div>
                        <!-- fim description -->
                    	<div class="price">
                        	 Preço: R$ <?php echo number_format($produto->getPreco(), 2, ',', '.');?><br />
						</div>	<!-- fim price -->
                    </div> <!-- fim right -->
                <div class="clear h16"></div>
            </div> <!-- fim principal -->
            
<?
getFooter(); 
?>