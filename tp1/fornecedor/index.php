<?php 
	
	include ("../funcoes.php"); 
	logado();
	
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
						</tr>
					</thead>
					<tbody>
                    	<?	foreach($fornecedores as $fornecedor){?>
                            <tr>
                                <td><? echo $fornecedor->getNome();?></td>
                            </tr>
                        <? }?>
                    </tbody>
					<tfoot>
						<tr>
							<th>Nome</th>
						</tr>
					</tfoot>
			</table>
            
            <div class="clear"></div>
            </div>

<?
	getFooter();
?>