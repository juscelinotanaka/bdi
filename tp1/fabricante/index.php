<?php 
	
	include ("../funcoes.php"); 
	logado();
	
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
                                <th>Alterar</th>
                                <th>Remover</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?	foreach($fabricantes as $fabricante){?>
                                <tr>
                                    <td><? echo $fabricante->getNome();?></td>
                                    <td><? echo $fabricante->getNacionalidade();?></td>
                                    <td><a href="<? echo SYSURL; ?>fabricante/alterar.php?id=<? echo $fabricante->getId();?>">Alterar</a></td>
                                    <td><a href="#">Remover</a></td>
                                </tr>
                            <? }?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nome</th>
                                <th>Nacionalidade</th>
                                <th>Alterar</th>
                                <th>Remover</th>
                            </tr>
                        </tfoot>
					</table>
            
            <div class="clear"></div>
            </div>
<?
	
	if($_GET['cadastro'] == "ok"){
		alertar("Fabricante cadastrado com sucesso.","info");
	}
	if($_GET['alteracao'] == "ok"){
		alertar("Fabricante alterado com sucesso.","info");
	}
   	getFooter();
?>