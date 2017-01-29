<?php

class Database {
public static function connect() {
$dsn = 'mysql:dbname=Voting;host=127.0.0.1';
$user = 'root';
$password = '';
$dbh = null;
try {
$dbh = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
} catch (PDOException $e) {
echo 'Connexion échouée : ' . $e->getMessage();
exit(0);
}
return $dbh;
}
}
class Questions {
public $id_Questions;
public $Question;
public $publicKey;
public $Choix0;
public $Choix1;



public static function getQuestions($id_Questions) {
$dbh = Database::connect();
$query = "SELECT * FROM Questions WHERE `id_Questions`=?";
$sth = $dbh->prepare($query);
$sth->setFetchMode(PDO::FETCH_CLASS, 'Questions');
$sth->execute(array($id_Questions));
$user = $sth->fetch();
$sth->closeCursor();
return $user;

}

public static function getPubKey($id_Questions) {
$dbh = Database::connect();
$query = "SELECT publicKey FROM `Questions` WHERE `id_Questions`=?";
$sth = $dbh->prepare($query);
$sth->setFetchMode(PDO::FETCH_CLASS, 'Questions');
$sth->execute(array($id_Questions));
$pub = $sth->fetch();
$sth->closeCursor();
return $pub;
}

public static function getChoix0($id_Questions) {
$dbh = Database::connect();
$query = "SELECT `Choix0` FROM `Questions` WHERE `id_Questions`=?";
$sth = $dbh->prepare($query);
$sth->setFetchMode(PDO::FETCH_CLASS, 'Questions');
$sth->execute(array($id_Questions));
$choix = $sth->fetch();
$sth->closeCursor();
return $choix;
}

public static function getChoix1($id_Questions) {
$dbh = Database::connect();
$query = "SELECT `Choix1` FROM `Questions` WHERE `id_Questions`=?";
$sth = $dbh->prepare($query);
$sth->setFetchMode(PDO::FETCH_CLASS, 'Questions');
$sth->execute(array($id_Questions));
$choix = $sth->fetch();
$sth->closeCursor();
return $choix;
}

public static function addQuestions($dbh, $Question, $publicKey, $Choix0, $Choix1) {
$dbh = Database::connect();
$query = "INSERT INTO `Questions` (`Question`, `publicKey`,`Choix0`, `Choix1`) VALUES(?, ?, ?, ?)";
$sth = $dbh->prepare($query);
$sth->setFetchMode(PDO::FETCH_CLASS, 'Questions');
$sth->execute(array($Question, $publicKey, $Choix0, $Choix1));
$sth->closeCursor();
}

public static function deleteQuestion($dbh, $identifiant){
    $query = "DELETE FROM `Questions`WHERE `id_Questions`=?";
        $sth = $dbh->prepare($query);
        $sth->execute(array($identifiant));
        
    }


}


  function detruirequestion($dbh, $question){
      Questions::deleteQuestion($dbh,$question);
      
  }
  
  
class Tokens {
public $id_Quesions;
public $token;
public $used;


public static function getToken($dbh, $token) {
$dbh = Database::connect();
$query = "SELECT * FROM `Tokens` WHERE `token`=?";
$sth = $dbh->prepare($query);
$sth->setFetchMode(PDO::FETCH_CLASS, 'Tokens');
$sth->execute(array($token));
$user = $sth->fetch();
$sth->closeCursor();
return $user;

}

public static function addToken($dbh, $token, $id_Questions) {
$dbh = Database::connect();
$query = "INSERT INTO `token` (`token`, `id_Questions`) VALUES(?, ?)";
$sth = $dbh->prepare($query);
$sth->setFetchMode(PDO::FETCH_CLASS, 'Tokens');
$sth->execute(array($token, $id_Questions));
$sth->closeCursor();

}
}
class Votes {
public $id_Votes;
public $vote;
public $token;
public $id_Quesions;

public static function getVotes($id_Questions) {
$dbh = Database::connect();
$query = "SELECT * FROM `Votes` WHERE `id_Questions`=?";
$sth = $dbh->prepare($query);
$sth->setFetchMode(PDO::FETCH_CLASS, 'Votes');
$sth->execute(array($id_Questions));
$resultat=$sth->fetchAll();

$sth->closeCursor();
return $resultat;

}

public static function addVotes($vote, $token, $id_Questions) {
$dbh = Database::connect();
$query = "INSERT INTO `Votes` (`vote`, `token`, `id_Questions`) VALUES(?, ?, ?)";
$sth = $dbh->prepare($query);
$sth->setFetchMode(PDO::FETCH_CLASS, 'Votes');
$sth->execute(array($vote, $token, $id_Questions));
$sth->closeCursor();

}


public static function deleteVote($dbh, $vote){
    $query = "DELETE FROM `Votes`WHERE `token`=?";
        $sth = $dbh->prepare($query);
        $sth->execute(array($vote));
        
    }
  
}
  function detruireVote($dbh, $vote){
      Votes::deleteVote($dbh,$vote);
      
  }

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
            if (strlen($mdp)>7){
                Utilisateur::insererUtilisateur($dbh,$login,$mdp,$nom,$email);
          
                echo"<p>Vous avez créé un compte, félicitations !</p>";
             }
      
            else if (strlen($mdp)<=8) { 
                echo"<p>Votre mot de passe fait moins de 8 caractères</p>";
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
