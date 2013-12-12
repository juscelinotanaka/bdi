<?php 
	
	include ("../funcoes.php"); 
	logado();
	
	if ($_GET['remover'] != '') {
		$removeu = removerFornecedor($_GET['remover']);
		if ($removeu) {
			header("location: ".SYSURL."produto/?removeuOk=ok");
		}
	}
	
	$fornecedores = listarFornecedores();
	
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
							'fornecedor'=>'Fornecedores',
							'index.php'=>'Consultar'
						));
						?>
					</div>
                    
                    <h1>Consultar Fornecedores</h1>
                    
                    <p>Veja os fornecedores cadastrados</p>
                    
                    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
					<thead>
						<tr>
							<th>Nome</th>
                            <th style="width:40px;">Ações</th>
						</tr>
					</thead>
					<tbody>
                    	<?	foreach($fornecedores as $fornecedor){?>
                            <tr>
                                <td><? echo $fornecedor->getNome();?></td>
                                <td>
                                	<a href="<? echo SYSURL; ?>fornecedor/alterar.php?id=<? echo $fornecedor->getId();?>"><img alt="Alterar" title="Alterar" src="../images/alterar.png" width="16" /></a>
                                    <a href="?remover=<? echo $fornecedor->getId(); ?>"><img alt="Remover" title="Remover" src="../images/remover.png" width="16" /></a>
								</td>
                            </tr>
                        <? }?>
                    </tbody>
					<tfoot>
						<tr>
							<th>Nome</th>
                            <th>Ações</th>
						</tr>
					</tfoot>
			</table>
            
            <div class="clear"></div>
            </div>

<?
	if($_GET['cadastro'] == "ok"){
		alertar("Fornecedor cadastrado com sucesso.","info");
	}
	if($_GET['alteracao'] == "ok"){
		alertar("Fornecedor alterado com sucesso.","info");
	}
	getFooter();
?>