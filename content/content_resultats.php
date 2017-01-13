<?php

echo <<<FIN
<div class="container">

        <div class="row">

            <div class="col-md-12">
                <p class="lead"><h4>Obtenir le résultat d'un vote</h4></p>
                </br></br>
            </div>

            </br>


            <form class="form-inline" action="index.php?page=resultats" id="decode-form">
                <p>
                    </br>
                    <label>Résultat</label>
                    <input type="text" name="input-resultats" class="form-control" id="input-resultats" />
                    </br>
                    <label>Clé publique</label>
                    <input type="text" name="key" class="form-control" id="key" />
                    </br>
                    <label>Clé privée</label>
                    <input type="text" name="secKey" class="form-control" id="secKey" />
                    </br></br>
                    <input type="submit" value="Déchiffrer" />
                    </br>
                </p>
            </form>
            <div id="zone-results"> </div>
            </br>
			</br>

            <div class="col-md-12">

                    <div class="caption-full">
                        </br>


                            <form class="form-inline" action="index.php?page=resultats" method="get" id="somme-form">

                                <div class="form-group">

                                    <label>Entrez l'identifiant de votre question</label>
                                    <input type="number" placeholder="Identifiant" id="id" name="id" class="form-control">
                                    </br>
                                    </br>
                                </div>

                                <div class="form-group col-md-12">
                                    </br>
                                        <input type="submit"  value="envoyer" />
                                    </br>
                                </div>
                            </form>
                            <div id='zone-resultats'> </div>
                        </div>

                </div>
FIN;


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
