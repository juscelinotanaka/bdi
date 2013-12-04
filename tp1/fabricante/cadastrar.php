<?php 
	
	include ("../funcoes.php"); 
	logado();
	
	if ($_POST['acao'] == 'cadastrar') {
		
		$fabricante = new Fabricante();
		$fabricante->setNome($_POST['nome']);
		$fabricante->setNacionalidade($_POST['nacionalidade']);
		
		$cadastro = cadastrarFabricante($fabricante);	
		
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
							'fabricante'=>'Fabricante',
							'cadastrar.php'=>'Cadastrar Fabricante'
						));
						?>
					</div>
      
                    <div class="geral">
                    	<div class="description">
                            <h1>Cadastrar Fabricante</h1>
                            <p>Informe os dados do fabricante.</p>
                            <form method="post" id="cadastrar">
                            <span class="cadPerf"><span class="required">*</span> Nome: </span> 																	<input type="text" name="nome" /><br><br />
                            <span class="cadPerf"><span class="required">*</span> Nacionalidade: </span> 																	<input type="text" name="nacionalidade" /><br><br />
                            
                            <input type="hidden" value="cadastrar" name="acao" />
                            <a onclick="$('#cadastrar').submit();" class="button"><span>Cadastrar</span></a>
                            </form>
                    	</div>
                        <!-- fim description -->
                    </div> <!-- fim right -->
                <div class="clear h16"></div>
            </div> <!-- fim principal -->
            
<?
	getFooter(); 
?>