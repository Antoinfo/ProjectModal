<?php

require_once('utilities/bdd.php');

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
                                     <label class="col-md-4 control-label">Entrez l'identifiant de votre question</label>  
                                        <div class="col-md-4">
                                            <input type="number" placeholder="Identifiant" id="id" name="id" class="form-control input-md">   
                                        </div>
                                </div>

                            <!-- Button -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label"></label>
                                        <div class="col-md-4">
                                            <button name="singlebutton" class="btn btn-primary">Afficher</button>
                                            </br></br>
                                            <div class="alert alert-success  zone-resultats" id="zone-resultats"></div>
                                        </div>
                                        

                                </div>

                            </fieldset>
                    </form>
                        </div>

                </div>
FIN;


echo <<< FIN
                </br>
                </br>
                </div>

    	</div>

<div class="container">
<div class="row">
<div class="col-md-12">
<div class="caption-full">
<form class="form-horizontal" action="index.php?page=resultats" id="decode-form">
<fieldset>
<legend>Résultat clair</legend>


<!-- Text input-->
<div class="form-group">
<input type="hidden" name="input-resultats" class="form-control" id="input-resultats" />
<input type="hidden" id="PublicKey2" name="PublicKey" class="form-control">
  <label class="col-md-4 control-label">Entrez la clé privée</label>  
  <div class="col-md-4">
  <input type="text" name="secKey" id="secKey" placeholder="Clé privée" class="form-control input-md">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <div class="col-md-4">
    <button name="singlebutton" class="btn btn-primary"><span class="fa fa-lock fa-2x"></span></button>
</br></br>


<label class='col-md-3 control-label' id='choix1'></label>
<div class='alert alert-success col-md-3' id='zone-results1'> </div>
<label class='col-md-3 control-label' id='choix0'></label>

<div class="alert alert-success col-md-3" id="zone-results0"> </div>
<label class="col-md-3 control-label">nombre votants</label>
<div class="alert alert-success col-md-3" id="nb-votants"> </div>
  </div>
</div>

</fieldset>
</form>
</div>
</div>
            </br>
			</br>
   
                </div>

    	</div>


FIN;
?>
