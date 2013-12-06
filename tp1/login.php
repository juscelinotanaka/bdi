<?
include ("funcoes.php"); 

if (isset($_SESSION)) {
	header("location: index.php");
}

if ($_POST['acao'] == 'logar') {
	if (logar($_POST['email'], $_POST['senha'])) {
		if ($_GET['url']) {
			header("Location: ". $_GET['url']);
		} else {
			header("Location: ". $SYSURL. "index.php");
		}
	} else {
		$erro = 'Login e/ou senha inválidos.';
	}
} else if ($_POST['acao'] == 'cadastrar') {
	$usuario = new Usuario();
	$usuario->setNome($_POST['nome']);
	$usuario->setSobrenome($_POST['sobrenome']);
	$usuario->setCPF($_POST['cpf']);
	$usuario->setEmail($_POST['email']);
	$usuario->setSenha($_POST['senha']);
	$usuario->setApelido($_POST['apelido']);
	
	if (cadastrarUsuario($usuario) == 1) {
		$cadastroOk = 'Cadastro Realizado com Sucesso!';
	} 
	else if (cadastrarUsuario($usuario) == 2){
		$erro = 'CPF ou E-mail inválidos.';
	}
	else{
		$erro = 'Erro no cadastro.';
	}
}

getHeader();
?>
            	<div class="colunaDireita">
                	<? getColunaLogin(); ?>
                </div>
            	<div class="principal">
                
                	<div class="breadcrumb">
                       <?
						breadcrumb(array(
							'http://localhost/bdi/tp1/'=>'Home', 
							'login'=>'Login',
						));
						?>
					</div>
                    
                    
                	<div class="tituloGrupo">Acesso</div>
                    
                    <div class="left">
                      <h2>Novo Usuário</h2>
                      <div class="content">
                        <p><b>Criar Conta</b></p>
                        <form method="post" id="cadastrarUsuario" onsubmit="return usuarioOK();">
                        <p><table class="form">
                            <tbody><tr>
                              <td><span class="required">*</span> Nome:</td>
                              <td><input type="text" name="nome" value=""></td>
                            </tr>
                            <tr>
                              <td><span class="required">*</span> Sobrenome:</td>
                              <td><input type="text" name="sobrenome" value=""></td>
                            </tr>
                            <tr>
                              <td><span class="required">*</span> CPF:</td>
                              <td><input type="text" name="cpf" value="">
                                </td>
                            </tr>
                            <tr>
                              <td><span class="required">*</span> E-Mail:</td>
                              <td><input type="text" name="email" value="">
                                </td>
                            </tr>
                            <tr>
                              <td><span class="required">*</span> Senha:</td>
                              <td><input type="password" name="senha" value="">
                                </td>
                            </tr>
                            <tr>
                              <td>Apelido:</td>
                              <td><input type="text" name="apelido" value=""></td>
                            </tr>
                          </tbody></table>
                          <input type="hidden" name="acao" value="cadastrar" />
                        </p>
                            
                            <input type="submit" id="btnCadastrar" style="display:none;">
                            <a onclick="$('#btnCadastrar').click();" class="button"><span>Cadastrar</span></a>
                        </form>
                        </div>
                    </div>
                    
                    <div class="right">
                      <h2>Já Sou Cadastrado</h2>
                      <form method="post" enctype="multipart/form-data" id="login">
                        <div class="content">
                          <p>Faça login aqui</p>
                          <b>E-Mail:</b><br>
                          <input type="text" name="email" value="">
                          <br>
                          <br>
                          <b>Senha:</b><br>
                          <input type="password" name="senha" value="" onkeyup="if (event.which == 13) { event.preventDefault(); $('#login').submit();}">
                          <br>
                          <br>
                          <a onclick="$('#login').submit();" class="button"><span>Entrar</span></a>
                          <input type="hidden" name="acao" value="logar" />
						</div>
                      </form>
                    </div>
                </div>
                <div class="clear"></div>
            
            
<?

if ($_GET['url']) {
	alertar('Você deve fazer login antes de acessar a página desejada.', 'info');
} else {
	if ($erro) {
		alertar($erro, 'erro');
	} else if ($cadastroOk) {
		alertar('Cadastro realizado com sucesso. Agora faça login.', 'sucesso');
	}
}

getFooter(); 
?>