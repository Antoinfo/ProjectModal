<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=Voting;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

if (isset($_POST['vote']) AND isset($_POST['token']))
{
        // Testons si le fichier n'est pas trop gros
        $req = $bdd->prepare('INSERT INTO Token(id,token,vote) VALUES(:id,:token,:vote)');
        $req->execute(array(
          	'id' => $_POST['id'],
            'token' => $_POST['token'],
            'vote' => $_POST['vote']
    	));
        
}
//header('Location: Votes.php');
?>