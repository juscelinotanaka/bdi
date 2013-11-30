<?
include ("funcoes.php"); 

if ($_POST['acao'] == 'logar') {
	if (logar('juscelino.tanaka@gmail.com', '123')) {
		if ($_GET['url']) {
			header("Location: ". $_GET['url']);
		} else {
			header("Location: ". $SYSURL. "index.php");
		}
	} else {
		print 'erro no login';
	}
} else if ($_POST['acao'] == cadastrar) {
	$usuario = consultarUsuario('juscelino.tanaka@gmail.com', '123');
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
                        <form method="post">
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
                        </form>
                        <a href="http://www.santoshsetty.com/tf/opencart-templates/mystockimageshop-v15/index.php?route=account/register" class="button"><span>Cadatrar</span></a></div>
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
                          <input type="password" name="password" value="">
                          <br>
                          <br>
                          <a onclick="$('#login').submit();" class="button"><span>Entrar</span></a>
                          <input type="hidden" name="acao" value="logar" />
						</div>
                      </form>
                    </div>
                </div>
                <div class="clear"></div>
            
            </div> <!-- fim principal -->
            
<?
getFooter(); 
?>