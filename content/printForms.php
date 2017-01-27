<?php
function printLoginForm($page){
    echo <<<FIN
    </br>
    </br>
    <a class="after" href="#" data-toggle="modal" data-target="#login-modal">Login</a>
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	<div class="modal-dialog">
            <div class="loginmodal-container">
                <h1>Connectez vous</h1><br>
                <form action="index.php?todo=login&page=$page" method="post">
                    <input type="text" name="login" placeholder="Login" required>
                    <input type="password" name="mdp" placeholder="Mot de passe" required>
                    <button id="singlebutton" name="singlebutton" class="btn btn-success">Connexion</button> 
                </form>
            </div>
        </div>    
    </div>
FIN;
}
function printLogoutForm(){
    echo <<<FIN
    </br>
    </br>
    <form action="index.php?todo=logout" method="post">
   
    <button id="singlebutton" name="singlebutton" class="btn btn-danger">Déconnexion</button>
  </form>
FIN;
    
}
?>