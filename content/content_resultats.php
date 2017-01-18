<?php
$req = $dbh->query('SELECT id_Questions FROM Questions ORDER BY id_Questions DESC LIMIT 0, 5');

echo <<<FIN
<div class="container">

        <div class="row">

            <div class="col-md-12">
                <p class="lead"><h4>Obtenir le résultat d'un vote</h4></p>
                </br></br>
            </div>

            </br>



             </br></br>  
            

            <div class="col-md-12">

                    <div class="caption-full">
                        </br>


                            <form class="form-inline" action="index.php?page=resultats" method="get" id="somme-form">

                                


                                <div class="form-group">

                                    <p>
                    <label>Résulat (somme chiffrée) de la question </label>
                    <div class="form-group">
                                    <label>Entrez l'identifiant de votre question</label>
                                    <input type="number" placeholder="Identifiant" id="id" name="id" class="form-control">
                                    </br>
                                    </br>
                                </div>

            
                    
                </p>
                                </div>

                                <div class="form-group col-md-12">
                                    </br>
                                        <input type="submit"  value="afficher" />
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
                    voici la somme chiffrée ! (animation cadenas)
                </p>
                </div>

    	</div>
FIN;

echo <<< FIN
<form class="form-inline" action="index.php?page=resultats" id="decode-form">
                
             </br>
                    
                    <input type="hidden" name="input-resultats" class="form-control" id="input-resultats" />
                    </br>



                   <div class="form-group">
                                        
                                    <input type="hidden" placeholder="PublicKey" id="PublicKey2" name="PublicKey" class="form-control">
                                    </br>
                                    </br>
                                </div>


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


</p>
                </br>
                </br>
                <p>
                    voici le résultat ! (animation cadenas qui s'ouvre)
                </p>
                </div>

    	</div>


FIN;

?>
