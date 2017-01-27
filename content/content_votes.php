<?php


echo <<<FIN
        <h1>Vous pouvez voter sur les questions suivantes :</h1>
        </br>
FIN;
        // Connexion à la base de données
        require_once('utilities/bdd.php');
        $dbh = Database::connect();

        // On récupère les 5 derniers billets
        $req = $dbh->query('SELECT id_Questions, Question, publicKey, Choix0, Choix1 FROM Questions ORDER BY id_Questions DESC');

        while ($donnees = $req->fetch())
        {

echo <<<FIN
    <div class="news">
        
        
        <h3>
FIN;
         echo htmlspecialchars($donnees['Question']); 
echo <<<FIN
         </h3>
        
        <p>
            
            
            <p> Choix 0 :
FIN;
            echo htmlspecialchars($donnees['Choix0']);
            echo "</p>";
            echo"<p> Choix 1 :";
            echo htmlspecialchars($donnees['Choix1']);
            echo "</p>";
            echo"<p> Identifiant :";
            echo htmlspecialchars($donnees['id_Questions']); 
            } // Fin de la boucle des billets
    $req->closeCursor();
    echo "</div>";
    $req = $dbh->query('SELECT id_Questions, Choix0, Choix1 FROM Questions ORDER BY id_Questions DESC');
echo <<<FIN
            
            </p>

        </br></br>
            <div class="container">
            <div class="row">
            <div class="col-md-12">
            <div class="caption-full">
            <form class="form-horizontal" method="get" id="encode-form">
                <div class="form-group">
                    <div class="col-md-4">
                    <label>Identifiant de la question :</label>
                    <select name="id" id="id">
FIN;
            while ($donnees = $req->fetch())
        {
            echo "<option value=".htmlspecialchars($donnees['id_Questions']).">".htmlspecialchars($donnees['id_Questions'])."</option>";
        } // Fin de la boucle des billets
    $req->closeCursor();
echo <<<FIN
                    </select>
                    </br>
            </div>
            </div>
            <div class="form-group">
                    <div class="col-md-4">
                    <label>Vote:</label>
                    <select id="choix">
                    <option value="0">0</option>
                    <option value="1">1</option>

                    </select>
                    </br>
                    </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <button id="singlebutton" name="singlebutton" class="btn btn-primary">Chiffrer</button>
                    </div>
                </div>
    </div>
    </div>
    </div>
    </div>
    </form>
    <div id="zone-chiffre"></div>
    </br>
    <div class="container">
    <div class="row">
    <div class="col-md-12">
    <div class="caption-full">
    <form class="form-horizontal"  method="post">
        <div class="form-group">
            <div class="col-md-4">
                <label>Vote chiffré</label>
                <input type="text" name="vote" id="vote" class="form-control input-md" />
                </br>
                <label>Token</label>
                <input type="text" name="token" id="token" class="form-control input-md" />
                </br>
                <input type="hidden" name="id_Questions" class="form-control" id="id_Questions" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <button id="singlebutton" name="singlebutton" class="btn btn-primary">Voter</button>
            </div>
        </div>
            </form>
        </div>
        </div>
        </div>
        </div>
            <br />
        </p>

    </div>
            
FIN;






    if (isset($_POST['vote']) AND isset($_POST['token']))
    {
            // Testons si le fichier n'est pas trop gros
            Votes::addVotes($_POST['vote'], $_POST['token'], $_POST['id_Questions']);
    }

                    
    echo("</div>");

    echo("</div>");
    

?>



