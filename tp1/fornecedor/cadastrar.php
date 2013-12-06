<?php 
	
	include ("../funcoes.php"); 
	logado();
	
	if ($_POST['acao'] == 'cadastrar') {
		
		$fornecedor = new Fornecedor();
		$fornecedor->setNome($_POST['nome']);
		
		$cadastro = cadastrarFornecedor($fornecedor);	
		
		if($cadastro){
			echo '<script type="text/javascript">alert("Cadastro realizado com sucesso!");</script>';
		}
		else{
			echo '<script type="text/javascript">alert("Erro no cadastro!");</script>';
		}
		
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
							'http://localhost/bdi/tp1/'=>'Home', 
							'fornecedor'=>'Fornecedor',
							'cadastrar.php'=>'Cadastrar Fornecedor'
						));
						?>
					</div>
      
                    <div class="geral">
                    	<div class="description">
                            <h1>Cadastrar Fornecedor</h1>
                            <p>Informe os dados do fornecedor.</p>
                            <form method="post" id="cadastrarFornecedor" onsubmit="return fornecedorOK();">
                            <span><span class="required">*</span> Nome: </span> 																	<input type="text" name="nome" /><br><br />
                            
                            <input type="hidden" value="cadastrar" name="acao" />
                            <input type="submit" id="btnCadastrar" style="display:none;">
                        	<a onclick="$('#btnCadastrar').click();" class="button"><span>Cadastrar</span></a>
                            </form>
                    	</div>
                        <!-- fim description -->
                    </div> <!-- fim right -->
                <div class="clear h16"></div>
            </div> <!-- fim principal -->
            
<?
	getFooter(); 
?>