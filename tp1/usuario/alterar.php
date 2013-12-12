<?php
	include ("../funcoes.php"); 
	logado();
	
	if ($_POST['acao'] == 'alterar') {
		$usuario = new Usuario();
		$usuario->setId($_SESSION['idUsuario']);
		$usuario->setNome($_POST['nome']);
		$usuario->setSobrenome($_POST['sobrenome']);
		$usuario->setCPF($_POST['cpf']);
		$usuario->setEmail($_POST['email']);
		$usuario->setSenha($_POST['senha']);
		$usuario->setApelido($_POST['apelido']);
	
		$usuarioAlterado = alterarUsuario($usuario);
		
		if ($usuarioAlterado == 1) {
			header('Location:' . SYSURL. "usuario/index.php?alteracao=ok");
		} 
		else if ($usuarioAlterado == 2){
			$erro = 'CPF ou E-mail inválidos.';
		}
		else{
			$erro = 'Erro no cadastro.';
		}
	}
	
	$usuario = pesquisarUsuario($_SESSION['idUsuario']);
	
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
							'usuario'=>'Conta',
							'alterar.php'=>'Alterar',
						));
						?>
					</div>
                    
                    
                	  <div class="left">
                      <h2>Alterar meus dados</h2>
                      <div class="content">
                        <form method="post" id="cadastrarUsuario" onsubmit="return usuarioOK();">
                        <p><table class="form">
                            <tbody><tr>
                              <td><span class="required">*</span> Nome:</td>
                              <td><input type="text" name="nome" value="<?php echo $usuario->getNome();?>"></td>
                            </tr>
                            <tr>
                              <td><span class="required">*</span> Sobrenome:</td>
                              <td><input type="text" name="sobrenome" value="<?php echo $usuario->getSobrenome();?>"></td>
                            </tr>
                            <tr>
                              <td><span class="required">*</span> CPF:</td>
                              <td><input type="text" name="cpf" value="<?php echo $usuario->getCpf();?>">
                                </td>
                            </tr>
                            <tr>
                              <td><span class="required">*</span> E-Mail:</td>
                              <td><input type="text" name="email" value="<?php echo $usuario->getEmail();?>">
                                </td>
                            </tr>
                            <tr>
                              <td><span class="required">*</span> Senha:</td>
                              <td><input type="password" name="senha" value="">
                                </td>
                            </tr>
                            <tr>
                              <td>Apelido:</td>
                              <td><input type="text" name="apelido" value="<?php echo $usuario->getApelido();?>"></td>
                            </tr>
                          </tbody></table>
                          <input type="hidden" name="acao" value="alterar" />
                        </p>
                            
                            <input type="submit" id="btnCadastrar" style="display:none;">
                            <a onclick="$('#btnCadastrar').click();" class="button"><span>Salvar alterações</span></a>
                        </form>
                        </div>
                    </div>
                    
                    
                </div>
                <div class="clear"></div>

<?php
	getFooter();
?>