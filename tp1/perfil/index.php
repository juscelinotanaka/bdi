<?php 
	
	include ("../funcoes.php"); 
	logado();
	
	$perfis = listarPerfis($_SESSION['idUsuario']);
	
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
							'perfil'=>'Perfil',
							'index.php'=>'Consultar'
						));
						?>
					</div>
                    
                    <h1>Consultar Perfil</h1>
                    
                    <p>Veja os perfis cadastrados na sua conta</p>
                    
                    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
					<thead>
						<tr>
							<th>Descrição</th>
							<th>Tamanho</th>
							<th>Processador</th>
							<th>RAM</th>
							<th>HD</th>
                            <th>Vídeo</th>
                            <th>Preço</th>
                            <th>Fabricante</th>
						</tr>
					</thead>
					<tbody>
                    	<? if ($perfis) { ?>
                    	<? foreach($perfis as $perfil) { ?>
                    	<tr>
							<td><? echo $perfil->getDescricao(); ?></td>
							<td><? echo $perfil->getTamanho(); ?></td>
							<td><? echo $perfil->getProcessador(); ?></td>
							<td><? echo $perfil->getRam(); ?></td>
							<td><? echo $perfil->getHd(); ?></td>
                            <td><? echo $perfil->getVideo(); ?></td>
                            <td><? echo $perfil->getPreco(); ?></td>
							<td><? echo $perfil->getFabricante(); ?></td>
                        </tr>
                        <? } ?>
                        <? } ?>
                    </tbody>
					<tfoot>
						<tr>
							<th>Descrição</th>
							<th>Tamanho</th>
							<th>Processador</th>
							<th>RAM</th>
							<th>HD</th>
                            <th>Vídeo</th>
                            <th>Preço</th>
                            <th>Fabricante</th>
						</tr>
					</tfoot>
			</table>
            
            <div class="clear"></div>
            </div>

<?
	getFooter();
?>