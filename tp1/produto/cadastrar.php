<?php 
	
	include ("../funcoes.php"); 
	logado();
	
	if ($_POST['acao'] == 'cadastrar') {
		
		$produto = new Produto();
		
		$produto->setNome($_POST['nome']);
		$produto->setTamanho($_POST['tamanho']);
		$produto->setProcessador($_POST['processador']);
		$produto->setRam($_POST['ram']);
		$produto->setHd($_POST['hd']);
		$produto->setVideo($_POST['video']);
		$produto->setPrecoReal($_POST['preco']);
		
		$produto->setIdFabricante($_POST['fabricante']);
		$produto->setIdFornecedor($_POST['fornecedor']);
		$produto->setIdLoja($_POST['loja']);
		
		if ($_POST['preco']<1000){
			$produto->setPreco(1);
		}
		else if ($_POST['preco'] >= 1000 && $_POST['preco'] < 2000){
			$produto->setPreco(2);
		}
		else if ($_POST['preco'] >= 2000 && $_POST['preco'] < 3000){
			$produto->setPreco(3);
		}
		else {
			$produto->setPreco(4);
		}
		
		if($_POST['fabricante'] == 1){
			$produto->setImagem("hp".$produto->getPreco().".jpg");
		}
		else if($_POST['fabricante'] == 2){
			$produto->setImagem("asus".$produto->getPreco().".jpg");
		}
		else if($_POST['fabricante'] == 3){
			$produto->setImagem("dell".$produto->getPreco().".jpg");
		}
		else if($_POST['fabricante'] == 4){
			$produto->setImagem("acer".$produto->getPreco().".jpg");
		}
		else if($_POST['fabricante'] == 5){
			$produto->setImagem("samsung".$produto->getPreco().".jpg");
		}
		
		$fabricante = "";
		
		if($_POST['fabricante'] == 1){
			$fabricante = "HP";
		}
		else if($_POST['fabricante'] == 2){
			$fabricante = "Asus";
		}
		else if($_POST['fabricante'] == 3){
			$fabricante = "Dell";
		}
		else if($_POST['fabricante'] == 4){
			$fabricante = "Acer";
		}
		else if($_POST['fabricante'] == 5){
			$fabricante = "Samsung";
		}
		
		$processador = "";
		
		if($_POST['processador'] == 1){
			$processador  = "Intel i3";
		}
		else if($_POST['processador'] == 2){
			$processador  = "Intel i5";
		}
		else if($_POST['processador'] == 3){
			$processador  = "Intel i7";
		}
		else if($_POST['processador'] == 4){
			$processador  = "AMD Sempron";
		}
		
		$ram = "";
		
		if($_POST['ram'] == 1){
			$ram  = "2GB";
		}
		else if($_POST['ram'] == 2){
			$ram  = "4GB";
		}
		else if($_POST['ram'] == 3){
			$ram  = "8TB";
		}
		
		$hd = "";
		
		if($_POST['hd'] == 1){
			$hd  = "500GB";
		}
		else if($_POST['hd'] == 2){
			$hd  = "750GB";
		}
		else if($_POST['hd'] == 3){
			$hd  = "1TB";
		}
		
		$video = "";
		
		if($_POST['video'] == 1){
			$video  = "256MB";
		}
		else if($_POST['video'] == 2){
			$video  = "1GB";
		}
		else if($_POST['video'] == 3){
			$video  = "2GB";
		}
		
		$tamanho = "";
		
		if($_POST['tamanho'] == 1){
			$tamanho  = 13;
		}
		else if($_POST['tamanho'] == 2){
			$tamanho  = 15;
		}
		else if($_POST['tamanho'] == 3){
			$tamanho  = 17;
		}
		
		$descricao = "Notebook ".$fabricante." Processador ".$processador." com ".$ram." de Memória RAM. HD de ".$hd.". Placa de vídeo de ".$video." e Tela de ".$tamanho." polegadas.";
		
		$produto->setDescricao($descricao);
		
		
		$cadastro = cadastrarProduto($produto);	
		
		if($cadastro){
			header('Location:' . SYSURL. "produto/index.php?cadastro=ok");
		}
		else{
			echo '<script type="text/javascript">alert("Erro no cadastro!");</script>';
		}
	
	}
	
	getHeader();
	
	$lojas = listarLojas();
	$fabricantes = listarFabricantes();
	$fornecedores = listarFornecedores();
	
