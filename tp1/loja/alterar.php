<?php 
	
	include ("../funcoes.php"); 
	logado();
	
	if ($_POST['acao'] == 'alterar') {
		
		$loja = new Loja();
		
		$loja->setId($_GET['id']);
		$loja->setNome($_POST['nome']);
		$loja->setFisico($_POST['tipo']);
		$loja->setEndereco($_POST['endereco']);
		
		$lojaAlterada = alterarLoja($loja);	
		
		
		if($lojaAlterada == 1){
			header('Location:' . SYSURL. "loja/index.php?alteracao=ok");
		}
	}
	
	$loja = consultarLoja($_GET['id']);
	
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
							'loja'=>'Lojas',
							'alterar.php'=>'Alterar'
						));
						?>
					</div>
      
                    <div class="geral">
                    	<div class="description">
                            <h1>Alterar Loja</h1>
                            <p>Edite os dados da loja.</p>
                            <form method="post" id="cadastrarLoja" onsubmit="return lojaOK();">
                            <span class="cadPerf"><span class="required">*</span> Nome: </span> 																	<input type="text" name="nome" value="<?php echo $loja->getNome();?>" /><br><br />
                           <span class="required">*</span> <span class="cadPerf">Tipo:</span> 
                            <select name="tipo">
                            	<?php
                                	if($loja->getId() == 1){
										echo '<option value="1" selected>Física</option>';
										echo '<option value="2">Virtual</option>';
									}
									else{
										echo '<option value="1">Física</option>';
										echo '<option value="2" selected>Virtual</option>';
									}
								?>
                            </select>
                            <br><br>
                            <span class="cadPerf"><span class="required">*</span> Endereço: </span> 																	<input type="text" name="endereco" value="<?php echo $loja->getEndereco();?>"/><br><br />
                            
                            <input type="hidden" value="alterar" name="acao" />
                            <input type="submit" id="btnCadastrar" style="display:none;">
                        	<a onclick="$('#btnCadastrar').click();" class="button"><span>Salvar alterações</span></a></form>
                    	</div>
                        <!-- fim description -->
                    </div> <!-- fim right -->
                <div class="clear h16"></div>
            </div> <!-- fim principal -->
            
<?
	getFooter(); 
?>