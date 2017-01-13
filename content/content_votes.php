<?php


echo <<<FIN
        <h1>Vous pouvez voter sur les questions suivantes :</h1>
        </br>
FIN;
        // Connexion à la base de données
        require_once('utilities/bdd.php');
        $dbh = Database::connect();

        // On récupère les 5 derniers billets
        $req = $dbh->query('SELECT id_Questions, Question, publicKey FROM Questions ORDER BY id_Questions DESC LIMIT 0, 5');

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
            
            
            <p> Identifiant :
FIN;
            echo htmlspecialchars($donnees['id_Questions']); 
echo <<<FIN
            </p>
            <p>
                        Clé publique: 
FIN;
            echo htmlspecialchars($donnees['publicKey']); 
            } // Fin de la boucle des billets
    $req->closeCursor();
    echo "</div>";
    $req = $dbh->query('SELECT id_Questions FROM Questions ORDER BY id_Questions DESC LIMIT 0, 5');
echo <<<FIN
            
            </p>
            </br>

            <form class="form-inline" action="index.php?page=votes" method="post">
                <p>
                    <label>Identifiant de la question :</label>
                    <select name="id_Questions">
FIN;
            while ($donnees = $req->fetch())
        {
            echo "<option value=".$donnees['id_Questions'].">".$donnees['id_Questions']."</option>";
        } // Fin de la boucle des billets
    $req->closeCursor();
echo <<<FIN
    
    
            <form class="form-inline">
                <p>
                    </br>
                    <label>Vote</label>
                    <input data-id="vote" type="text" name="vote" class="form-control" ng-model="vote" />
                    </br>
                    <label>Clé publique</label>
                    <input data-id="key" type="text" name="token" class="form-control" ng-model="key" />
                    </br></br>
                    <input type="submit" ng-click="encode()" value="Chiffrer" />
                </p>
        </form>


        <p> {{ chiffre.toString() }} </p>    
                    </select>
                    </br>
                    <label>Vote chiffré</label>
                    <input type="text" name="vote" class="form-control" />
                    </br>
                    <label>Token</label>
                    <input type="text" name="token" class="form-control" />
                    </br></br>
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



