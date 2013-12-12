<?php 
	
	include ("../funcoes.php"); 
	logado();
	
	$lojas = listarLojas();
	
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
							'loja'=>'Lojas',
							'index.php'=>'Consultar'
						));
						?>
					</div>
                    
                    <h1>Consultar Lojas</h1>
                    
                    <p>Veja as lojas cadastradas</p>
                    
                    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
					<thead>
						<tr>
							<th>Nome</th>
							<th>Endereco</th>
                            <th style="width:40px;">Ações</th>
						</tr>
					</thead>
					<tbody>
                    	
                        <?	foreach($lojas as $loja){?>
                            <tr>
                                <td><? echo $loja->getNome();?></td>
                                <td><? echo $loja->getEndereco();?></td>
                                <td>
                                	<a href="<? echo SYSURL; ?>loja/alterar.php?id=<? echo $loja->getId();?>"><img alt="Alterar" title="Alterar" src="../images/alterar.png" width="16" /></a>
                                	<a href="#"><img alt="Remover" title="Remover" src="../images/remover.png" width="16" /></a>
								</td>
                            </tr>
                        <? }?>
                        
                    </tbody>
					<tfoot>
						<tr>
							<th>Nome</th>
							<th>Endereco</th>
                            <th>Ações</th>
						</tr>
					</tfoot>
			</table>
            
            <div class="clear"></div>
            </div>
<?
	if($_GET['cadastro'] == "ok"){
		alertar("Loja cadastrada com sucesso.","info");
	}
	if($_GET['alteracao'] == "ok"){
		alertar("Loja alterada com sucesso.","info");
	}
   	getFooter();
?>