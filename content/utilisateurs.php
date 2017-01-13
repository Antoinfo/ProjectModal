<?php



class Utilisateur{
    public $login ;
    public $mdp ;
    public $nom ;
    public $email ;
    public $admin;
    
    public static function getUtilisateur($dbh,$login) {
        $query = "SELECT * FROM `utilisateurs` WHERE `login`= ?";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $sth->execute(array($login));
        $user = $sth->fetch();
        $sth->closeCursor();
        echo $user;
    }
    
    public static function isUtilisateur($dbh,$login) {
        $query = "SELECT * FROM `utilisateurs` WHERE `login`= ?";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $sth->execute(array($login));
        $user = $sth->fetch();
        $sth->closeCursor();
        if ($user!=""){
            return TRUE;
        }
        else {
            return FALSE;
        }
            
    }
    
    public static function insererUtilisateur($dbh,$login,$mdp,$nom,$email){
        $query = "INSERT INTO `utilisateurs`(`login`, `mdp`, `nom`,`email`) VALUES (?,SHA1(?),?,?)";
        $sth = $dbh->prepare($query);
        $sth->execute(array($login,$mdp,$nom,$email));
    }
    
    public static function testerMdp($dbh, $login, $mdpa) {
        $query = "SELECT `mdp` FROM `utilisateurs` WHERE `login`=?";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $sth->execute(array($login));
        $password = $sth->fetch()->mdp;
        return $password == sha1($mdpa) ;
    }
    
    public static function getaccesslvl($dbh, $login){
        
        $query = "SELECT `admin` FROM `utilisateurs` WHERE `login`=?";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $sth->execute(array($login));
        $nivadmin = $sth->fetch()->admin;
        return $nivadmin;
    }
    
    public static function deleteUtilisateur($dbh, $login){
    $query = "DELETE FROM `utilisateurs`WHERE `login`=?";
        $sth = $dbh->prepare($query);
        $sth->execute(array($login));
        
    }
}



function logIn($dbh){
    if(isset($_POST["login"]) && $_POST["login"] != "" && isset($_POST["mdp"])) {
    
        
        $existe = Utilisateur::isUtilisateur($dbh,$_POST["login"]);
        if ($existe){
            $validemdp=Utilisateur::testerMdp($dbh, $_POST["login"], $_POST["mdp"]);
            if ($validemdp){
                $_SESSION['loggedIn']=true;
                $_SESSION['login']=$_POST["login"];
                $_SESSION['admin']=Utilisateur::getaccesslvl($dbh, $_POST["login"]);
                echo 
                "</br></br></br></br>  <p>Vous êtes identifié(e)</p>" ;
                
            }
            else{
                echo "<p>Mot de passe incorrect</p>" ;
            }
        }
        else {
            echo "<p>Login incorrect</p>" ;
        }
    
  } 
  else {
      echo "<p>Login ou mdp non valide veuillez vérifiez votre mdp ou créer un compte au préalable</p>";
  }
    
}

function logOut(){
    unset($_SESSION['loggedIn']);
    session_destroy();
}
  
function creercompte($dbh) {
    
      
      if (isset($_POST['login'], $_POST['mdp'], $_POST['nom'], $_POST['email'])){
          
      $login=$_POST['login'];
      $mdp=$_POST['mdp'];
      $nom=$_POST['nom'];
      $email=$_POST['email'];
      
        if (Utilisateur::isUtilisateur($dbh,$login)){
            echo"<p>login déjà utilisé !</p>";
        }
         else {
            if (strlen($mdp)>9){
                Utilisateur::insererUtilisateur($dbh,$login,$nom,$mdp,$email);
          
                echo"<p>Vous avez créé un compte, félicitations !</p>";
             }
      
            else if (strlen($mdp)<=9) { 
                echo"<p>Votre mot de passe fait moins de 10 caractères</p>";
            }
      
         }
      }
      
      
      
      
      else {
          echo"<p>Vous n'êtes pas connecté ou il manque des infos !</p>";
      }
      
      
  }
  
  
  function detruireuncompte($dbh, $login){
      Utilisateur::deleteUtilisateur($dbh,$login);
      
  }
  
  
  

?>
