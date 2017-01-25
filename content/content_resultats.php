<?php

$req = $dbh->query('SELECT id_Questions FROM Questions ORDER BY id_Questions DESC LIMIT 0, 5');

echo <<<FIN
<div class="container">

        <div class="row">

             </br></br>  
            

            <div class="col-md-12">

                    <div class="caption-full">
                        </br>
                            <form class="form-horizontal" action="index.php?page=resultats" method="get" id="somme-form">
                            <fieldset>

                            <!-- Form Name -->
                                <legend>Somme chiffrée</legend>

                            <!-- Text input-->
                                <div class="form-group">
                                     <label class="col-md-4 control-label" for="textinput">Entrez l'identifiant de votre question</label>  
                                        <div class="col-md-4">
                                            <input type="number" placeholder="Identifiant" id="id" name="id" placeholder="Identifiant" class="form-control input-md">   
                                        </div>
                                </div>

                            <!-- Button -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="singlebutton"></label>
                                        <div class="col-md-4">
                                            <button id="singlebutton" name="singlebutton" class="btn btn-primary">Afficher</button>
                                            </br></br>
                                            <div class="alert alert-success col-md-12" id="zone-resultats"></div>
                                        </div>
                                        

                                </div>

                            </fieldset>
                    </form>
                        </div>

                </div>
FIN;


echo <<< FIN
</p>
                </br>
                </br>
                <p>
                    voici la somme chiffrée ! (animation cadenas)
                </p>
                </div>

    	</div>
FIN;

echo <<< FIN
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="caption-full">
<form class="form-horizontal" action="index.php?page=resultats" id="decode-form">
<fieldset>


<!-- Text input-->
<div class="form-group">
<input type="hidden" name="input-resultats" class="form-control" id="input-resultats" />
<input type="hidden" placeholder="PublicKey" id="PublicKey2" name="PublicKey" class="form-control">
  <label class="col-md-4 control-label" for="textinput">Entrez la clé privée</label>  
  <div class="col-md-4">
  <input type="text" name="secKey" class="form-control" id="secKey" placeholder="Clé privée" class="form-control input-md">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Déchiffer</span></button>
</br></br>
<div class="alert alert-success col-md-3" id="zone-results"><strong></strong> </div>
  </div>
</div>

</fieldset>
</form>
</div>
</div>
            </br>
			</br>


</p>
                </br>
                </br>
                <p>
                    voici le résultat ! (animation cadenas qui s'ouvre)
                </p>
                </div>

    	</div>
 </div>
</div>

FIN;
?>
