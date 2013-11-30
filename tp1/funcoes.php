<?
define( 'ABSPATH', dirname(__FILE__) . '/' );
define( 'SYSURL', '/bdi/tp1/');

include (ABSPATH."crumbs.php");
include (ABSPATH."controller/controlador.php");

function temPerfil() {
	return false;
}

function alertar($mensagem, $tipo) {
	if ($tipo == 'sucesso') {
		$mTipo = 'success';
	} else if ($tipo == 'erro') {
		$mTipo = 'warning';
	} else if ($tipo == 'atencao') {
		$mTipo = 'attention';
	} else if ($tipo == 'info') {
		$mTipo = 'information';
	} else if ($tipo == 'sucesso') {
		$mTipo = 'success';
	}
	echo '<script type="text/javascript">alertar("'.$mensagem.'", "'.$mTipo.'");</script>';
}

function logout () {
	if (!isset($_SESSION)) {
	  session_start();
	}
	
	//to fully log out a visitor we need to clear the session varialbles
	$_SESSION['MM_Username'] = NULL;
	$_SESSION['MM_UserGroup'] = NULL;
	
	unset($_SESSION['MM_Username']);
	unset($_SESSION['MM_UserGroup']);
	
	header("Location: ". SYSURL. "login.php");
	exit;
}

function logado () {
	
	if (!isset($_SESSION)) {
	  session_start();
	}
	
	$MM_authorizedUsers = "";
	$MM_donotCheckaccess = "true";
	
	
	if (!function_exists("isAuthorized")) {
		// *** Restrict Access To Page: Grant or deny access to this page
		function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
		  // For security, start by assuming the visitor is NOT authorized. 
		  $isValid = False; 
		
		  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
		  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
		  if (!empty($UserName)) { 
			// Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
			// Parse the strings into arrays. 
			$arrUsers = Explode(",", $strUsers); 
			$arrGroups = Explode(",", $strGroups); 
			if (in_array($UserName, $arrUsers)) { 
			  $isValid = true; 
			} 
			// Or, you may restrict access to only certain users based on their username. 
			if (in_array($UserGroup, $arrGroups)) { 
			  $isValid = true; 
			} 
			if (($strUsers == "") && true) { 
			  $isValid = true; 
			} 
		  } 
		  return $isValid; 
		}
	}
	
	$MM_restrictGoTo = SYSURL. "login.php";
	if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
	  $MM_qsChar = "?";
	  $MM_referrer = $_SERVER['PHP_SELF'];
	  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
	  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
	  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
	  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "url=" . urlencode($MM_referrer);
	  header("Location: ". $MM_restrictGoTo); 
	  exit;
	}
	return true;
}

function logar ($email, $senha) {
	
	$anUser = consultarUsuario($email, $senha);
	
	if (!isset($_SESSION)) {
	  session_start();
	}
	
	$loginUsername=$email;
	$password=$senha;
	
	$loginFoundUser = $anUser;

	if ($loginFoundUser) {
		
		$loginStrGroup = "";
		
		if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
		//declare two session variables and assign them
		$_SESSION['MM_Username'] = $loginUsername;
		$_SESSION['MM_UserGroup'] = $loginStrGroup;
		$_SESSION['idUsuario'] = $anUser->getId();
		$_SESSION['nome'] = $anUser->getNome();
		$_SESSION['sobrenome'] = $anUser->getSobrenome();
		
		return true;
	} else {
		return false;
	}
}


function getHeader() {
	include ("header.php");
}
function getFooter() {
	include ("footer.php");
}
function getColunaHome() {
	include ("colunaHome.php");
}
function getColunaLogin() {
	include ("colunaLogin.php");
}
function getBemVindo() {
	include ("bemvindo.php");
}




?>