<?php
if (!isset($_SESSION['loggedIn'])) {
  echo "Page non autorisée, vous devez vous connecter en tant qu'admin pour accéder à cette page";
  return;
}
if (isset($_SESSION['loggedIn'])) {
    if (!$_SESSION['admin']==5){
  echo "Page non autorisée, vous n'avez pas les droits pour accéder à cette page";
  return;
    }
  
echo "</br></br></br></br> Bonjour admin";

$adminlvl=Utilisateur::getaccesslvl($dbh, $_SESSION["login"]);
echo "</br></br></br></br> niveau d'admin:" ;
echo $adminlvl;


echo <<<FIN
    </br>
    </br>
    </br>
    <form action="index.php?todo=detruireutilisateur" method="post">
    <p>Login : <input type="text" name="login" required /></p>
    <p><input type="submit" value="Détruire utilisateur" /></p>
  </form>
FIN;




}




?>