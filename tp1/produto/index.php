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
							'loja'=>'Lojas',
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
						</tr>
					</thead>
					<tbody>
                    	
                        <?	foreach($produtos as $produto){?>
                            <tr>
                                <td><? echo $produto->getNome();?></td>
                                <td><? echo $produto->getTamanho();?></td>
                                <td><? echo $produto->getProcessador();?></td>
                                <td><? echo $produto->getRam();?></td>
                                <td><? echo $produto->getHd();?></td>
                                <td><? echo $produto->getVideo();?></td>
                                <td>R$&nbsp;<? echo number_format($produto->getPrecoReal(), 2, ',', '.');?></td>
                                <td><a href="<? echo SYSURL; ?>produto/detalhes.php?id=<? echo $produto->getId();?>">Detalhes</a></td>
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
						</tr>
					</tfoot>
			</table>
            
            <div class="clear"></div>
            </div>
<?
   	getFooter();
?>