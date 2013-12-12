<?php

	include ("../funcoes.php"); 
	logado();

	if ($_POST['acao'] == 'adicionar') {
		
		$amizade = new Amizade();
		$amizade->setIdUsuario($_SESSION['idUsuario']);
		$amizade->setIdAmigo($_POST['idAmigo']);
		$amizade->setGrau($_POST['grau']);
		
		$cadastro = cadastrarAmizade($amizade);	
		
		if($cadastro){
			header('Location:' . SYSURL. "amigo/index.php?cadastro=ok");
		}
		
	}
	
	$usuario = pesquisarUsuario($_GET['id']);
	
	getHeader();
?>
		<div class="colunaDireita">
                	<? getColunaHome(); ?>
                </div>
            	<div class="principal">
                	<div class="breadcrumb">
                       <?
						breadcrumb(array(
							'http://localhost/bdi/tp1'=>'Home',
							'amigo'=>'Amigos',
							'index.php'=>'Adicionar'
						));
						?>
					</div>
                    
                    <h1>Adicionar Amigo</h1>
                    
                    <div class="left">
                    	<div class="description">
                            <span>Nome:</span> <?php echo $usuario->getNome().' '.$usuario->getSobrenome();?><br>
                            <span>E-mail:</span> <?php echo $usuario->getEmail();?><br>
                            <span>Apelido:</span> <?php echo $usuario->getApelido();?><br>
                            <form method="post" id="adicionarAmigo" onsubmit="return amigoOK();">
                                <span class="cadPerf">Grau de Amizade:</span> 
                                <select name="grau" >
                                    <option value="">Selecione:</option>
                                    <option value="1">Conhecido</option>
                                    <option value="2">Amigo</option>
                                    <option value="3">Melhor Amigo</option>
                                </select>
                                <br><br>
                            
                                <input type="hidden" value="<? echo $usuario->getId();?>" name="idAmigo">
                                <input type="hidden" value="adicionar" name="acao" />
                            
                                <input type="submit" id="btnCadastrar" style="display:none;">
                        		<a onclick="$('#btnCadastrar').click();" class="button"><span>Adicionar</span></a>
                            </form>
                            <br>
                        </div>
                        <!-- fim description -->
                    </div> <!-- fim right -->
            
            <div class="clear"></div>
            </div>
<?
   	getFooter();
?>