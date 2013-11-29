<?
include ("funcoes.php"); 

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
							'login'=>'Login',
						));
						?>
					</div>
                    
                    
                	<div class="tituloGrupo">Acesso</div>
                    
                    <div class="left">
                      <h2>Novo Usuário</h2>
                      <div class="content">
                        <p><b>Criar Conta</b></p>
                        <p><table class="form">
                            <tbody><tr>
                              <td><span class="required">*</span> Nome:</td>
                              <td><input type="text" name="firstname" value=""></td>
                            </tr>
                            <tr>
                              <td><span class="required">*</span> Sobrenome:</td>
                              <td><input type="text" name="lastname" value=""></td>
                            </tr>
                            <tr>
                              <td><span class="required">*</span> CPF:</td>
                              <td><input type="text" name="email" value="">
                                </td>
                            </tr>
                            <tr>
                              <td><span class="required">*</span> E-Mail:</td>
                              <td><input type="text" name="email" value="">
                                </td>
                            </tr>
                            <tr>
                              <td><span class="required">*</span> Senha:</td>
                              <td><input type="text" name="telephone" value="">
                                </td>
                            </tr>
                            <tr>
                              <td>Apelido:</td>
                              <td><input type="text" name="fax" value=""></td>
                            </tr>
                          </tbody></table>
                        </p>
                        <a href="http://www.santoshsetty.com/tf/opencart-templates/mystockimageshop-v15/index.php?route=account/register" class="button"><span>Continue</span></a></div>
                    </div>
                    
                    <div class="right">
                      <h2>Já Sou Cadastrado</h2>
                      <form action="http://www.santoshsetty.com/tf/opencart-templates/mystockimageshop-v15/index.php?route=account/login" method="post" enctype="multipart/form-data" id="login">
                        <div class="content">
                          <p>Faça login aqui</p>
                          <b>E-Mail Address:</b><br>
                          <input type="text" name="email" value="">
                          <br>
                          <br>
                          <b>Password:</b><br>
                          <input type="password" name="password" value="">
                          <br>
                          <br>
                          <a onclick="$('#login').submit();" class="button"><span>Login</span></a>
						</div>
                      </form>
                    </div>
                </div>
                <div class="clear"></div>
            
            </div> <!-- fim texto -->
            
<?
getFooter(); 
?>