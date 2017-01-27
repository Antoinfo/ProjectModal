<?php
$page_list= array(array("name"=>"accueil","title"=>"Accueil"), array("name"=>"a_propos","title"=>"À propos"), array("name"=>"votes","title"=>"Votes disponibles"),array("name"=>"creervotes","title"=>"Ajouter des questions"), array("name"=>"resultats","title"=>"Résultats"), array("name"=>"register","title"=>"Création d'un compte"), array("name"=>"admin","title"=>"Gestion admin du site"));
function generateHTMLHeader($pageTitle) {
    
    
    echo <<<FIN
    <!DOCTYPE html>
    <html>
    <body background="users/antonindauvin/pictures/image_de_fond_cadenas.png">
    <head>
    	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.0-beta.5/angular.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    
        <script src="js/code.js"></script>
        <script src="js/md5.js"></script>
        <script type="text/javascript" src="js/jsbn/jsbn.js"></script>
        <script type="text/javascript" src="js/jsbn/jsbn2.js"></script>
        <script type="text/javascript" src="js/jsbn/prng4.js"></script>
        <script type="text/javascript" src="js/jsbn/rng.js"></script>
        <script type="text/javascript" src="js/paillier.js"></script>
   		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">

    	<title>$pageTitle</title>

    	<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/shop-item.css" rel="stylesheet">
            <link href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
	</head>
   </body>
       
FIN;
}
function generateMenu($askedPage){
    global $page_list;
echo <<<FIN
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
                <a class="navbar-brand" href="index.php">Voting - Plateforme de vote sécurisé</a>
            </div>


            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
FIN;
    foreach($page_list as $page){
        if($page['name']==$askedPage){
            echo "<li class='active'><a href='index.php?page=".$page['name']."'>".$page['title']."</a></li>";
        } else{
            echo "<li><a href='index.php?page=".$page['name']."'>".$page['title']."</a></li>";
        }
    }
echo <<<FIN
                </ul>
            </div>
        </div>
    </nav>
FIN;

}
function checkPage($askedPage){
    $bool=FALSE;
    global $page_list;
    foreach($page_list as $page){
        $bool=$bool or ($page["name"]==$askedPage);
    }
    return $bool;
}
function getPageTitle($name){
    global $page_list;
    foreach($page_list as $page){
        if($page["name"]==$name){
            return $page["title"];
        }
    }
}
function generateHTMLFooter() {
echo <<<FIN
    <script type="text/javascript" src="js/paillier.js"></script>

		 <!-- jQuery -->
    	<script src="js/jquery.js"></script>

    	<!-- Bootstrap Core JavaScript -->
    	<script src="js/bootstrap.min.js"></script>

    
    </body>
</html>
FIN;
}
?>