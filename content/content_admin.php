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
  
echo "</br></br></br></br>Bonjour admin";

$adminlvl=Utilisateur::getaccesslvl($dbh, $_SESSION["login"]);
echo "</br></br></br></br>Votre niveau d'admin est : " ;
echo $adminlvl;


echo <<<FIN
    </br>


<div class="col-md-12">

                    <div class="caption-full">
                        
                           </br>
                              
                            <form class action="index.php?todo=detruireutilisateur" method="post" id="destroy-user" >
                            <fieldset>

                            <!-- Form Name -->
                                <legend>Détruire un compte</legend>
                        </br>
    
    

                           

 <div class="form-group">
                                        
                                    <label>Login</label>
                                    <input type="text" placeholder="Utilisateur que vous souhaitez supprimer"  name="login" required class="form-control">
                                  
                                    </br>

                                </div>
    <div class="form-group">
                                    <label class="col-md-12 control-label"></label>
                                        <div class="col-md-12">
                                            <button name="singlebutton" class="btn btn-primary">Détruire utilisateur</button>
                                            </br></br>
                                            
                                    </br>
                                    </br>
                                        </div>
                                        </div>

                                 </fieldset>
                                </form>
            </div>
            </div>



<div class="col-md-12">

                    <div class="caption-full">
                        
                           </br>
                              
                            <form class action="index.php?todo=detruirequestion" method="post" id="destroy-question" >
                            <fieldset>

                            <!-- Form Name -->
                                <legend>Supprimer une question</legend>
                        </br>
    
    

                           

 <div class="form-group">
                                        
                                    <label>Identifiant de la question</label>
                                    <input type="text" placeholder="Identifiant de la question que vous souhaitez supprimer"  name="question" required class="form-control">
                                  
                                    </br>

                                </div>


<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button name="singlebutton" class="btn btn-primary"><span class="fa fa-bomb fa-2x"></span></button>
</br></br>
   
                                        </div>
                                        </div>
                                 </fieldset>
                                </form>
            </div>
            </div>




<div class="col-md-12">

                    <div class="caption-full">
                        
                           </br>
                              
                            <form class action="index.php?todo=detruirevote" method="post" id="destroy-vote" >
                            <fieldset>

                            <!-- Form Name -->
                                <legend>Supprimer un vote</legend>
                        </br>
    
    

                           

 <div class="form-group">
                                        
                                    <label for="vote">Token du vote</label>
                                    <input type="text" placeholder="Token du vote que vous souhaitez supprimer"  name="vote" required class="form-control">
                                  
                                    </br>

                                </div>


<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary"><span class="fa fa-bomb fa-2x"></span></button>
</br></br>
   
                                        </div>
 

                                 </fieldset>
                                </form>
            </div>
            </div>

FIN;




}




?>