?>

<div class="colunaDireita">
                	<? getColunaHome(); ?>
                </div>
            	<div class="principal">
                
                	<div class="breadcrumb">
                       <?
						breadcrumb(array(
							'http://localhost/bdi/tp1/'=>'Home', 
							'produto'=>'Produtos',
							'cadastrar.php'=>'Cadastrar'
						));
						?>
					</div>
      
                    <div class="geral">
                    	<div class="description">
                            <h1>Cadastrar Notebook</h1>
                            <p>Informe os dados do notebook.</p>
                            <form method="post" id="cadastrarProduto" onsubmit="return produtoOK();">
                            <span><span class="required">*</span> Descrição Rápida: <h5>ex. Notebook HP I5 8GB 750GB</h5></span> 																	<input type="text" name="nome" /><br><br />
                            <span class="required">*</span><span class="cadPerf">Fabricante:</span> 
                            <select name="fabricante">
                            	<option value="">Selecione:</option>
                                <?php
                                	foreach($fabricantes as $fabricante){
										echo '<option value="'.$fabricante->getId().'">'.$fabricante->getNome().'</option>';
									}
								?>
                            </select>
                            <br><br>
                            
                            <span class="required">*</span><span class="cadPerf">Tamanho:</span> 
                            <select name="tamanho">
                            	<option value="">Selecione:</option>
                                <option value="1">13 Polegadas</option>
                                <option value="2">15 Polegadas</option>
                                <option value="3">17 Polegadas</option>
                                
                            </select>
                            <br><br>
                            
                            <span class="required">*</span><span class="cadPerf">Processador:</span> 
                            <select name="processador">
                            	<option value="">Selecione:</option>
                                <option value="1">Intel i3</option>
                                <option value="2">Intel i5</option>
                                <option value="3">Intel i7</option>
                                <option value="4">AMD Sempron</option>
                            </select>
                            <br><br>
                            
                            <span class="required">*</span><span class="cadPerf">Memória RAM:</span> 
                            <select name="ram">
                            	<option value="">Selecione:</option>
                                <option value="1">2GB</option>
                                <option value="2">4GB</option>
                                <option value="3">8GB</option>
                            </select>
                            <br><br>
                            
                            <span class="required">*</span><span class="cadPerf">HD:</span> 
                            <select name="hd">
                            	<option value="">Selecione:</option>
                                <option value="1">500GB</option>
                                <option value="2">750GB</option>
                                <option value="3">1TB</option>
                            </select>
                            <br><br>
                            
                            <span class="required">*</span><span class="cadPerf">Placa de Vídeo:</span> 
                            <select name="video">
                            	<option value="">Selecione:</option>
                                <option value="1">256MB</option>
                                <option value="2">1GB</option>
                                <option value="3">2GB</option>
                            </select>
                            <br>
                            <br>
                            
                            <span class="required">*</span><span class="cadPerf">Fornecedor:</span> 
                            <select name="fornecedor">
                            	<option value="">Selecione:</option>
                                <?php
                                	foreach($fornecedores as $fornecedor){
										echo '<option value="'.$fornecedor->getId().'">'.$fornecedor->getNome().'</option>';
									}
								?>
                            </select>
                            <br>
                            <br>
                            
                            <span class="required">*</span><span class="cadPerf">Loja:</span> 
                            <select name="loja">
                            	<option value="">Selecione:</option>
                                <?php
                                	foreach($lojas as $loja){
										echo '<option value="'.$loja->getId().'">'.$loja->getNome().'</option>';
									}
								?>
                            </select>
                            <br>
                            <br>
                            
                            <span class="required">*</span><span class="cadPerf">Preço:</span> <input type="text" id="preco" name="preco" />
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
    preco: {
      required: true,
      number: true
    }
  }
});
</script>