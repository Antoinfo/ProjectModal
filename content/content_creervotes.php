<?php

if (!isset($_SESSION['loggedIn'])) {
  echo "Page non autorisée, vous devez vous connecter pour répondre aux questions";
  return;
}
echo <<<FIN
<div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead"><h4>Votes</h4></p>
                </br></br>
            </div>
            
            </br>
            </br>

            <div class="col-md-12">
                <p class="lead">Clé publique : {{ pub }}</p>
                </br></br>
                <p class="lead">Clé privée : {{ priv }}</p>
                </br></br>
            </div>

            </br>
			</br>

            <div class="col-md-12">

                    <div class="caption-full">
                        <h4>
                            Rajouter une question
                        </h4>
                        </br>


                            <form action="index.php?page=votes" method="post" class="form-inline">

                                <div class="form-group">
                                        
                                    <label for="exampleInputName2">Question</label>
                                    <input type="text" ng-model="main.prenom" placeholder="Question" id="Question" name="Question" class="form-control">
                                    </br>
                                    </br>
                                </div>
                            
                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail2">Clé publique</label>
                                    <input type="text" id="PublicKey" name="publicKey" placeholder="Public key" class="form-control">
                                
                                    </br>
                                    </br>
                                </div>

                                <div class="form-group col-md-12">
                                    </br>
                                    <button class="btn btn-default">Envoyer</button> </br>
                                    </br>
                                    </br>
                                </div>
                            </form>
                        </div>
                        </br></br>


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

FIN;








    if (isset($_POST['Question']) AND isset($_POST['publicKey']))
    {
            Questions::addQuestions($dbh, $_POST['Question'], $_POST['publicKey']);
    }
    
   
                    
    echo("</div>");

    echo("</div>");
    

?>
