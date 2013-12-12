<?php
	include ("../funcoes.php"); 
	logado();
	
	$usuario = pesquisarUsuario($_SESSION['idUsuario']);
	
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
							'usuario'=>'Conta',
							'index.php'=> 'Meus Dados'
						));
						?>
					</div>
                    
                    <div class="left">
                    	<div class="description">
                            <h1>Meus dados</h1>
                            <p></p>
                            <span>Nome:</span> <?php echo $usuario->getNome();?><br>
                            <span>Sobrenome:</span> <?php echo $usuario->getSobrenome();?><br>
                            <span>Apelido:</span> <?php echo $usuario->getApelido();?><br>
                            <span>CPF:</span> <?php echo $usuario->getCpf();?><br>
                            <span>E-mail:</span> <?php echo $usuario->getEmail();?><br>
                            
                    	</div>
                        <!-- fim description -->
                    	<a href="<? echo SYSURL ?>usuario/alterar.php" class="button"><span>Alterar dados</span></a>
                    </div> <!-- fim right -->
                <div class="clear h16"></div>
            </div> <!-- fim principal -->
            
<?
	if($_GET['alteracao'] == "ok"){
		alertar("Usuário alterado com sucesso.","info");
	}

	getFooter(); 
?>