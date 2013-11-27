<!doctype html>
<html>
<head>
<meta charset="UTF-8">

<title>Exemplo</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />

<style type="text/css">
* {
margin: 0;
padding: 0;
}

html, body {
height: 100%;
}

* html #tudo {height: 100%;}

body {
background-color: #fff; /* Cor do Fundo*/
}

.contentCenter {
width: 960px;
vertical-align: top;
position: relative;
margin-left: auto;
margin-right: auto;
}
.SRBDI {
	margin-top:8px;
	font-size:22px;
	font-weight:bold;
}

#tudo {
	margin: 0 auto;
	text-align: left;
	position: relative;
	min-height: 100%;
}

#conteudo {
	padding-top:44px;
	padding-bottom: 50px;
}

#rodape {
	position: absolute;
	bottom: 0;
	height: 35px;
	line-height: 35px;
	text-align: center;
	width: 100%;
	background-color: #CCC;
}

#cabecalho {
	position:fixed;
	height:44px;
	width:100%;
	background-color: #CCC;
}

.SRBDIcenter {
	font-size:60px;
	font-weight:bold;
	text-align:center;
	padding:60px 0;
}
.buscar {
	text-align:center;
}
input[name=q] {
	font-size:20px;
	padding:8px;
	border:#09F thin solid;
	width:600px;
}










.floatLeft {
	float:left;
}

.floatRight {
	float:right;
}

body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
}

</style>


</head>

<body>
<div id="tudo">
	<div id="cabecalho">
    	<div class="contentCenter">
        	<div class="floatRight">
            	Entrar
            </div>
            <div class="SRBDI">
            	Sistema de Recomendação BDI
            </div>
        </div>
    </div>
    <div id="conteudo">
        <div class="contentCenter">
        	<div class="SRBDIcenter">
            	SRBDI
            </div>
            <div class="buscar">
                <input type="text" name="q" placeholder="Busque o seu notebook">
            </div>
        </div>
    </div>
    <div id="rodape">
		<p>Todos Direitos Reservados – RedeComp - Rede de Compromissos ® 2012</p>
	</div>
</div>
</body>
</html>