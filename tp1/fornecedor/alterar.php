<?php 
	
	include ("../funcoes.php"); 
	logado();
	
	if ($_POST['acao'] == 'alterar') {
		
		$fornecedor = new Fornecedor();
		
		$fornecedor->setId($_GET['id']);
		$fornecedor->setNome($_POST['nome']);
		
		$fornecedorAlterado = alterarFornecedor($fornecedor);	
		
		if($fornecedorAlterado){
			header('Location:' . SYSURL. "fornecedor/index.php?alteracao=ok");
		}
		
		
	}
	
	$fornecedor = consultarFornecedor($_GET['id']);
	
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
							'fornecedor'=>'Fornecedores',
							'alterar.php'=>'Alterar'
						));
						?>
					</div>
      
                    <div class="geral">
                    	<div class="description">
                            <h1>Alterar Fornecedor</h1>
                            <p>Edite os dados do fornecedor.</p>
                            <form method="post" id="cadastrarFornecedor" onsubmit="return fornecedorOK();">
                            <span><span class="required">*</span> Nome: </span> 																	<input type="text" name="nome" value="<?php echo $fornecedor->getNome();?>"/><br><br />
                            
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