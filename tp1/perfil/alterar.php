<?
	include ("../funcoes.php"); 
	logado();
	
	if ($_POST['acao'] == 'alterar') {
		
		$perfil = new Perfil();
		$perfil->setId($_GET['id']);
		$perfil->setIdUsuario($_SESSION['idUsuario']);
		$perfil->setDescricao($_POST['descricao']);
		$perfil->setCaracteristicas($_POST['tamanho']."|".$_POST['processador']."|".$_POST['ram']."|".$_POST['hd']."|".$_POST['video']."|".$_POST['preco']."|".$_POST['fabricante']);
		
		$perfilAlterado = alterarPerfil($perfil);
		
		if($perfilAlterado){
			header('Location:' . SYSURL. "perfil/index.php?alteracao=ok");
		}
		else{
			echo '<script type="text/javascript">alert("Erro no cadastro!");</script>';
		}
	}
	
	$perfil = consultarPerfilAlteracao($_GET['id']);
	
	$caracteristicas = explode("|", $perfil->getCaracteristicas());
	
	$tamanho = $caracteristicas[0];
	$processador = $caracteristicas[1];
	$ram = $caracteristicas[2];
	$hd = $caracteristicas[3];
	$video = $caracteristicas[4];
	$preco = $caracteristicas[5];
	$fabricante = $caracteristicas[6];
	
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
							'perfil'=>'Perfis',
							'alterar.php'=>'Alterar'
						));
						?>
					</div>
      
                    <div class="geral">
                    	<div class="description">
                            <h1>Alterar Perfil</h1>
                            <p>Edite os dados do seu Perfil.</p>
                            <form method="post" id="cadastrarPerfil" onsubmit="return perfilOK();">
                            <span><span class="required">*</span> Descrição: <h5>ex. Só i5, 8GB de Memória, Tops</h5></span> <input type="text" name="descricao" value="<?php echo $perfil->getDescricao();?>" /><br><br />
                            
                            <span class="cadPerf">Fabricante:</span> 
                            <select name="fabricante">
                            	<option value="">Selecione:</option>
								<?php
									if($fabricante == 1){
										echo '	<option value="1" selected>HP</option>
												<option value="2">ASUS</option>
												<option value="3">Dell</option>
												<option value="4">Acer</option>
												<option value="5">Samsung</option>';
									}
									else if($fabricante == 2){
										echo '	<option value="1">HP</option>
												<option value="2" selected>ASUS</option>
												<option value="3">Dell</option>
												<option value="4">Acer</option>
												<option value="5">Samsung</option>';
									}
									else if($fabricante == 3){
										echo '	<option value="1">HP</option>
												<option value="2">ASUS</option>
												<option value="3" selected>Dell</option>
												<option value="4">Acer</option>
												<option value="5">Samsung</option>';
									}
									else if($fabricante == 4){
										echo '	<option value="1">HP</option>
												<option value="2">ASUS</option>
												<option value="3">Dell</option>
												<option value="4" selected>Acer</option>
												<option value="5">Samsung</option>';
									}
									else if($fabricante == 5){
										echo '	<option value="1">HP</option>
												<option value="2">ASUS</option>
												<option value="3">Dell</option>
												<option value="4">Acer</option>
												<option value="5" selected>Samsung</option>';
									}
									else{
										echo '	<option value="1">HP</option>
												<option value="2">ASUS</option>
												<option value="3">Dell</option>
												<option value="4">Acer</option>
												<option value="5">Samsung</option>';
									}
                                ?>                               
                            </select>
                            <br><br>
                            
                            <span class="cadPerf">Tamanho:</span> 
                            <select name="tamanho">
                            	<option value="">Selecione:</option>
                            	
                                <?php
                                	if($tamanho == 1){
										echo '	<option value="1" selected>13 Polegadas</option>
												<option value="2">15 Polegadas</option>
												<option value="3">17 Polegadas</option>';
									}
									else if($tamanho == 2){
										echo '	<option value="1">13 Polegadas</option>
												<option value="2" selected>15 Polegadas</option>
												<option value="3">17 Polegadas</option>';
									}
									else if($tamanho == 3){
										echo '	<option value="1">13 Polegadas</option>
												<option value="2">15 Polegadas</option>
												<option value="3" selected>17 Polegadas</option>';
									}
									else{
										echo '	<option value="1">13 Polegadas</option>
												<option value="2">15 Polegadas</option>
												<option value="3">17 Polegadas</option>';
									}
								?>
                            </select>
                            <br><br>
                            
                            <span class="cadPerf">Processador:</span> 
                            <select name="processador">
                            	<option value="">Selecione:</option>
                                
                                <?php
                                	if($processador == 1){
										echo '	<option value="1" selected>Intel i3</option>
												<option value="2">Intel i5</option>
												<option value="3">Intel i7</option>
												<option value="4">AMD Sempron</option>';
									}
									else if($processador == 2){
										echo '	<option value="1">Intel i3</option>
												<option value="2" selected>Intel i5</option>
												<option value="3">Intel i7</option>
												<option value="4">AMD Sempron</option>';
									}
									else if($processador == 3){
										echo '	<option value="1">Intel i3</option>
												<option value="2">Intel i5</option>
												<option value="3" selected>Intel i7</option>
												<option value="4">AMD Sempron</option>';
									}
									else if($processador == 4){
										echo '	<option value="1">Intel i3</option>
												<option value="2">Intel i5</option>
												<option value="3">Intel i7</option>
												<option value="4" selected>AMD Sempron</option>';
									}
									else{
										echo '	<option value="1">Intel i3</option>
												<option value="2">Intel i5</option>
												<option value="3">Intel i7</option>
												<option value="4">AMD Sempron</option>';
									}
								?>
                                
                                
                            </select>
                            <br><br>
                            
                            <span class="cadPerf">Memória RAM:</span> 
                            <select name="ram">
                            	<option value="">Selecione:</option>
                                
                                <?php
                                	if($ram == 1){
										echo '	<option value="1" selected>2GB</option>
												<option value="2">4GB</option>
												<option value="3">8GB</option>';
									}
									else if($ram == 2){
										echo '	<option value="1">2GB</option>
												<option value="2" selected>4GB</option>
												<option value="3">8GB</option>';
									}
									else if($ram == 3){
										echo '	<option value="1">2GB</option>
												<option value="2">4GB</option>
												<option value="3" selected>8GB</option>';
									}
									else{
										echo '	<option value="1">2GB</option>
												<option value="2">4GB</option>
												<option value="3">8GB</option>';
									}
								?>
                            </select>
                            <br><br>
                            
                            <span class="cadPerf">HD:</span> 
                            <select name="hd">
                            	<option value="">Selecione:</option>
                                
                                <?php
									if($hd == 1){
										echo '	<option value="1" selected>500GB</option>
												<option value="2">750GB</option>
												<option value="3">1TB</option>';

									}
									else if($hd == 2){
										echo '	<option value="1">500GB</option>
												<option value="2" selected>750GB</option>
												<option value="3">1TB</option>';

									}
									else if($hd == 3){
										echo '	<option value="1">500GB</option>
												<option value="2">750GB</option>
												<option value="3" selected>1TB</option>';

									}
									else{
										echo '	<option value="1">500GB</option>
												<option value="2">750GB</option>
												<option value="3">1TB</option>';
									}
								
                                ?>
                                
                                
                            </select>
                            <br><br>
                            
                            <span class="cadPerf">Placa de Vídeo:</span> 
                            <select name="video">
                            	<option value="">Selecione:</option>
                                
                                <?php
                                
									if($video == 1){
										echo '	<option value="1" selected>256MB</option>
												<option value="2">1GB</option>
												<option value="3">2GB</option>';

									}
									else if($video == 2){
										echo '	<option value="1">256MB</option>
												<option value="2" selected>1GB</option>
												<option value="3">2GB</option>';

									}
									else if($video == 3){
										echo '	<option value="1">256MB</option>
												<option value="2">1GB</option>
												<option value="3" selected>2GB/option>';

									}
									else{
										echo '	<option value="1">256MB</option>
												<option value="2">1GB</option>
												<option value="3">2GB</option>';
									}
								?>
                                
                            </select>
                            <br>
                            <br>
                            
                            <span class="cadPerf">Preço:</span> 
                            <select name="preco">
                            	<option value="">Selecione:</option>
                                
                                <?php
								
                                	if($preco == 1){
										echo '	<option value="1" selected>&lt; R$ 1000,00</option>
												<option value="2">&gt;= R$ 1000,00 e &lt; R$ 2000,00</option>
												<option value="3">&gt;= R$ 2000,00 e &lt; R$ 3000,00</option>
												<option value="4">&gt;= R$ 3000,00</option>';
									}
									else if($preco == 2){
										echo '	<option value="1">&lt; R$ 1000,00</option>
												<option value="2" selected>&gt;= R$ 1000,00 e &lt; R$ 2000,00</option>
												<option value="3">&gt;= R$ 2000,00 e &lt; R$ 3000,00</option>
												<option value="4">&gt;= R$ 3000,00</option>';
									}
									else if($preco == 3){
										echo '	<option value="1">&lt; R$ 1000,00</option>
												<option value="2">&gt;= R$ 1000,00 e &lt; R$ 2000,00</option>
												<option value="3" selected>&gt;= R$ 2000,00 e &lt; R$ 3000,00</option>
												<option value="4">&gt;= R$ 3000,00</option>';
									}
									else if($preco == 4){
										echo '	<option value="1">&lt; R$ 1000,00</option>
												<option value="2">&gt;= R$ 1000,00 e &lt; R$ 2000,00</option>
												<option value="3">&gt;= R$ 2000,00 e &lt; R$ 3000,00</option>
												<option value="4" selected>&gt;= R$ 3000,00</option>';
									}
									else{
										echo '	<option value="1">&lt; R$ 1000,00</option>
												<option value="2">&gt;= R$ 1000,00 e &lt; R$ 2000,00</option>
												<option value="3">&gt;= R$ 2000,00 e &lt; R$ 3000,00</option>
												<option value="4">&gt;= R$ 3000,00</option>';
									}
								?>
                                
                                
                            </select>
                            <br /><br />
                            <input type="hidden" value="alterar" name="acao" />
                            
                            <input type="submit" id="btnCadastrar" style="display:none;">
                        	<a onclick="$('#btnCadastrar').click();" class="button"><span>Salvar alterações</span></a>
                        </form>
                            </form>
                    	</div>
                        <!-- fim description -->
                    </div> <!-- fim right -->
                <div class="clear h16"></div>
            
<?
	if ($_GET['primeiroAcesso']) {
		alertar('Cadastre um perfil de Notebooks para acharmos o melhor pra você!', 'sucesso');
	}
	getFooter(); 
?>