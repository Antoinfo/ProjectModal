<?php
if (!isset($_SESSION['loggedIn'])) {
  echo "Page non autorisée, vous devez vous connecter en tant qu'admin pour accéder à cette page.";
  return;
}
if (isset($_SESSION['loggedIn'])) {
    if (!$_SESSION['admin']==5){
  echo "Page non autorisée, vous n'avez pas les droits pour accéder à cette page.";
  return;
    }
  
echo "</br></br></br></br> Bonjour admin";

$adminlvl=Utilisateur::getaccesslvl($dbh, $_SESSION["login"]);
echo "</br></br></br></br> Votre niveau d'admin est : " ;
echo $adminlvl;


echo <<<FIN
    </br>
    </br>
    </br>
    
<form class action="index.php?todo=detruireutilisateur" method="post" id="destroy-user" class="form-inline">
                            <fieldset>

 <div class="form-group">
                                        
                                    <label for="exampleInputName2">Login</label>
                                    <input type="text" placeholder="Utilisateur que vous souhaitez supprimer"  name="login" required class="form-control">
                                  
                                    </br>

                                </div>
    <div class="form-group">
                                    <label class="col-md-12 control-label" for="singlebutton"></label>
                                        <div class="col-md-12">
                                            <button id="singlebutton" name="singlebutton" class="btn btn-primary">Détruire utilisateur</button>
                                            </br></br>
                                            
                                    </br>
                                    </br>
                                        </div>
 
  </form>
FIN;




}




?>