<?php 
	
	include ("../funcoes.php"); 
	logado();
	
	$usuarios = listarUsuarios($_SESSION['idUsuario']);
	
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
							'index.php'=>'Pesquisar'
						));
						?>
					</div>
                    
                    <h1>Pesquisar Usuários</h1>
                    
                    <p>Veja os usuários cadastrados</p>
                    
                    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Apelido</th>
                                <th>Adicionar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?	foreach($usuarios as $usuario){?>
                                <tr>
                                    <td><? echo $usuario->getNome().' '.$usuario->getSobrenome();?></td>
                                    <td><? echo $usuario->getEmail();?></td>
                                    <td><? echo $usuario->getApelido();?></td>
                                    <? if(consultarAmizade($_SESSION['idUsuario'], $usuario->getId()) != 0){ ?>
                                    		<td>Amigo</td>
                                    <? }
										else{
                                    ?>
                                    		<td><a href="<? echo SYSURL; ?>amigo/adicionar.php?id=<? echo $usuario->getId();?>">Adicionar</a></td>
                                    <? }?>
                                </tr>
                            <? }?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Apelido</th>
                                <th>Adicionar</th>
                            </tr>
                        </tfoot>
					</table>
            
            <div class="clear"></div>
            </div>
<?
   	getFooter();
?>