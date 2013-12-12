<?php 
	
	include ("../funcoes.php"); 
	logado();
	
	if ($_GET['remover'] != '') {
		$removeu = removerProduto($_GET['remover']);
	}
	
	$produtos = listarProdutos();
	
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
							'produto'=>'Produtos',
							'index.php'=>'Consultar por Fabricante'
						));
						?>
					</div>
                    
                    <h1>Consultar Produtos</h1>
                    
                    <p>Veja os produtos cadastrados</p>
                    
                    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
					<thead>
						<tr>
							<th>Nome</th>
							<th>Fabricante</th>
                            <th>Preço (R$)</th>
                            <th style="width:48px;">Ações</th>
						</tr>
					</thead>
					<tbody>
                    	
                        <?	foreach($produtos as $produto){?>
                            <tr>
                                <td><? echo $produto->getNome();?></td>
                                <td><? echo $produto->getNomeFabricante();?></td>
                                <td><? echo number_format($produto->getPrecoReal(), 2, '.', '');?></td>
                                <td>
                                <a href="<? echo SYSURL; ?>produto/detalhes.php?id=<? echo $produto->getId();?>"><img alt="Detalhes" title="Detalhes" src="../images/detalhes.png" width="16" /></a>
                                <a href="<? echo SYSURL; ?>produto/alterar.php?id=<? echo $produto->getId();?>"><img alt="Alterar" title="Alterar" src="../images/alterar.png" width="16" /></a>
                                <a href="?remover=<? echo $produto->getId(); ?>"><img alt="Remover" title="Remover" src="../images/remover.png" width="16" /></a>
                                </td>
                            </tr>
                        <? }?>
                        
                    </tbody>
					<tfoot>
						<tr>
							<th>Nome</th>
							<th>Fabricante</th>
                            <th>Preço (R$)</th>
                            <th>Ações</th>
						</tr>
					</tfoot>
			</table>
            
            <div class="clear"></div>
            </div>
            
            <? if ($_GET['q']) { ?>
            <script type="text/javascript" charset="utf-8">
				$(document).ready(function() {
					$('#searchField').val(<? echo "'".$_GET['q']."'"; ?>);
					$('#searchField').keyup();
				} );
			</script>
            <? } ?>
<?
	if ($removeu == 1) {
		alertar("Produto removido com sucesso.","info");
	} else if ($removeu == 2) {
		alertar("Não foi possível remover o Produto, pois este está relacionado a uma recomendação.","erro");
	}
	
	if($_GET['cadastro'] == "ok"){
		alertar("Produto cadastrado com sucesso.","info");
	}
	if($_GET['alteracao'] == "ok"){
		alertar("Produto alterado com sucesso.","info");
	}
   	getFooter();
?>