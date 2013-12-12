<?php
	include ("../funcoes.php"); 
	logado();
	
	if ($_GET['excluir']) {
		$excluido = removerUsuario($_SESSION['idUsuario']);
		
		if ($excluido == 1) {
			header('Location:' . SYSURL. "index.php?logout=true&excluirUsuario=ok");
		} 
	}
	
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
                    
                    <div class="">
                    	<div class="description">
                            <h1>Meus dados</h1>
                            <p></p>
                            <div class="linhaPerfil"><span class="cadPerf">Nome:</span> <?php echo $usuario->getNome();?></div>
                            <div class="linhaPerfil"><span class="cadPerf">Sobrenome:</span> <?php echo $usuario->getSobrenome();?></div>
                            <div class="linhaPerfil"><span class="cadPerf">Apelido:</span> <?php echo $usuario->getApelido();?></div>
                            <div class="linhaPerfil"><span class="cadPerf">CPF:</span> <?php echo $usuario->getCpf();?></div>
                            <div class="linhaPerfil"><span class="cadPerf">E-mail:</span> <?php echo $usuario->getEmail();?></div>
                            
                    	</div>
                        <!-- fim description -->
                    	<a href="<? echo SYSURL ?>usuario/alterar.php" class="button"><span>Alterar dados</span></a>
                        
                        <a href="?excluir=ok" class="button"><span>Excluir Conta</span></a>
                    </div> <!-- fim right -->
                <div class="clear h16"></div>
            </div> <!-- fim principal -->
            
<?
	
	if($_GET['alteracao'] == "ok"){
		alertar("Usuário alterado com sucesso.","info");
	}

	getFooter(); 
?>