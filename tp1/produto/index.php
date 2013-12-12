<?php 
	
	include ("../funcoes.php"); 
	logado();
	
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
							'index.php'=>'Consultar'
						));
						?>
					</div>
                    
                    <h1>Consultar Produtos</h1>
                    
                    <p>Veja os produtos cadastrados</p>
                    
                    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
					<thead>
						<tr>
							<th>Nome</th>
							<th>Tamanho</th>
                            <th>Processador</th>
                            <th>Memória RAM</th>
                            <th>HD</th>
                            <th>Placa de Video</th>
                            <th>Preço</th>
                            <th>Detalhes</th>
                            <th>Alterar</th>
                            <th>Remover</th>
						</tr>
					</thead>
					<tbody>
                    	
                        <?	foreach($produtos as $produto){?>
                            <tr>
                                <td><? echo $produto->getNome();?></td>
                                <td><? echo $produto->getTamanho()."\"";?></td>
                                <td><? echo $produto->getProcessador();?></td>
                                <td><? echo $produto->getRam();?></td>
                                <td><? echo $produto->getHd();?></td>
                                <td><? echo $produto->getVideo();?></td>
                                <td>R$&nbsp;<? echo number_format($produto->getPrecoReal(), 2, ',', '.');?></td>
                                <td><a href="<? echo SYSURL; ?>produto/detalhes.php?id=<? echo $produto->getId();?>">Detalhes</a></td>
                                <td><a href="<? echo SYSURL; ?>produto/alterar.php?id=<? echo $produto->getId();?>">Alterar</a></td>
                                <td><a href="#">Remover</a></td>
                            </tr>
                        <? }?>
                        
                    </tbody>
					<tfoot>
						<tr>
							<th>Nome</th>
							<th>Tamanho</th>
                            <th>Processador</th>
                            <th>Memória RAM</th>
                            <th>HD</th>
                            <th>Placa de Video</th>
                            <th>Preço</th>
                            <th>Detalhes</th>
                            <th>Alterar</th>
                            <th>Remover</th>
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
	if($_GET['cadastro'] == "ok"){
		alertar("Produto cadastrado com sucesso.","info");
	}
	if($_GET['alteracao'] == "ok"){
		alertar("Produto alterado com sucesso.","info");
	}
   	getFooter();
?>