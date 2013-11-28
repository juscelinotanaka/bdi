<!doctype html>
<html>
<head>
<meta charset="UTF-8">

<title>Exemplo</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />

<script src="js/jquery-1.6.1.min.js"></script>


</head>

<body>
<div id="tudo">
	<div id="cabecalho">
    	<div class="contentCenter">
        	
            <div class="menuSup">
            	<a href="home.php"> Home </a> | <a href="home.php"> Recomendações </a> | <a href="home.php"> Conta </a>
            </div>
            <div class="clear"></div>
            <div class="bemvindo floatRight">
            	Bem vindo visitante. Você pode fazer <a href="login.php">login</a> ou <a href="cadastrar.php">criar um conta</a>. 
            </div>
            <div class="clear"></div>
            <div class="logo">
            <img src="images/logo.png">
            </div>
            <div class="pesquisar">
            	<div class="campo">
                	<form action="pesquisar.php" method="get">
	        			<input type="text" name="q" placeholder="Pesquisar">
                    </form>
                </div>
                <input class="pesquisarBtn" type="submit" value="">
                
            </div>
            <div class="clear"></div>

<script type="text/javascript">
var timeout         = 500;
var closetimer		= 0;
var ddmenuitem      = 0;

function jsddm_open()
{	jsddm_canceltimer();
	jsddm_close();
	ddmenuitem = $(this).find('ul').eq(0).css('visibility', 'visible');}

function jsddm_close()
{	if(ddmenuitem) ddmenuitem.css('visibility', 'hidden');}

function jsddm_timer()
{	closetimer = window.setTimeout(jsddm_close, timeout);}

function jsddm_canceltimer()
{	if(closetimer)
	{	window.clearTimeout(closetimer);
		closetimer = null;}}

$(document).ready(function()
{	$('#jsddm > li').bind('mouseover', jsddm_open);
	$('#jsddm > li').bind('mouseout',  jsddm_timer);});

document.onclick = jsddm_close;
</script>
			<ul id="jsddm">
	<li><a href="#">JavaScript</a>
		<ul>
			<li><a href="#">Drop Down Menu</a></li>
			<li><a href="#">jQuery Plugin</a></li>
			<li><a href="#">Ajax Navigation</a></li>
		</ul>
	</li>
	<li><a href="#">Effect</a>
		<ul>
			<li><a href="#">Slide Effect</a></li>
			<li><a href="#">Fade Effect</a></li>
			<li><a href="#">Opacity Mode</a></li>
			<li><a href="#">Drop Shadow</a></li>
			<li><a href="#">Semitransparent</a></li>
		</ul>
	</li>
	<li><a href="#">Navigation</a></li>
	<li><a href="#">HTML/CSS</a></li>
	<li><a href="#">Help</a></li>
</ul>
			            
      </div>
    </div>
    <div id="conteudo">
        <div class="contentCenter">
            <div class="texto">
            	<div class="colunaDireita">
                	Categorias
                </div>
            	<div class="principal">
                	<div class="tituloGrupo">Recomendados para Você</div>
                    <? for ($i = 0; $i < 13; $i++) { ?>
                    <div class="produto">
                        <div class="image"><a href=""><img src="images/cups1-130x100.jpg" alt="Coffee Cups"></a></div>
                        <div class="name"><a href="">Coffee Cups</a></div>
                        <div class="price">R$ 10.00</div>
                        <div class="cart"><a href="#" class="button"><span>Detalhes</span></a></div>
                    </div>
                    <? } ?>
                </div>
            </div>
            
            <div class="rodape">
            	<div class="floatRight">
                	Orientador: Altigran Silva
                </div>
	        	Desenvolvido por Henrique Pontes e Juscelino Tanaka
        	</div>
        </div>
        
        
    </div>
    <div id="rodape">
		
	</div>
</div>

<script type="text/javascript">
$(document).ready(function()
{	$('#jsddm > li').bind('mouseover', jsddm_open);
	$('#jsddm > li').bind('mouseout',  jsddm_timer);});
</script>
</body>
</html>