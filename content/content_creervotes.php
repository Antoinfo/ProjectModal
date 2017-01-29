<?php


if (!isset($_SESSION['loggedIn'])) {
  echo "Page non autorisée, vous devez vous connecter pour répondre ajouter une question";
  return;
}


echo <<<FIN
<div class="container">

       



            </br>
			</br>

            <div class="col-md-12">

                    <div class="caption-full">
                        
                           </br>
                           <div class="form-group">
                            <form action="index.php?page=creervotes" method="post" id="create-question" class="form-horizontal">
                            <fieldset>

                            <!-- Form Name -->
                                <legend>Rajouter une question</legend>
                        </br>


                           

                                <div class="form-group">
                                        
                                    <label>Question</label>
                                    <input type="text" placeholder="Votre question" id="Question" name="Question" class="form-control">
                                  
                                    </br>

                                </div>


                                 
                            
                                  <div class="form-group">
                                        
                                    <label>Premier choix</label>
                                    <input type="text" placeholder="Première réponse possible à la question" id="Choix0" name="Choix0" class="form-control">

                                    </br>
                                </div>

                                <div class="form-group">
                                        
                                    <label>Deuxième choix</label>
                                    <input type="text" placeholder="Deuxième réponse possible à la question" id="Choix1" name="Choix1" class="form-control">
                                    </br>

                                </div>

                                <div class="form-group">
                                        
                                    <input type="hidden" id="PublicKey" name="PublicKey" class="form-control">
                                    </br>
                                    </br>
                                </div>

                               
                                <div class="form-group">
                                            <button name="singlebutton" class="btn btn-primary">Envoyer</button>
                                            </br></br>
                                            
                                    </br>
                                    </br>
                                        </div>
                                </fieldset>
                            </form>
                            </div>
                        </div>
                        </div>
                        </div>
                        </br></br>


FIN;








    if (isset($_POST['Question']) AND isset($_POST['Choix0']) AND isset($_POST['Choix1']))
    {
            Questions::addQuestions($dbh, $_POST['Question'], $_POST['PublicKey'], $_POST['Choix0'], $_POST['Choix1']);
    }

    //if (isset($_POST['Question']) AND isset($_POST['publicKey']))
    //{
    //        Questions::addQuestions($dbh, $_POST['Question'], $_POST['publicKey']);
    //}

    

?>
