<?
include ("../funcoes.php"); 
logado();
getHeader();
?>
            	<div class="colunaDireita">
                	<? getColunaHome(); ?>
                </div>
            	<div class="principal">
                
                	<div class="breadcrumb">
                       <?
						breadcrumb(array(
							'http://localhost/bdi/tp1/'=>'Home', 
							'artigo'=>'Titulo do Produto'
						));
						?>
					</div>
                    <div class="right">
                    	<div class="clear h36"></div>
                    	<img src="<? echo SYSURL; ?>images/grass5-500x500.jpg" width="350" />
                    </div>
      
                    <div class="left">
                    	<div class="description">
                            <h1>Green Grass</h1>
                            <p>Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
                            <span>Tamanho:</span> 17'<br>
                            <span>Processador:</span> Intel i5<br>
                            <span>Memória RAM:</span> 2GB<br>
                            <span>HD:</span> 500GB<br>
                            <span>Vídeo</span> 1GB
                    	</div>
                        <!-- fim description -->
                    	<div class="price">
                        	Preço: R$5.00<br />
						</div>	<!-- fim price -->
                    </div> <!-- fim right -->
                <div class="clear h16"></div>
            </div> <!-- fim principal -->
            
<?
getFooter(); 
?>