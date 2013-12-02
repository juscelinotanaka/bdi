<?
	include ("../funcoes.php"); 
	logado();
	
	if ($_POST['acao'] == 'cadastrar') {
		$perfil = new Perfil();
		$perfil->setIdUsuario($_SESSION['idUsuario']);
		$perfil->setDescricao($_POST['descricao']);
		$perfil->setCaracteristicas($_POST['tamanho']."|".$_POST['processador']."|".$_POST['ram']."|".$_POST['hd']."|".$_POST['video']."|".$_POST['preco']."|".$_POST['marca']);
		
		print_r($perfil);
		$cadastro = cadastrarPerfil($perfil);
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
							'cadastrar.php'=>'Cadastrar Perfil'
						));
						?>
					</div>
      
                    <div class="geral">
                    	<div class="description">
                            <h1>Cadastrar Perfil</h1>
                            <p>Dê um nome para o seu perfil e defina as características de como você prefere um notebook.</p>
                            <form method="post" id="cadastrar">
                            <span><span class="required">*</span> Descrição: <h5>ex. Só i5, 8GB de Memória, Tops</h5></span> <input type="text" name="descricao" /><br><br />
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
                            
                            <span class="cadPerf">Preço:</span> 
                            <select name="preco">
                            	<option value="">Selecione:</option>
                                <option value="1">&lt; R$ 1000,00</option>
                                <option value="2">&gt;= R$ 1000,00 e &lt; R$ 2000,00</option>
                                <option value="3">&gt;= R$ 2000,00 e &lt; R$ 3000,00</option>
                                <option value="4">&gt;= R$ 3000,00</option>
                            </select>
                            <br /><br />
                            <input type="hidden" value="cadastrar" name="acao" />
                            <a onclick="$('#cadastrar').submit();" class="button"><span>Cadastrar</span></a>
                            </form>
                    	</div>
                        <!-- fim description -->
                    </div> <!-- fim right -->
                <div class="clear h16"></div>
            </div> <!-- fim principal -->
            
<?
	
	if ($_GET['primeiroAcesso']) {
		alertar('Cadastre um perfil de Notebooks para acharmos o melhor pra você!', 'sucesso');
	}
	getFooter(); 
?>