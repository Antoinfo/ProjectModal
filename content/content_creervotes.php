<?php
require('utilities/bdd.php') ;
require('js/paillier.js') ;

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
                <div id="pub">Clé publique : </div>
                </br></br>
                <div id="sec">Clé privée : </div>
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


                            <form action="index.php?page=creervotes" method="post" class="form-inline">

                                <div class="form-group">
                                        
                                    <label for="exampleInputName2">Question</label>
                                    <input type="text" placeholder="Question" id="Question" name="Question" class="form-control">
                                    </br>
                                    </br>
                                </div>


                                   <br> </br>
                            
                                  <div class="form-group">
                                        
                                    <label for="exampleInputName2">Choix0</label>
                                    <input type="text" placeholder="Choix0" id="Question" name="Choix0" class="form-control">
                                    </br>
                                    </br>
                                </div>

                                <div class="form-group">
                                        
                                    <label for="exampleInputName2">Choix1</label>
                                    <input type="text" placeholder="Choix1" id="Question" name="Choix1" class="form-control">
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


$pub;
FIN;








    if (isset($_POST['Question']) AND isset($_POST['Choix0']) AND isset($_POST['Choix1']))
    {
            Questions::addQuestions($dbh, $_POST['Question'], $_POST['publicKey'], $_POST['Choix0'], $_POST['Choix1']);
    }
    
   
                    
    echo("</div>");

    echo("</div>");
    

?>
