<?php 
	
	include ("../funcoes.php"); 
	logado();
	
	if ($_POST['acao'] == 'cadastrar') {
		
		$produto = new Produto();
		
		$produto->setNome($_POST['nome']);
		$produto->setDescricao($_POST['descricao']);
		$produto->setTamanho($_POST['tamanho']);
		$produto->setProcessador($_POST['processador']);
		$produto->setRam($_POST['ram']);
		$produto->setHd($_POST['hd']);
		$produto->setVideo($_POST['video']);
		$produto->setPrecoReal($_POST['field']);
		
		if ($_POST['field']<1000){
			$produto->setPreco(1);
		}
		else if ($_POST['field'] >= 1000 && $_POST['preco'] < 2000){
			$produto->setPreco(2);
		}
		else if ($_POST['field'] >= 2000 && $_POST['preco'] < 3000){
			$produto->setPreco(3);
		}
		else {
			$produto->setPreco(4);
		}
		
		$cadastro = cadastrarProduto($produto);	
		
		if($cadastro){
			echo '<script type="text/javascript">alert("Cadastro realizado com sucesso!");</script>';
		}
		else{
			echo '<script type="text/javascript">alert("Erro no cadastro!");</script>';
		}
	
	}
	
	getHeader();
	
?>

<div class="colunaDireita">
                	<? //getColunaHome(); ?>
                </div>
            	<div class="principal">
                
                	<div class="breadcrumb">
                       <?
						breadcrumb(array(
							'http://localhost/bdi/tp1/'=>'Home', 
							'produto'=>'Produto',
							'cadastrar.php'=>'Cadastrar Produto'
						));
						?>
					</div>
      
                    <div class="geral">
                    	<div class="description">
                            <h1>Cadastrar Notebook</h1>
                            <p>Informe os dados do notebook.</p>
                            <form method="post" id="cadastrarProduto" onsubmit="return produtoOK();">
                            <span><span class="required">*</span> Descrição Rápida: <h5>ex. Notebook HP I5 8GB 750GB</h5></span> 																	<input type="text" name="descricao" /><br><br />
                            <span class="cadPerf">Marca:</span> 
                            <select name="marca">
                            	<option value="">Selecione:</option>
                                <option value="1">HP</option>
                                <option value="2">ASUS</option>
                                <option value="3">Dell</option>
                                <option value="4">Acer</option>
                                <option value="5">Samsung</option>
                            </select>
                            <br><br>
                            
                            <span class="cadPerf">Tamanho:</span> 
                            <select name="tamanho">
                            	<option value="">Selecione:</option>
                                <option value="1">13 Polegadas</option>
                                <option value="2">15 Polegadas</option>
                                <option value="3">17 Polegadas</option>
                                
                            </select>
                            <br><br>
                            
                            <span class="cadPerf">Processador:</span> 
                            <select name="processador">
                            	<option value="">Selecione:</option>
                                <option value="1">Intel i3</option>
                                <option value="2">Intel i5</option>
                                <option value="3">Intel i7</option>
                                <option value="4">AMD Sempron</option>
                            </select>
                            <br><br>
                            
                            <span class="cadPerf">Memória RAM:</span> 
                            <select name="ram">
                            	<option value="">Selecione:</option>
                                <option value="1">2GB</option>
                                <option value="2">4GB</option>
                                <option value="3">8GB</option>
                            </select>
                            <br><br>
                            
                            <span class="cadPerf">HD:</span> 
                            <select name="hd">
                            	<option value="">Selecione:</option>
                                <option value="1">500GB</option>
                                <option value="2">750GB</option>
                                <option value="3">1TB</option>
                            </select>
                            <br><br>
                            
                            <span class="cadPerf">Placa de Vídeo:</span> 
                            <select name="video">
                            	<option value="">Selecione:</option>
                                <option value="1">256MB</option>
                                <option value="2">1GB</option>
                                <option value="3">2GB</option>
                            </select>
                            <br>
                            <br>
                            
                            <span class="cadPerf">Fornecedor:</span> 
                            <select name="fornecedor">
                            	<option value="">Selecione:</option>
                            </select>
                            <br>
                            <br>
                            
                            <span class="cadPerf">Loja:</span> 
                            <select name="loja">
                            	<option value="">Selecione:</option>
                            </select>
                            <br>
                            <br>
                            
                            <span class="required">*</span><span class="cadPerf">Preço:</span> <input type="text" id="field" name="field" />
                            <br /><br />
                            <input type="hidden" value="cadastrar" name="acao" />
                            <input type="submit" id="btnCadastrar" style="display:none;">
                        	<a onclick="$('#btnCadastrar').click();" class="button"><span>Cadastrar</span></a>
                            </form>
                    	</div>
                        <!-- fim description -->
                    </div> <!-- fim right -->
                <div class="clear h16"></div>
            </div> <!-- fim principal -->
            
<?
	getFooter(); 
	
?>

<script>
// just for the demos, avoids form submit
jQuery.validator.setDefaults({
  debug: true,
  success: "valid"
});
$( "#cadastrarProduto" ).validate({
  rules: {
    field: {
      required: true,
      number: true
    }
  }
});
</script>