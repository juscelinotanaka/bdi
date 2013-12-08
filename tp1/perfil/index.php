<?php 
	
	include ("../funcoes.php"); 
	logado();
	
	if ($_POST['acao'] == '') {
		
	}
	
	getHeader();
?>

				<div class="colunaDireita">
                	<? getColunaHome(); ?>
                </div>
            	<div class="principal">
                	<div class="breadcrumb">
                       <?
						breadcrumb(array(
							'http://localhost/bdi/tp1/'=>'Home',
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
							<th>ID</th>
							<th>Descrição</th>
							<th>Tamanho</th>
							<th>Processador</th>
							<th>RAM</th>
							<th>HD</th>
                            <th>Vídeo</th>
                            <th>Preço</th>
						</tr>
					</thead>
					<tbody>
                    	<tr>
                        	<td>ID</td>
							<td>Descrição</td>
							<td>Tamanho</td>
							<td>Processador</td>
							<td>RAM</td>
							<td>HD</td>
                            <td>Vídeo</td>
                            <td>Preço</td>
                        </tr>
                    </tbody>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>Descrição</th>
							<th>Tamanho</th>
							<th>Processador</th>
							<th>RAM</th>
							<th>HD</th>
                            <th>Vídeo</th>
                            <th>Preço</th>
						</tr>
					</tfoot>
			</table>
            
            </div>

<?
	getFooter();
?>