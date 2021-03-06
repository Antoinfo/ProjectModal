<?php

session_name("utilisateurduvote");
    

    session_start();
    if (!isset($_SESSION['initiated'])) {
        session_regenerate_id();
        $_SESSION['initiated'] = true;
    }
    
    // print_r($_SESSION);
require('utilities/bdd.php') ;
require_once('utilities/utils.php');
require('utilities/printForms.php') ;



if (isset($_GET['page'])) {
    $askedPage = $_GET['page'];
} else {
    $askedPage = "accueil";
}
$authorized = checkPage($askedPage);
if ($authorized) {
    $pageTitle = getPageTitle($askedPage);
} else {
    $pageTitle = "Accueil";
}


$dbh = Database::connect();

if (array_key_exists('todo', $_GET)){
if ($_GET["todo"] == "creercompte"){
    creercompte($dbh);
}
}

if (array_key_exists('todo', $_GET)){
    if ($_GET['todo']=="login") {
    logIn($dbh);
        
    }
}
if (array_key_exists('todo', $_GET)){
    if ($_GET['todo']=="logout") {
        logOut($dbh);
        
    }
}

if (array_key_exists('todo', $_GET)){
    if (isset($_POST['login'])){
    if ($_GET['todo']=="detruireutilisateur") {
        detruireuncompte($dbh, $_POST['login']);
        
    }
    }
}

if (array_key_exists('todo', $_GET)){
    if (isset($_POST['question'])){
    if ($_GET['todo']=="detruirequestion") {
        detruireQuestion($dbh, $_POST['question']);
        
    }
    }
}

if (array_key_exists('todo', $_GET)){
    if (isset($_POST['vote'])){
    if ($_GET['todo']=="detruirevote") {
        detruireVote($dbh, $_POST['vote']);
        
    }
    }
}

generateHTMLHeader($pageTitle);
if (isset($_SESSION["loggedIn"])) {
if($_SESSION["loggedIn"]) {
    
    printLogoutForm();
    
} 
}
else {
    printLoginForm($askedPage);
}
    
generateMenu($askedPage);


$contentPage="content/content_".$askedPage.".php";
require($contentPage);
    
    	


  generateHTMLFooter();
  
?>
