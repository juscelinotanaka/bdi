<? if (isset($_SESSION)) { ?>
Bem vindo, <? echo $_SESSION['nome'].' '.$_SESSION['sobrenome']; ?>.
<? } else { ?>

Bem vindo visitante. Você pode fazer <a href="<? echo SYSURL; ?>login.php">login</a> ou <a href="<? echo SYSURL; ?>login.php">criar um conta</a>. 
<? } ?>