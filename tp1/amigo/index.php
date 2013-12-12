<?php 
	
	include ("../funcoes.php"); 
	logado();
	
	$amigos = listarAmigos($_SESSION['idUsuario']);
	
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
							'index.php'=>'Ver Amigos'
						));
						?>
					</div>
                    
                    <h1>Ver Amigos</h1>
                    
                    <p>Veja seus amigos adicionados</p>
                    
                    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Apelido</th>
                                <th>Grau de Amizade</th>
                                <th>Desfazer Amizade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?	
							if($amigos != 0){
							
								foreach($amigos as $amigo){
									$usuario = pesquisarUsuario($amigo->getIdAmigo());
							?>
                                	<tr>
										<td><? echo $usuario->getNome().' '.$usuario->getSobrenome();?></td>
										<td><? echo $usuario->getEmail();?></td>
										<td><? echo $usuario->getApelido();?></td>
                                        <td><? echo $amigo->getGrau();?></td>
                                        <td><a href="#">Desfazer Amizade</a></td>
									</tr>
                            <? 
								}
							}
							?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Apelido</th>
                                <th>Grau de Amizade</th>
                                <th>Desfazer Amizade</th>
                            </tr>
                        </tfoot>
					</table>
            
            <div class="clear"></div>
            </div>
<?
	
	if($_GET['cadastro'] == "ok"){
		alertar("Amigo adicionado!", "info");
	}
	
   	getFooter();
?>