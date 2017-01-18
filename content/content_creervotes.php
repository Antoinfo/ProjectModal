<?php


if (!isset($_SESSION['loggedIn'])) {
  echo "Page non autorisée, vous devez vous connecter pour répondre aux questions";
  return;
}


echo <<<FIN
<div class="container">

       



            </br>
			</br>

            <div class="col-md-12">

                    <div class="caption-full">
                        <h4>
                            Rajouter une question
                        </h4>
                        </br>


                            <form action="index.php?page=creervotes" method="post" id="create-question" class="form-inline">

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

                                <div class="form-group">
                                        
                                    <input type="hidden" placeholder="PublicKey" id="PublicKey" name="PublicKey" class="form-control">
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


FIN;








    if (isset($_POST['Question']) AND isset($_POST['Choix0']) AND isset($_POST['Choix1']))
    {
            Questions::addQuestions($dbh, $_POST['Question'], $_POST['PublicKey'], $_POST['Choix0'], $_POST['Choix1']);
    }

    //if (isset($_POST['Question']) AND isset($_POST['publicKey']))
    //{
    //        Questions::addQuestions($dbh, $_POST['Question'], $_POST['publicKey']);
    //}

    
   
                    
    echo("</div>");

    echo("</div>");
    

?>
