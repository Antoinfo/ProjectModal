<html>
 
<?php
function printLoginForm($page){
    echo <<<FIN
    </br>
    </br>
    </br>
    <form action="index.php?todo=login&page=$page" method="post">
    <p>Login : <input type="text" name="login" required /></p>
    <p>Mot de passe : <input type="password" name="mdp" required /></p>
    <p><input type="submit" value="Valider" /></p>
  </form>
FIN;
}

function printLogoutForm(){
    echo <<<FIN
    </br>
    </br>
    </br>
    <form action="index.php?todo=logout" method="post">
   
    <p><input type="submit" value="Deconnexion" /></p>
  </form>
FIN;
    
}

?>
</body>


</html>
