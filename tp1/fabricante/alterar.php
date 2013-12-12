<?php 
	
	include ("../funcoes.php"); 
	logado();
	
	if ($_POST['acao'] == 'alterar') {
		
		$fabricante = new Fabricante();
		
		$fabricante->setId($_GET['id']);
		$fabricante->setNome($_POST['nome']);
		$fabricante->setNacionalidade($_POST['nacionalidade']);
		
		$fabricanteAlterado = alterarFabricante($fabricante);	
		
		if($fabricanteAlterado){
			header('Location:' . SYSURL. "fabricante/index.php?alteracao=ok");
		}
		else{
			echo '<script type="text/javascript">alert("Erro no cadastro!");</script>';
		}
	}
	
	$fabricante = consultarFabricante($_GET['id']);
	
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
							'fabricante'=>'Fabricantes',
							'alterar.php'=>'Alterar'
						));
						?>
					</div>
      
                    <div class="geral">
                    	<div class="description">
                            <h1>Alterar Fabricante</h1>
                            <p>Edite os dados do fabricante.</p>
                            <form method="post" id="cadastrarFabricante" onsubmit="return fabricanteOK();">
                            <span class="cadPerf"><span class="required">*</span> Nome: </span> 																	<input type="text" name="nome" value="<?php echo $fabricante->getNome();?>"/><br><br />
                            <span class="cadPerf"><span class="required">*</span> Nacionalidade: </span> 																	<input type="text" name="nacionalidade" value="<?php echo $fabricante->getNacionalidade();?>"/><br><br />
                            
                            <input type="hidden" value="alterar" name="acao" />
                            <input type="submit" id="btnCadastrar" style="display:none;">
                        	<a onclick="$('#btnCadastrar').click();" class="button"><span>Salvar alterações</span></a>
                            </form>
                    	</div>
                        <!-- fim description -->
                    </div> <!-- fim right -->
                <div class="clear h16"></div>
            </div> <!-- fim principal -->
            
<?
	getFooter(); 
?>