<?php 
	
	include ("../funcoes.php"); 
	logado();
	
	if ($_POST['acao'] == 'cadastrar') {
		
		$fabricante = new Fabricante();
		$fabricante->setNome($_POST['nome']);
		$fabricante->setNacionalidade($_POST['nacionalidade']);
		
		$cadastro = cadastrarFabricante($fabricante);	
		
		if($cadastro == 1){
			header('Location:' . SYSURL. "fabricante/index.php?cadastro=ok");
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
							'fabricante'=>'Fabricantes',
							'cadastrar.php'=>'Cadastrar'
						));
						?>
					</div>
      
                    <div class="geral">
                    	<div class="description">
                            <h1>Cadastrar Fabricante</h1>
                            <p>Informe os dados do fabricante.</p>
                            <form method="post" id="cadastrarFabricante" onsubmit="return fabricanteOK();">
                            <span class="cadPerf"><span class="required">*</span> Nome: </span> 																	<input type="text" name="nome" /><br><br />
                            <span class="cadPerf"><span class="required">*</span> Nacionalidade: </span> 																	<input type="text" name="nacionalidade" /><br><br />
                            
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