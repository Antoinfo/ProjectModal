<?php


echo <<<FIN
        <h1>Vous pouvez voter sur les questions suivantes :</h1>
        </br>
FIN;
        // Connexion à la base de données
        require_once('utilities/bdd.php');
        $dbh = Database::connect();

        // On récupère les 5 derniers billets
        $req = $dbh->query('SELECT id_Questions, Question, publicKey, Choix0, Choix1 FROM Questions ORDER BY id_Questions DESC LIMIT 0, 5');

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
            <form class="form-inline" method="get" id="encode-form">
                <p>
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
                    <label>Vote:</label>
                    <select id="choix">
                    <option value="0">0</option>
                    <option value="1">1</option>

                    </select>
                    </br></br>
                    <input type="submit" value="Chiffrer" />
    </p>
    </form>
    <div id="zone-chiffre"></div>
    
    <form class="form-inline" action="index.php?page=votes" method="post">
                    <label>Vote chiffré</label>
                    <input type="text" name="vote" id="vote" class="form-control" />
                    </br>
                    <label>Token</label>
                    <input type="text" name="token" id="token" class="form-control" />
                    </br></br>
                    <input type="hidden" name="id_Questions" class="form-control" id="id_Questions" />
                    <input type="submit" value="Voter" />
                </p>
            </form>
            
            <br />
        </p>

    </div>
            
FIN;






    if (isset($_POST['vote']) AND isset($_POST['token']))
    {
            // Testons si le fichier n'est pas trop gros
            Votes::addVotes($dbh, $_POST['vote'], $_POST['token'], $_POST['id_Questions']);
    }

                    
    echo("</div>");

    echo("</div>");
    

?>



