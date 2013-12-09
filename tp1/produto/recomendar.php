<?php 
	
	include ("../funcoes.php"); 
	logado();
	
	if ($_POST['acao'] == 'recomendar') {
		$recomendacao = new Recomendacao();
		$recomendacao->setIdAmizade($_POST['idAmizade']);
		$recomendacao->setIdProduto($_POST['idProduto']);
		
		$sucesso = cadastrarRecomendacao($recomendacao);
	}
	
	if ($sucesso) {
		header("location: ".SYSURL."produto/recomendar.php?id=".$_GET['id']."&recomendacao=ok");
	}
	
	$recomendacoes = consultarRecomendacao($_SESSION['idUsuario'], $_GET['id']);
	
	getHeader();
?>
		<div class="colunaDireita">
                	<? //getColunaHome(); ?>
                </div>
            	<div class="principal">
                	<div class="breadcrumb">
                       <?
						breadcrumb(array(
							'http://localhost/bdi/tp1'=>'Home',
							'produto'=>'Produtos',
							''=>'Recomendar'
						));
						?>
					</div>
                    
                    <h1>Recomendar Produto</h1>
                    
                    <p>Recomende o produto para os seus amigos</p>
                    
                    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Apelido</th>
                                <th>Recomendar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?	
							if($recomendacoes){
							
								foreach($recomendacoes as $recomendacao){
									
							?>
                                	<tr>
										<td><? echo $recomendacao->getNome().' '.$recomendacao->getSobrenome();?></td>
										<td><? echo $recomendacao->getApelido();?></td>
                                        <? if ($recomendacao->getRecomendado()){?>
                                        <td>Recomendado</td>
                                        <? } else {?>
                                        <td>
                                        	<form method="post">
                                            	<input type="hidden" name="idAmizade" value="<? echo $recomendacao->getIdAmizade(); ?>" />
                                                <input type="hidden" name="idProduto" value="<? echo $_GET['id']; ?>" />
                                                <input type="hidden" name="acao" value="recomendar" />
                                                <input type="submit" value="Recomendar" class="btnRecomendar" />
                                                
                                            </form>
                                        </td>
                                        <? } ?>
                                        
									</tr>
                            	<? } ?>
							<? } else { ?>
								<tr>
                                <td>Você ainda não tem amigos adicionados.</td>
                                <td></td>
                                <td></td>
                                </tr>
                                
							<? }?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nome</th>
                                <th>Apelido</th>
                                <th>Recomendar</th>
                            </tr>
                        </tfoot>
					</table>
            
            <div class="clear"></div>
            </div>
<?
	if ($_GET['recomendacao'] == "ok") {
		alertar("Recomendação Efetuada!", "info");
	}
	
	
   	getFooter();
?>