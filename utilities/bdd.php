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
public $id_Quesions;
public $Question;
public $publicKey;


public static function getQuestions($dbh, $id_Questions) {
$dbh = Database::connect();
$query = "SELECT * FROM `Questions` WHERE `id_Questions`=?";
$sth = $dbh->prepare($query);
$sth->setFetchMode(PDO::FETCH_CLASS, 'Questions');
$sth->execute(array($id_Questions));
$user = $sth->fetch();
$sth->closeCursor();
return $user;

}

public static function getPubKey($id_Questions) {
$dbh = Database::connect();
$query = "SELECT * FROM `Questions` WHERE `id_Questions`=?";
$sth = $dbh->prepare($query);
$sth->setFetchMode(PDO::FETCH_CLASS, 'Questions');
$sth->execute(array($id_Questions));
$user = $sth->fetch();
$sth->closeCursor();
return $user;
}

public static function addQuestions($dbh, $Question, $publicKey) {
$dbh = Database::connect();
$query = "INSERT INTO `Questions` (`Question`, `publicKey`) VALUES(?, ?)";
$sth = $dbh->prepare($query);
$sth->setFetchMode(PDO::FETCH_CLASS, 'Questions');
$sth->execute(array($Question, $publicKey));
$sth->closeCursor();

}
}
class Tokens {
public $id_Quesions;
public $token;


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

public static function addQuestions($dbh, $token, $id_Questions) {
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

public static function addVotes($dbh, $vote, $token, $id_Quesions) {
$dbh = Database::connect();
$query = "INSERT INTO `Votes` (`vote`, `token`, `id_Questions`) VALUES(?, ?, ?)";
$sth = $dbh->prepare($query);
$sth->setFetchMode(PDO::FETCH_CLASS, 'Votes');
$sth->execute(array($vote, $token, $id_Quesions));
$sth->closeCursor();

}
}
?>
