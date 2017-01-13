<html>
    <head>
    	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.0-beta.5/angular.min.js"></script>
   		<script src="app.js"></script>
        <script src="js/md5.js"></script>

   		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">

    	<title>Voting</title>

    	<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/shop-item.css" rel="stylesheet">
	</head>
   
   
    <body ng-app="app" ng-controller="Main as main">
    
    		    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        		<div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Voting</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Voting - Plateforme de vote sécurisé</a>
            </div>
            
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.html">Accueil</a>
                    </li>
                    <li>
                        <a href="content/register.php">Création d'un compte</a>
                    </li>
                    <li>
                        <a href="about.html">A propos</a>
                    </li>
                    <li>
                        <a href="content/Votes.php">Votes disponibles</a>
                    </li>
                    <li>
                        <a href="Resultats.php">Obtenir le résultat</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    		</nav>

    
    
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="bg-default" id="header">
                <div class="container">
                    <div class="col-lg-8 col-lg-offset-2 text-center">
                        <h1 id="homeHeading">Vote sécurisé - Voting</h1>
                        <hr>
                        <p>Voting permet de voter de façon complètement opaque et sécurisée.</p>
                        <a href="about.html" class="btn btn-default btn-xl page-scroll">En savoir plus</a>
                    </div>
                </div>
            </div>
            
            </br>

            <section class="bg-default" id="about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2 text-center">
                            <h2 class="section-heading">Tout pour la confiance numérique</h2>
                            <hr class="light">
                            <p class="text-faded">Voting permet de voter de façon complètement opaque et sécurisée.</p>
                            <a href="#services" class="page-scroll btn btn-default btn-xl sr-button">Commencer!</a>
                        </div>
                    </div>
                </div>
            </section>

			

            <section class="bg-default" id="contact">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2 text-center">
                            <h2 class="section-heading">Restons en contact</h2>
                            <hr class="primary">
                            <p class="text-faded">Le monde entre dans l'ère du numérique et nous vous donnons les outils pour y faire face. Appelez-nous ou envoyez nous un e-mail et nous reviendrons vers vous au plus vite.</p>
                        </div>
                        <div class="col-lg-4 text-center">
                            <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                            <p><a href="mailto:contact@wesen.fr" >contact@voting.fr</a></p>
                        </div>
                    </div>
                </div>
            </section>

    	</div>
    	<!-- /.container -->


        <script type="text/javascript" src="js/paillier.js"></script>

		 <!-- jQuery -->
    	<script src="js/jquery.js"></script>

    	<!-- Bootstrap Core JavaScript -->
    	<script src="js/bootstrap.min.js"></script>
    	
    </body>
</html>




<?php
session_start();
require('utilities/utils.php');
require('content/printForms.php') ;
require('content/utilisateurs.php') ;
require('content/register.php') ;



$authorized = true ;
$askedPage = "welcome" ;
if (array_key_exists('page', $_GET)) {
    $askedPage = $_GET['page'] ;
    $authorized = checkPage($askedPage);
}

if ($authorized) {
    $pageTitle = getPageTitle($askedPage) ;
}
else {
    $pageTitle = 'Erreur' ;
}

$dbh = Database::connect() ;

if ($_GET["todo"] == "creercompte"){
    creercompte($dbh);
}

if (array_key_exists('todo', $_GET)){
    if ($_GET['todo']=="login") {
    logIn($dbh);
        
    }
}

if($_SESSION["loggedIn"]) {
    // tout à l'heure on affichera le formulaire de déconnexion
} 
else {
    printLoginForm();
}
    session_name("utilisateurduvote" );
    // ne pas mettre d'espace dans le nom de session !
    session_start();
    if (!isset($_SESSION['initiated'])) {
        session_regenerate_id();
        $_SESSION['initiated'] = true;
    }
    // Décommenter la ligne suivante pour afficher le tableau $_SESSION pour le debuggage
    // print_r($_SESSION);
    





generateHTMLHeader($pageTitle, "css/bootstrap.css");
echo "<div class ='navbar-collapse collapse'>".generateMenu()."</div>" ;

if($authorized){
    require('content/content_'.$askedPage.'.php') ;
    printLoginForm() ;
}
else{
     echo "<p>Désolé, la page demandée n'est pas autorisée</p>" ;
}



generateHTMLFooter();

?>