<?php 
	
	include ("../funcoes.php"); 
	logado();
	
	if ($_POST['acao'] == 'cadastrar') {
		
		$loja = new Loja();
		$loja->setNome($_POST['nome']);
		$loja->setFisico($_POST['tipo']);
		$loja->setEndereco($_POST['endereco']);
		
		$cadastro = cadastrarLoja($loja);	
		
		
		if($cadastro == 1){
			header('Location:' . SYSURL. "loja/index.php?cadastro=ok");
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
							'loja'=>'Loja',
							'cadastrar.php'=>'Cadastrar Loja'
						));
						?>
					</div>
      
                    <div class="geral">
                    	<div class="description">
                            <h1>Cadastrar Loja</h1>
                            <p>Informe os dados da loja.</p>
                            <form method="post" id="cadastrarLoja" onsubmit="return lojaOK();">
                            <span class="cadPerf"><span class="required">*</span> Nome: </span> 																	<input type="text" name="nome" /><br><br />
                           <span class="required">*</span> <span class="cadPerf">Tipo:</span> 
                            <select name="tipo">
                            	<option value="">Selecione:</option>
                                <option value="1">Física</option>
                                <option value="2">Virtual</option>
                            </select>
                            <br><br>
                            <span class="cadPerf"><span class="required">*</span> Endereço: </span> 																	<input type="text" name="endereco" /><br><br />
                            
                            <input type="hidden" value="cadastrar" name="acao" />
                            <input type="submit" id="btnCadastrar" style="display:none;">
                        	<a onclick="$('#btnCadastrar').click();" class="button"><span>Cadastrar</span></a></form>
                    	</div>
                        <!-- fim description -->
                    </div> <!-- fim right -->
                <div class="clear h16"></div>
            </div> <!-- fim principal -->
            
<?
	if($cadastro == 2){
		alertar("Informe o tipo da loja", "erro");
	}
	getFooter(); 
?>