<?php 
	
	include ("../funcoes.php"); 
	logado();
	
	if ($_POST['acao'] == 'cadastrar') {
		
		$loja = new Loja();
		$loja->setNome($_POST['nome']);
		$loja->setFisico($_POST['fisico']);
		$loja->setEndereco($_POST['endereco']);
		
		$cadastro = cadastrarLoja($loja);	
		
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
							'loja'=>'Loja',
							'cadastrar.php'=>'Cadastrar Loja'
						));
						?>
					</div>
      
                    <div class="geral">
                    	<div class="description">
                            <h1>Cadastrar Loja</h1>
                            <p>Informe os dados da loja.</p>
                            <form method="post" id="cadastrar">
                            <span><span class="required">*</span> Nome: </span> 																	<input type="text" name="nome" /><br><br />
                            <span><span class="required">*</span> Endereço: </span> 																	<input type="text" name="endereco" /><br><br />
                            
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