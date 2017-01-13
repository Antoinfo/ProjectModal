<?php

echo <<<FIN
<div class="container">

        <div class="row">

            <div class="col-md-12">
                <p class="lead"><h4>Obtenir le résultat d'un vote</h4></p>
                </br></br>
            </div>
            
            </br>

            
            <form class="form-inline">
                <p>
                    </br>
                    <label>Résultat</label>
                    <input type="text" name="vote" class="form-control" ng-model="resultatChiffre" />
                    </br>
                    <label>Clé publique</label>
                    <input type="text" name="token" class="form-control" ng-model="key" />
                    </br>
                    <label>Clé privée</label>
                    <input type="text" name="token" class="form-control" ng-model="secKey" />
                    </br></br>
                    <input type="submit" ng-click="decode()" value="Déchiffrer" />
                </p>
            </form>
            <p> {{ resultat.toString() }} </p>   
            </br>
			</br>

            <div class="col-md-12">

                    <div class="caption-full">
                        </br>


                            <form class="form-inline" action="index.php?page=resultats" method="post">

                                <div class="form-group">
                                        
                                    <label for="exampleInputName2">Entrez l'identifiant de votre question</label>
                                    <input type="number" ng-model="main.prenom" placeholder="Identifiant" id="id" name="id" class="form-control">
                                    </br>
                                    </br>
                                </div>

                                <div class="form-group col-md-12">
                                    </br>
                                        <input type="submit" value="envoyer" />
                                    </br>
                                </div>
                            </form>
                            <p> {{ sommeChiffre.toString() }} </p> 
                        </div>
                    
                </div>
FIN;

                    require_once('utilities/bdd.php');
                    if (isset($_POST['id']))
                    {
                        $votes=Votes::getVotes($_POST['id']);
                    }
                    else{
                        $votes=null;
                    }
                    
                    echo "var votes=".json_encode($votes);
echo <<< FIN
</p>
                </br>
                </br>
                <p>
                    Reste à déchiffrer le résultat !
                </p>
                </div>

    	</div>
FIN;

?>