<?php 
	
	include ("../funcoes.php"); 
	logado();
	
	if ($_GET['remover'] != '') {
		$removeu = removerFabricante($_GET['remover']);
	}
	
	$fabricantes = listarFabricantes();
	
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
							'fabricante'=>'Fabricantes',
							'index.php'=>'Consultar'
						));
						?>
					</div>
                    
                    <h1>Consultar Fabricantes</h1>
                    
                    <p>Veja os fabricantes cadastrados</p>
                    
                    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Nacionalidade</th>
                                <th style="width:40px;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?	foreach($fabricantes as $fabricante){?>
                                <tr>
                                    <td><? echo $fabricante->getNome();?></td>
                                    <td><? echo $fabricante->getNacionalidade();?></td>
                                    <td>
                                    	<a href="<? echo SYSURL; ?>fabricante/alterar.php?id=<? echo $fabricante->getId();?>"><img alt="Alterar" title="Alterar" src="../images/alterar.png" width="16" /></a>
                                        <a href="?remover=<? echo $fabricante->getId(); ?>"><img alt="Remover" title="Remover" src="../images/remover.png" width="16" /></a>
									</td>
                                </tr>
                            <? }?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nome</th>
                                <th>Nacionalidade</th>
                                <th>Ações</th>
                            </tr>
                        </tfoot>
					</table>
            
            <div class="clear"></div>
            </div>
<?
	if ($removeu == 1) {
		alertar("Fabricante removido com sucesso.","info");
	} else if ($removeu == 2) {
		alertar("Não foi possível remover o fabricante. Remova primeiro os produtos deste fabricante.","erro");
	}
	if($_GET['cadastro'] == "ok"){
		alertar("Fabricante cadastrado com sucesso.","info");
	}
	if($_GET['alteracao'] == "ok"){
		alertar("Fabricante alterado com sucesso.","info");
	}
   	getFooter();
?>